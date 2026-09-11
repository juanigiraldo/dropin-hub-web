<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok'=>false,'message'=>'Method not allowed']);
    exit;
}

/* Honeypot anti-spam */
if (!empty($_POST['website'] ?? '')) {
    echo json_encode(['ok'=>true]);
    exit;
}

$name    = trim((string)($_POST['name'] ?? ''));
$email   = trim((string)($_POST['email'] ?? ''));
$phone   = trim((string)($_POST['phone'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['ok'=>false,'message'=>'Datos inválidos']);
    exit;
}

$to = 'juani.giraldo@dropin-hub.com';
$subject = 'Nuevo contacto desde dropin-hub.com';

$cleanHeader = static function(string $value): string {
    return str_replace(["\r", "\n"], '', $value);
};

$body =
    "Nombre: {$name}\n" .
    "Email: {$email}\n" .
    "Teléfono: {$phone}\n\n" .
    "Mensaje:\n{$message}\n";

$headers = [
    'From: Drop In Hub Web <no-reply@dropin-hub.com>',
    'Reply-To: ' . $cleanHeader($email),
    'Content-Type: text/plain; charset=UTF-8'
];

$sent = @mail($to, $subject, $body, implode("\r\n", $headers));

if (!$sent) {
    http_response_code(500);
    echo json_encode([
        'ok'=>false,
        'message'=>'El hosting no pudo enviar el correo. Puede requerir SMTP.'
    ]);
    exit;
}

echo json_encode(['ok'=>true]);
