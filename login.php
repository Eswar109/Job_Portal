<?php
include 'dbcon.php';
session_start(); // Start the session to manage user sessions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT id, password, user_type FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userId, $hashedPassword, $userType);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        // User exists, verify password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, start session and redirect based on user type
            $_SESSION['userId'] = $userId;
            $_SESSION['userType'] = $userType;

            switch ($userType) {
                case 'jobSeeker':
                    header("Location: jobSeeker.html");
                    break;
                case 'employer':
                    header("Location: EmployerDashboard.html");
                    break;
                case 'company':
                    header("Location: company.html");
                    break;
                case 'college':
                    header("Location: college.html");
                    break;
                default:
                    header("Location: index.php"); // Redirect to home page or a default page
                    break;
            }
            exit(); // Stop script execution after redirection
        } else {
            ?>
<script>
alert("Invalid Password");
</script>
<?php
        }
    } else {
        ?>
<script>
alert("Invalid Email or Password");
</script>
<?php

}

$stmt->close();
$conn->close();
}
?>