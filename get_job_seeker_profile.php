<?php
// Database connection
$host = 'localhost';
$db   = 'jobportal';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Fetch job seeker profile
$user_id = 1; // Assume a user ID (this should be dynamic depending on login session)
$stmt = $pdo->prepare('SELECT * FROM job_seeker WHERE user_id = ?');
$stmt->execute([$user_id]);
$profile = $stmt->fetch();

echo json_encode($profile);
?>