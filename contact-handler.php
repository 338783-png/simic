<?php
// SICMI Contact Form Handler
// Questo file deve essere caricato su un server con PHP abilitato

// Configura qui l'email di destinazione
$to_email = "jordanietane2@gmail.com";

// Verifica che sia una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Protegge contro spam
    if (!empty($_POST['_honey'])) {
        die("Spam detected");
    }
    
    // Recupera i dati dal form
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    // Valida email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email non valida");
    }
    
    // Prepara l'email
    $email_subject = "Nuovo messaggio dal sito SICMI: " . $subject;
    
    $email_body = "Hai ricevuto un nuovo messaggio dal sito SICMI Sarl:\n\n";
    $email_body .= "Nome: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Telefono: " . $phone . "\n";
    $email_body .= "Oggetto: " . $subject . "\n\n";
    $email_body .= "Messaggio:\n" . $message . "\n";
    
    // Headers
    $headers = "From: noreply@sicmi.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Invia email
    if (mail($to_email, $email_subject, $email_body, $headers)) {
        // Redirect alla pagina di successo
        header("Location: contact.html?success=1");
    } else {
        header("Location: contact.html?error=1");
    }
    
} else {
    // Non è una richiesta POST
    header("Location: contact.html");
}
?>
