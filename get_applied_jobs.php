<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['userId'])) {
    echo json_encode([]);
    exit;
}

$job_seeker_id = $_SESSION['userId'];

$stmt = $conn->prepare('SELECT * FROM applied_jobs WHERE job_seeker_id = ?');
$stmt->bind_param('i', $job_seeker_id);
$stmt->execute();
$result = $stmt->get_result();
$jobs = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($jobs);
?>