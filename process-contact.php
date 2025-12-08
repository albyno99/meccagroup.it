<?php
// Prevent PHP errors from being displayed as HTML
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

require_once 'includes/language.php';
require_once 'includes/phpmailer/PHPMailer.php';
require_once 'includes/phpmailer/SMTP.php';
require_once 'includes/phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Set response header
header('Content-Type: application/json');

// Enable CORS if needed
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Initialize response
$response = ['success' => false, 'message' => ''];

try {
    // Get current language from POST or use default
    $currentLang = trim($_POST['lang'] ?? 'it');
    
    // Verify reCAPTCHA
    $recaptchaToken = $_POST['recaptcha_token'] ?? '';
    
    if (empty($recaptchaToken)) {
        error_log('reCAPTCHA: Token is empty');
        $response['message'] = $currentLang === 'en' ? 'reCAPTCHA verification failed' : 'Verifica reCAPTCHA fallita';
        echo json_encode($response);
        exit;
    }
    
    // Verify token with Google
    $recaptchaSecret = '6LcrjCUsAAAAAMzR4xRBpcLYE_0s_eCMdyExGZRs';
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = [
        'secret' => $recaptchaSecret,
        'response' => $recaptchaToken,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];
    
    $recaptchaOptions = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptchaData)
        ]
    ];
    
    $recaptchaContext = stream_context_create($recaptchaOptions);
    $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);
    $recaptchaJson = json_decode($recaptchaResult);
    
    // Log the reCAPTCHA response for debugging
    error_log('reCAPTCHA response: ' . json_encode($recaptchaJson));
    
    if (!$recaptchaJson || !$recaptchaJson->success) {
        $errorCodes = isset($recaptchaJson->{'error-codes'}) ? implode(', ', $recaptchaJson->{'error-codes'}) : 'unknown';
        error_log('reCAPTCHA failed: ' . $errorCodes);
        $response['message'] = $currentLang === 'en' ? 'reCAPTCHA verification failed. Please try again.' : 'Verifica reCAPTCHA fallita. Riprova.';
        echo json_encode($response);
        exit;
    }
    
    // Check score only if it exists (v3)
    if (isset($recaptchaJson->score) && $recaptchaJson->score < 0.5) {
        error_log('reCAPTCHA score too low: ' . $recaptchaJson->score);
        $response['message'] = $currentLang === 'en' ? 'reCAPTCHA verification failed. Please try again.' : 'Verifica reCAPTCHA fallita. Riprova.';
        echo json_encode($response);
        exit;
    }
    
    // Sanitize and validate input
    $nome = trim($_POST['nome'] ?? '');
    $cognome = trim($_POST['cognome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $azienda = trim($_POST['azienda'] ?? '');
    $servizio = trim($_POST['servizio'] ?? '');
    $messaggio = trim($_POST['messaggio'] ?? '');
    $privacy = isset($_POST['privacy']);
    $newsletter = isset($_POST['newsletter']);
    
    // Validation
    $errors = [];
    
    if (empty($nome)) {
        $errors[] = $currentLang === 'en' ? 'Name is required' : 'Nome è obbligatorio';
    }
    
    if (empty($cognome)) {
        $errors[] = $currentLang === 'en' ? 'Surname is required' : 'Cognome è obbligatorio';
    }
    
    if (empty($email)) {
        $errors[] = $currentLang === 'en' ? 'Email is required' : 'Email è obbligatoria';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = $currentLang === 'en' ? 'Please enter a valid email address' : 'Inserisci un indirizzo email valido';
    }
    
    if (empty($messaggio)) {
        $errors[] = $currentLang === 'en' ? 'Message is required' : 'Messaggio è obbligatorio';
    }
    
    if (!$privacy) {
        $errors[] = $currentLang === 'en' ? 'You must accept the privacy policy' : 'Devi accettare la privacy policy';
    }
    
    // Phone validation (if provided)
    if (!empty($telefono)) {
        $telefono = preg_replace('/[^0-9+\-\s\(\)]/', '', $telefono);
        if (strlen($telefono) < 8) {
            $errors[] = $currentLang === 'en' ? 'Please enter a valid phone number' : 'Inserisci un numero di telefono valido';
        }
    }
    
    if (!empty($errors)) {
        $response['message'] = implode('. ', $errors);
        echo json_encode($response);
        exit;
    }
    
    // Prepare email content
    $subject = $currentLang === 'en' ? 'New Contact Request from Website' : 'Nuova richiesta di contatto dal sito web';
    
    $emailContent = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .header { background: #1a365d; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #1a365d; }
            .value { margin-left: 10px; }
        </style>
    </head>
    <body>
        <div class='header'>
            <h2>$subject</h2>
        </div>
        <div class='content'>
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Name:' : 'Nome:') . "</span>
                <span class='value'>$nome $cognome</span>
            </div>
            <div class='field'>
                <span class='label'>Email:</span>
                <span class='value'>$email</span>
            </div>";
    
    if (!empty($telefono)) {
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Phone:' : 'Telefono:') . "</span>
                <span class='value'>$telefono</span>
            </div>";
    }
    
    if (!empty($azienda)) {
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Company:' : 'Azienda:') . "</span>
                <span class='value'>$azienda</span>
            </div>";
    }
    
    if (!empty($servizio)) {
        $serviceLabels = [
            'autotrasporti' => $currentLang === 'en' ? 'Transportation' : 'Autotrasporti',
            'materiali-edili' => $currentLang === 'en' ? 'Building Materials' : 'Materiali Edili',
            'noleggio-attrezzature' => $currentLang === 'en' ? 'Equipment Rental' : 'Noleggio Attrezzature',
            'altro' => $currentLang === 'en' ? 'Other' : 'Altro'
        ];
        
        $serviceName = $serviceLabels[$servizio] ?? $servizio;
        
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Service:' : 'Servizio:') . "</span>
                <span class='value'>$serviceName</span>
            </div>";
    }
    
    $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Message:' : 'Messaggio:') . "</span>
                <div class='value' style='background: #f8f9fa; padding: 15px; border-left: 3px solid #1a365d; margin-top: 10px;'>
                    " . nl2br(htmlspecialchars($messaggio)) . "
                </div>
            </div>";
    
    if ($newsletter) {
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Newsletter subscription:' : 'Iscrizione newsletter:') . "</span>
                <span class='value'>" . ($currentLang === 'en' ? 'Yes' : 'Sì') . "</span>
            </div>";
    }
    
    $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Date:' : 'Data:') . "</span>
                <span class='value'>" . date('Y-m-d H:i:s') . "</span>
            </div>
            <div class='field'>
                <span class='label'>" . ($currentLang === 'en' ? 'Language:' : 'Lingua:') . "</span>
                <span class='value'>" . strtoupper($currentLang) . "</span>
            </div>
        </div>
    </body>
    </html>";
    
    // Configure PHPMailer
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'martina.meccagroup@gmail.com';
        $mail->Password   = 'gqewjbluhovpzltn';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        $mail->CharSet    = 'UTF-8';
        
        // Recipients - Email to company
        $mail->setFrom('lory@meccagroup.it', 'Mecca Group Website');
        $mail->addAddress('lory@meccagroup.it', 'Mecca Group');
        $mail->addCC('martina.meccagroup@gmail.com', 'Mecca Group');
        $mail->addReplyTo($email, "$nome $cognome");
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $emailContent;
        $mail->AltBody = strip_tags($emailContent);
        
        // Send email to company
        $mail->send();
        
        // Send confirmation email to user
        $mail->clearAddresses();
        $mail->clearReplyTos();
        $mail->setFrom('lory@meccagroup.it', 'Mecca Group');
        $mail->addAddress($email, "$nome $cognome");
        
        $confirmSubject = $currentLang === 'en' ? 'Thank you for contacting Mecca Group' : 'Grazie per aver contattato Mecca Group';
        
        $confirmContent = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .header { background: #1a365d; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; }
                .footer { background: #f8f9fa; padding: 15px; text-align: center; font-size: 0.9em; color: #666; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h2>$confirmSubject</h2>
            </div>
            <div class='content'>
                <p>" . ($currentLang === 'en' ? "Dear $nome," : "Gentile $nome,") . "</p>
                <p>" . ($currentLang === 'en' ? 
                    'Thank you for contacting us. We have received your message and will respond as soon as possible, usually within 24 hours.' : 
                    'Grazie per averci contattato. Abbiamo ricevuto il tuo messaggio e ti risponderemo il prima possibile, solitamente entro 24 ore.') . "</p>
                <p>" . ($currentLang === 'en' ? 
                    'If you need immediate assistance, you can call us at:' : 
                    'Se hai bisogno di assistenza immediata, puoi chiamarci al:') . "</p>
                <p style='font-weight: bold;'>+39 331 625 47 83 / +39 0141 943008</p>
                <p>" . ($currentLang === 'en' ? 
                    'Best regards,<br>Mecca Group Team' : 
                    'Cordiali saluti,<br>Il Team di Mecca Group') . "</p>
            </div>
            <div class='footer'>
                <p>Mecca Group | Viale Cavalieri di Vittorio Veneto, 3 - 14010 Cantarana (AT)<br>
                Tel: +39 331 625 47 83 / +39 0141 943008 | Email: lory@meccagroup.it</p>
            </div>
        </body>
        </html>";
        
        $mail->Subject = $confirmSubject;
        $mail->Body    = $confirmContent;
        $mail->AltBody = strip_tags($confirmContent);
        
        $mail->send();
        
        // Log the contact for analytics (optional)
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $nome . ' ' . $cognome,
            'email' => $email,
            'service' => $servizio,
            'language' => $currentLang,
            'newsletter' => $newsletter ? 'yes' : 'no'
        ];
        
        // You can log to file or database here
        // file_put_contents('logs/contacts.log', json_encode($logData) . "\n", FILE_APPEND);
        
        $response['success'] = true;
        $response['message'] = $currentLang === 'en' ? 
            'Thank you for your message! We will respond within 24 hours.' : 
            'Grazie per il tuo messaggio! Ti risponderemo entro 24 ore.';
            
    } catch (Exception $e) {
        error_log('PHPMailer error: ' . $mail->ErrorInfo);
        $response['message'] = $currentLang === 'en' ? 
            'There was an error sending your message. Please try again.' : 
            'Si è verificato un errore nell\'invio del messaggio. Riprova più tardi.';
    }
    
} catch (Exception $e) {
    error_log('Contact form error: ' . $e->getMessage());
    $response['message'] = $currentLang === 'en' ? 
        'A technical error occurred. Please try again.' : 
        'Si è verificato un errore tecnico. Riprova più tardi.';
}

echo json_encode($response);
?>