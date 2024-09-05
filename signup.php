<?php 
    include 'dbcon.php';

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phoneNumber = $_POST['phoneNumber'];
    $userType = $_POST['userType'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone_number, user_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $phoneNumber, $userType);
    
    if ($stmt->execute()) {
        $userId = $stmt->insert_id;
        $uploadPath = '';

        switch ($userType) {
            case 'jobSeeker':
                $collegeName = $_POST['collegeName'];
                $studentId = $_POST['studentId'];
                $academicDetails = $_POST['academicDetails'];

                if (!empty($_FILES['academicProofs']['name'])) {
                    $uploadPath = 'uploads/academic/' . basename($_FILES['academicProofs']['name']);
                    move_uploaded_file($_FILES['academicProofs']['tmp_name'], $uploadPath);
                }

                $stmt = $conn->prepare("INSERT INTO job_seekers (user_id, college_name, student_id, academic_details, academic_proof_path) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("issss", $userId, $collegeName, $studentId, $academicDetails, $uploadPath);
                $stmt->execute();
                break;

            case 'employer':
                $companyName = $_POST['companyName'];
                $employeeId = $_POST['employeeId'];
                $position = $_POST['position'];

                if (!empty($_FILES['employmentProof']['name'])) {
                    $uploadPath = 'uploads/employment/' . basename($_FILES['employmentProof']['name']);
                    move_uploaded_file($_FILES['employmentProof']['tmp_name'], $uploadPath);
                }

                $stmt = $conn->prepare("INSERT INTO employers (user_id, company_name, employee_id, position, employment_proof_path) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("issss", $userId, $companyName, $employeeId, $position, $uploadPath);
                $stmt->execute();
                break;

            case 'company':
                $companyRegNumber = $_POST['companyRegNumber'];
                $companyAddress = $_POST['companyAddress'];
                $contactPersonName = $_POST['contactPersonName'];
                $contactPersonEmail = $_POST['contactPersonEmail'];

                if (!empty($_FILES['companyProof']['name'])) {
                    $uploadPath = 'uploads/company/' . basename($_FILES['companyProof']['name']);
                    move_uploaded_file($_FILES['companyProof']['tmp_name'], $uploadPath);
                }

                $stmt = $conn->prepare("INSERT INTO companies (user_id, company_reg_number, company_address, contact_person_name, contact_person_email, company_proof_path) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isssss", $userId, $companyRegNumber, $companyAddress, $contactPersonName, $contactPersonEmail, $uploadPath);
                $stmt->execute();
                break;

            case 'college':
                $collegeRegNumber = $_POST['collegeRegNumber'];
                $collegeAddress = $_POST['collegeAddress'];
                $contactPersonNameCollege = $_POST['contactPersonNameCollege'];
                $contactPersonEmailCollege = $_POST['contactPersonEmailCollege'];

                if (!empty($_FILES['collegeProof']['name'])) {
                    $uploadPath = 'uploads/college/' . basename($_FILES['collegeProof']['name']);
                    move_uploaded_file($_FILES['collegeProof']['tmp_name'], $uploadPath);
                }

                $stmt = $conn->prepare("INSERT INTO colleges (user_id, college_reg_number, college_address, contact_person_name, contact_person_email, college_proof_path) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isssss", $userId, $collegeRegNumber, $collegeAddress, $contactPersonNameCollege, $contactPersonEmailCollege, $uploadPath);
                $stmt->execute();
                break;

            default:
                // Handle unexpected user type
                break;
        }

        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

?>