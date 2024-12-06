<?php
session_start();

// Check if the user is logged in and is a job seeker
if (!isset($_SESSION['userId']) || $_SESSION['userType'] !== 'jobSeeker') {
    header("Location: index.php");
    exit;
}

// Connect to the database
include 'dbcon.php';

$userId = $_SESSION['userId'];

// Fetch job seeker profile details from the users table
$stmt = $conn->prepare('SELECT name, email, phone_number FROM users WHERE id = ?');
$stmt->bind_param('i', $userId);
$stmt->execute();
$stmt->bind_result($name, $email, $phone);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Dashboard</title>
    <link rel="stylesheet" href="css/jobSeekerDashboard.css">
</head>

<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome to Your Dashboard</h1>
            <div class="profile-button" id="profileButton">
                <img src="images/bg1.avif" alt="Profile Picture" id="profileImage">
            </div>
        </header>

        <div class="profile-popup" id="profilePopup">
            <button id="closePopup" class="close-btn">&#x2715;</button>
            <div class="profile-details">
                <div class="profile-pic-container">
                    <img src="images/bg1.avif" alt="Profile Picture" id="profilePic">
                    <input type="file" id="profilePicUpload" class="hidden">
                    <button id="uploadBtn">Change Picture</button>
                </div>
                <div class="profile-info">
                    <p id="profileName"><?php echo htmlspecialchars($name); ?></p>
                    <p id="profileEmail"><?php echo htmlspecialchars($email); ?></p>
                    <p id="profilePhone"><?php echo htmlspecialchars($phone); ?></p>
                    <p id="profileLocation">California, USA</p>

                    <input type="text" id="profileNameEdit" class="edit-input hidden" placeholder="Enter your name">
                    <input type="email" id="profileEmailEdit" class="edit-input hidden" placeholder="Enter your email">
                    <input type="text" id="profilePhoneEdit" class="edit-input hidden" placeholder="Enter your phone">
                    <input type="text" id="profileLocationEdit" class="edit-input hidden"
                        placeholder="Enter your location">

                    <button id="editProfileBtn">Edit Profile</button>
                    <button id="saveProfileBtn" class="hidden">Save Changes</button>
                </div>
            </div>
        </div>

        <div class="dashboard-section">
            <h2>Job Search</h2>
            <div class="job-search">
                <input type="text" id="jobSearchInput" placeholder="Search for jobs..." />
            </div>
        </div>

        <div class="dashboard-section">
            <h2>Applied Jobs</h2>
            <div class="filter">
                <label for="statusFilter">Filter by Status:</label>
                <select id="statusFilter">
                    <option value="all">All</option>
                    <option value="under-review">Under Review</option>
                    <option value="interview">Interview Scheduled</option>
                    <option value="offer">Offer Received</option>
                </select>
            </div>
            <div class="applied-jobs" id="appliedJobs">
                <!-- Jobs will be dynamically populated using PHP & JS -->
            </div>
        </div>

        <div class="dashboard-section">
            <h2>Saved Jobs</h2>
            <div class="saved-jobs" id="savedJobs">
                <!-- Jobs will be dynamically populated using PHP & JS -->
            </div>
        </div>

        <div class="dashboard-section">
            <h2>Job Alerts</h2>
            <div class="job-alerts" id="jobAlerts">
                <!-- Job alerts will be dynamically populated -->
            </div>
        </div>
    </div>

    <script src="js/jobSeekerDashboard.js"></script>
</body>

</html>