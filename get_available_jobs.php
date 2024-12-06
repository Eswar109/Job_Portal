<?php
include 'dbcon.php';

$stmt = $conn->query('SELECT * FROM available_jobs');
$jobs = $stmt->fetch_all(MYSQLI_ASSOC);

echo json_encode($jobs);
?>