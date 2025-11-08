<?php
require_once 'includes/language.php';

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
    $lang = trim($_POST['lang'] ?? 'it');
    
    // Validation
    $errors = [];
    
    if (empty($nome)) {
        $errors[] = $lang === 'en' ? 'Name is required' : 'Nome è obbligatorio';
    }
    
    if (empty($cognome)) {
        $errors[] = $lang === 'en' ? 'Surname is required' : 'Cognome è obbligatorio';
    }
    
    if (empty($email)) {
        $errors[] = $lang === 'en' ? 'Email is required' : 'Email è obbligatoria';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = $lang === 'en' ? 'Please enter a valid email address' : 'Inserisci un indirizzo email valido';
    }
    
    if (empty($messaggio)) {
        $errors[] = $lang === 'en' ? 'Message is required' : 'Messaggio è obbligatorio';
    }
    
    if (!$privacy) {
        $errors[] = $lang === 'en' ? 'You must accept the privacy policy' : 'Devi accettare la privacy policy';
    }
    
    // Phone validation (if provided)
    if (!empty($telefono)) {
        $telefono = preg_replace('/[^0-9+\-\s\(\)]/', '', $telefono);
        if (strlen($telefono) < 8) {
            $errors[] = $lang === 'en' ? 'Please enter a valid phone number' : 'Inserisci un numero di telefono valido';
        }
    }
    
    if (!empty($errors)) {
        $response['message'] = implode('. ', $errors);
        echo json_encode($response);
        exit;
    }
    
    // Prepare email content
    $subject = $lang === 'en' ? 'New Contact Request from Website' : 'Nuova richiesta di contatto dal sito web';
    
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
                <span class='label'>" . ($lang === 'en' ? 'Name:' : 'Nome:') . "</span>
                <span class='value'>$nome $cognome</span>
            </div>
            <div class='field'>
                <span class='label'>Email:</span>
                <span class='value'>$email</span>
            </div>";
    
    if (!empty($telefono)) {
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($lang === 'en' ? 'Phone:' : 'Telefono:') . "</span>
                <span class='value'>$telefono</span>
            </div>";
    }
    
    if (!empty($azienda)) {
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($lang === 'en' ? 'Company:' : 'Azienda:') . "</span>
                <span class='value'>$azienda</span>
            </div>";
    }
    
    if (!empty($servizio)) {
        $serviceLabels = [
            'autotrasporti' => $lang === 'en' ? 'Transportation' : 'Autotrasporti',
            'materiali-edili' => $lang === 'en' ? 'Building Materials' : 'Materiali Edili',
            'noleggio-attrezzature' => $lang === 'en' ? 'Equipment Rental' : 'Noleggio Attrezzature',
            'noleggio-attrezzature' => $lang === 'en' ? 'Equipment Rental' : 'Noleggio Attrezzature',
            'altro' => $lang === 'en' ? 'Other' : 'Altro'
        ];
        
        $serviceName = $serviceLabels[$servizio] ?? $servizio;
        
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($lang === 'en' ? 'Service:' : 'Servizio:') . "</span>
                <span class='value'>$serviceName</span>
            </div>";
    }
    
    $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($lang === 'en' ? 'Message:' : 'Messaggio:') . "</span>
                <div class='value' style='background: #f8f9fa; padding: 15px; border-left: 3px solid #1a365d; margin-top: 10px;'>
                    " . nl2br(htmlspecialchars($messaggio)) . "
                </div>
            </div>";
    
    if ($newsletter) {
        $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($lang === 'en' ? 'Newsletter subscription:' : 'Iscrizione newsletter:') . "</span>
                <span class='value'>" . ($lang === 'en' ? 'Yes' : 'Sì') . "</span>
            </div>";
    }
    
    $emailContent .= "
            <div class='field'>
                <span class='label'>" . ($lang === 'en' ? 'Date:' : 'Data:') . "</span>
                <span class='value'>" . date('d/m/Y H:i:s') . "</span>
            </div>
            <div class='field'>
                <span class='label'>" . ($lang === 'en' ? 'Language:' : 'Lingua:') . "</span>
                <span class='value'>" . strtoupper($lang) . "</span>
            </div>
        </div>
    </body>
    </html>";
    
    // Email headers
    $headers = [
        'From: no-reply@meccagroup.it',
        'Reply-To: ' . $email,
        'Content-Type: text/html; charset=UTF-8',
        'X-Mailer: PHP/' . phpversion()
    ];
    
    // Send email to company
    $to = 'info@meccagroup.it';
    $sent = mail($to, $subject, $emailContent, implode("\r\n", $headers));
    
    if ($sent) {
        // Send confirmation email to user
        $confirmSubject = $lang === 'en' ? 'Thank you for contacting Mecca Group' : 'Grazie per aver contattato Mecca Group';
        
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
                <p>" . ($lang === 'en' ? "Dear $nome," : "Gentile $nome,") . "</p>
                <p>" . ($lang === 'en' ? 
                    'Thank you for contacting us. We have received your message and will respond as soon as possible, usually within 24 hours.' : 
                    'Grazie per averci contattato. Abbiamo ricevuto il tuo messaggio e ti risponderemo il prima possibile, solitamente entro 24 ore.') . "</p>
                <p>" . ($lang === 'en' ? 
                    'If you need immediate assistance, you can call us at:' : 
                    'Se hai bisogno di assistenza immediata, puoi chiamarci al:') . "</p>
                <p style='font-weight: bold;'>+39 331 625 47 83 / +39 0141 943008</p>
                <p>" . ($lang === 'en' ? 
                    'Best regards,<br>Mecca Group Team' : 
                    'Cordiali saluti,<br>Il Team di Mecca Group') . "</p>
            </div>
            <div class='footer'>
                <p>Mecca Group | Viale Cavalieri di Vittorio Veneto, 3 - 14010 Cantarana (AT)<br>
                Tel: +39 331 625 47 83 / +39 0141 943008 | Email: info@meccagroup.it</p>
            </div>
        </body>
        </html>";
        
        $confirmHeaders = [
            'From: info@meccagroup.it',
            'Content-Type: text/html; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion()
        ];
        
        mail($email, $confirmSubject, $confirmContent, implode("\r\n", $confirmHeaders));
        
        // Log the contact for analytics (optional)
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $nome . ' ' . $cognome,
            'email' => $email,
            'service' => $servizio,
            'language' => $lang,
            'newsletter' => $newsletter ? 'yes' : 'no'
        ];
        
        // You can log to file or database here
        // file_put_contents('logs/contacts.log', json_encode($logData) . "\n", FILE_APPEND);
        
        $response['success'] = true;
        $response['message'] = $lang === 'en' ? 
            'Thank you for your message! We will respond within 24 hours.' : 
            'Grazie per il tuo messaggio! Ti risponderemo entro 24 ore.';
            
    } else {
        $response['message'] = $lang === 'en' ? 
            'There was an error sending your message. Please try again.' : 
            'Si è verificato un errore nell\'invio del messaggio. Riprova più tardi.';
    }
    
} catch (Exception $e) {
    error_log('Contact form error: ' . $e->getMessage());
    $response['message'] = $lang === 'en' ? 
        'A technical error occurred. Please try again.' : 
        'Si è verificato un errore tecnico. Riprova più tardi.';
}

echo json_encode($response);
?>