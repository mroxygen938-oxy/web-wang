<?php
/**
 * PHP Backend Endpoint for Product Inquiry & Contact Submissions
 */

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// Receive JSON payload or POST fields
$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

$name = trim($input['name'] ?? '');
$email = trim($input['email'] ?? '');
$subject = trim($input['subject'] ?? 'Zenith Prism Inquiry');
$message = trim($input['message'] ?? '');

// Validation
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please fill in all required fields (Name, Email, and Message).'
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please provide a valid email address.'
    ]);
    exit;
}

// Store submission in JSON file directory as mock database persistence
$storage_dir = __DIR__ . '/../data/inquiries';
if (!is_dir($storage_dir)) {
    mkdir($storage_dir, 0755, true);
}

$inquiry_record = [
    'id' => uniqid('inq_'),
    'timestamp' => date('Y-m-d H:i:s'),
    'name' => htmlspecialchars($name),
    'email' => htmlspecialchars($email),
    'subject' => htmlspecialchars($subject),
    'message' => htmlspecialchars($message),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'
];

file_put_contents(
    $storage_dir . '/inquiries.json',
    json_encode($inquiry_record, JSON_PRETTY_PRINT) . PHP_EOL,
    FILE_APPEND
);

echo json_encode([
    'success' => true,
    'message' => 'Thank you, ' . htmlspecialchars($name) . '! Your inquiry for Wangling Cloud has been submitted successfully.',
    'data' => [
        'inquiry_id' => $inquiry_record['id'],
        'timestamp' => $inquiry_record['timestamp']
    ]
]);
