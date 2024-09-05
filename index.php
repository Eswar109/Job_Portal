<?php include 'dbcon.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Job Portal</title>
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/signup.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

</head>

<body>

    <!-- #content -->


    <section class="header">
        <nav>
            <a href="index.html"><img src="images/logo_without_bg.svg" alt=""></a>
            <div class="nav-links" id="navLinks" data-aos="fade-up">
                <i class="fa fa-times close-btn" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="" class="navItem">Home</a></li>
                    <li><a href="" class="navItem">About</a></li>
                    <li><a href="" class="navItem">Contact</a></li>
                    <li><a href="" class="navItem">Blog</a></li>
                    <li><a href="#" id="signIn-btn">Sign In</a></li>
                    <li><a href="#" id="register-btn">Register</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Connecting Job Seekers and Employers</h1>
            <p>Discover a world of career opportunities and connect with top employers.<br>Our online job portal offers
                a seamless experience for job seekers and employers alike.</p>
            <a href="" class="getstarted-btn">Get Started</a>
        </div>
    </section>

    <div class="overlay" id="overlay"></div>

    <div class="form-section" id="form-section">
        <div class="form-container">
            <div class="links1">
                <a href="#"><i class="fa fa-times" id="form-close-btn"></i></a>
            </div>

            <div class="tabs">
                <div class="tab" id="registerTab">Register</div>
                <div class="tab" id="loginTab">Login</div>
            </div>

            <div id="registerForm" class="form-content active">
                <form id="registrationForm" enctype="multipart/form-data" action="signup.php" method="post">
                    <div class="form-row">
                        <div class="form-column">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-column">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div class="form-column">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-column">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" required>
                        </div>
                        <div class="form-column">
                            <label for="userType">User Type</label>
                            <select id="userType" name="userType" required>
                                <option value="">Select User Type</option>
                                <option value="jobSeeker">Job Seeker</option>
                                <option value="employer">Employer</option>
                                <option value="company">Company</option>
                                <option value="college">College</option>
                            </select>
                        </div>
                    </div>

                    <!-- Job Seeker Additional Fields -->
                    <div id="jobSeekerFields" class="additional-fields">
                        <div class="form-row">
                            <div class="form-column">
                                <label for="collegeName">College Name:</label>
                                <input type="text" id="collegeName" name="collegeName">
                            </div>
                            <div class="form-column">
                                <label for="studentId">Student ID:</label>
                                <input type="text" id="studentId" name="studentId">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label for="academicDetails">Academic Details:</label>
                                <textarea id="academicDetails" name="academicDetails"></textarea>
                            </div>
                            <div class="form-column">
                                <label for="academicProofs" class="custom-file-upload"><i
                                        class="fa fa-upload"></i>Upload Academic Proofs:</label>
                                <input type="file" id="academicProofs" name="academicProofs">
                                <span class="file-name" id="fileName">No file chosen</span>
                            </div>
                        </div>
                    </div>

                    <!-- Employer Additional Fields -->
                    <div id="employerFields" class="additional-fields">
                        <div class="form-row">
                            <div class="form-column">
                                <label for="companyName">Company Name:</label>
                                <input type="text" id="companyName" name="companyName">
                            </div>
                            <div class="form-column">
                                <label for="employeeId">Employee ID:</label>
                                <input type="text" id="employeeId" name="employeeId">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label for="position">Position/Title:</label>
                                <input type="text" id="position" name="position">
                            </div>
                            <div class="form-column">
                                <label for="employmentProof" class="custom-file-upload"><i
                                        class="fa fa-upload"></i>Upload Employment Proof:</label>
                                <input type="file" id="employmentProof" name="employmentProof">
                                <span class="file-name" id="fileName">No file chosen</span>
                            </div>
                        </div>
                    </div>

                    <!-- Company Additional Fields -->
                    <div id="companyFields" class="additional-fields">
                        <div class="form-row">
                            <div class="form-column">
                                <label for="companyRegNumber">Company Registration Number:</label>
                                <input type="text" id="companyRegNumber" name="companyRegNumber">
                            </div>
                            <div class="form-column">
                                <label for="companyAddress">Company Address:</label>
                                <input type="text" id="companyAddress" name="companyAddress">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label for="contactPersonName">Contact Person Name:</label>
                                <input type="text" id="contactPersonName" name="contactPersonName">
                            </div>
                            <div class="form-column">
                                <label for="contactPersonEmail">Contact Person Email:</label>
                                <input type="email" id="contactPersonEmail" name="contactPersonEmail">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label for="companyProof" class="custom-file-upload"><i class="fa fa-upload"></i>Upload
                                    Company Proof:</label>
                                <input type="file" id="companyProof" name="companyProof">
                                <span class="file-name" id="fileName">No file chosen</span>
                            </div>
                        </div>
                    </div>

                    <!-- College Additional Fields -->
                    <div id="collegeFields" class="additional-fields">
                        <div class="form-row">
                            <div class="form-column">
                                <label for="collegeRegNumber">College Registration Number:</label>
                                <input type="text" id="collegeRegNumber" name="collegeRegNumber">
                            </div>
                            <div class="form-column">
                                <label for="collegeAddress">College Address:</label>
                                <input type="text" id="collegeAddress" name="collegeAddress">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label for="contactPersonNameCollege">Contact Person Name:</label>
                                <input type="text" id="contactPersonNameCollege" name="contactPersonNameCollege">
                            </div>
                            <div class="form-column">
                                <label for="contactPersonEmailCollege">Contact Person Email:</label>
                                <input type="email" id="contactPersonEmailCollege" name="contactPersonEmailCollege">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-column">
                                <label for="collegeProof" class="custom-file-upload"><i class="fa fa-upload"></i>Upload
                                    College Proof:</label>
                                <input type="file" id="collegeProof" name="collegeProof">
                                <span class="file-name" id="fileName">No file chosen</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit">Register</button>
                </form>
            </div>

            <div id="loginForm" class="form-content">
                <form action="login.php" method="post">
                    <div class="form-row login-form">
                        <div class="form-column">
                            <label for="loginEmail">Email</label>
                            <input type="email" id="loginEmail" name="loginEmail" required>
                        </div>
                        <div class="form-column">
                            <label for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" name="loginPassword" required>
                        </div>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Benefits Section -->
    <section class="benefits" data-aos="fade-up">
        <h1>Enhance Your Job Search and Recruitment Process</h1>
        <p>Experience a streamlined job hunting and hiring journey. Job seekers can easily find opportunities, employers
            can fill vacancies <br>efficiently, and the admin ensures smooth platform management.</p>

        <div class="row">
            <div class="benefits-col" data-aos="fade-up">
                <img src="images/icon_discover_oppurtunities.svg" alt="">
                <h3>Discover Oppurtunities</h3>
                <p>Job seekers can easily discover and apply for relevant job opportunities.</p>
            </div>
            <div class="benefits-col" data-aos="fade-up" data-aos-delay="100">
                <img src="images/icon_efficient_hiring.svg" alt="">
                <h3>Efficient Hiring Process</h3>
                <p>Employers can quickly fill open positions with suitable candidates.</p>
            </div>
            <div class="benefits-col" data-aos="fade-up" data-aos-delay="200">
                <img src="images/icon_easy_connection.svg" alt="">
                <h3>Easy Connection Process</h3>
                <p>Connects job seekers with opportunities and employers with talent seamlessly.</p>
            </div>
        </div>
    </section>

    <!-- Modules Section -->
    <section class="modules">
        <div class="row1" data-aos="fade-up">
            <div class="imgWrapper">
                <img src="images/job_seeker.svg" alt="">
            </div>
            <div class="contentWrapper">
                <div class="content">
                    <h2>Discover Your Next Career Opportunity</h2>
                    <p>Browse thousands of job listings and find your dream job today.</p>
                    <div class="subpoints">
                        <div class="subpoint" data-aos="fade-up" data-aos-delay="100">
                            <img src="images/icon_js_module_1.svg" alt="Personalized Job Recommendations">
                            <p>Receive tailored job suggestions based on your profile.</p>
                        </div>
                        <div class="subpoint" data-aos="fade-up" data-aos-delay="200">
                            <img src="images/icon_js_module_2.svg" alt="Instant Application Updates">
                            <p>Get real-time notifications on your application status.</p>
                        </div>
                        <div class="subpoint" data-aos="fade-up" data-aos-delay="300">
                            <img src="images/icon_js_module_3.svg" alt="Expert Career Advice">
                            <p>Access resources to improve your resume and interview skills.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row1" data-aos="fade-up">
            <div class="contentWrapper">
                <div class="content">
                    <span class="textWrapper">
                        <span>Job Seeker Module</span>
                    </span>
                    <h2>Hire Top Talent Effortlessly</h2>
                    <p>Post your job openings and connect with qualified candidates.</p>
                    <div class="subpoints">
                        <div class="subpoint" data-aos="fade-up" data-aos-delay="100">
                            <img src="images/icon_js_module_1.svg" alt="Personalized Job Recommendations">
                            <p>Reach the right candidates with our advanced targeting tools.</p>
                        </div>
                        <div class="subpoint" data-aos="fade-up" data-aos-delay="200">
                            <img src="images/icon_js_module_2.svg" alt="Instant Application Updates">
                            <p>Easily track and manage applications in one place.</p>
                        </div>
                        <div class="subpoint" data-aos="fade-up" data-aos-delay="300">
                            <img src="images/icon_js_module_3.svg" alt="Expert Career Advice">
                            <p>Gain insights into your hiring process with detailed reports.</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="imgWrapper">
                <img src="images/employer.svg" alt="" style="height: 100%;width: 100%;">
            </div>
        </div>
    </section>
    <!-- Pricing Section -->
    <section class="pricing-section">
        <h2 class="pricing-heading">Explore Our Pricing Tiers</h2>
        <div class="wrapper" data-aos="fade-up">
            <div class="card">
                <h3>Free</h3>
                <h1>Free</h1>
                <p>Free Plan</p>
                <ul>
                    <li><i class="fa fa-check-square"></i>Basic Job Posting (up to 3/month)</li>
                    <li><i class="fa fa-check-square"></i>Applicant Access (10/listing)</li>
                    <li><i class="fa fa-check-square"></i>Basic Support (48-hour response)</li>
                    <li><i class="fa fa-check-square"></i>Basic Analytics</li>
                    <li><i class="fa fa-check-square"></i>Job Post Duration (15 Days)</li>
                </ul>
                <a href="#">Choose plan</a>
            </div>

            <div class="card">
                <h3>Standard</h3>
                <h1>$29</h1>
                <p>Standard Plan</p>
                <ul>
                    <li><i class="fa fa-check-square"></i>Standard Job Posting (up to 10/month)</li>
                    <li><i class="fa fa-check-square"></i>Applicant Access (50/listing)</li>
                    <li><i class="fa fa-check-square"></i>Standard Support (24-hour response)</li>
                    <li><i class="fa fa-check-square"></i>Enhanced Analytics</li>
                    <li><i class="fa fa-check-square"></i>Job Post Duration (30 Days)</li>
                </ul>
                <a href="#">Choose plan</a>
            </div>

            <div class="card active">
                <h3>Premium</h3>
                <h1>$49</h1>
                <p>Premium Plan</p>
                <ul>
                    <li><i class="fa fa-check-square"></i>Premium Job Posting (up to 20/month)</li>
                    <li><i class="fa fa-check-square"></i>Full Applicant Access (unlimited)</li>
                    <li><i class="fa fa-check-square"></i>Priority Support (email and chat)</li>
                    <li><i class="fa fa-check-square"></i>Comprehensive Analytics</li>
                    <li><i class="fa fa-check-square"></i>Job Post Duration (45 Days)</li>
                </ul>
                <a href="#">Choose plan</a>
            </div>

            <div class="card">
                <h3>Ultimate</h3>
                <h1>$99</h1>
                <p>Ultimate Plan</p>
                <ul>
                    <li><i class="fa fa-check-square"></i>Unlimited Job Posting</li>
                    <li><i class="fa fa-check-square"></i>Full Applicant Access (unlimited)</li>
                    <li><i class="fa fa-check-square"></i>Dedicated Support (24/7)</li>
                    <li><i class="fa fa-check-square"></i>Advanced Analytics and Insights</li>
                    <li><i class="fa fa-check-square"></i>Job Post Duration (60 Days)</li>
                </ul>
                <a href="#">Choose plan</a>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="test-container" data-aos="fade-up">
        <h2 class="testimonial-heading">Hear from Our Satisfied Clients</h2>
        <div class="testimonial mySwiper">
            <div class="test-content swiper-wrapper">
                <div class="slide swiper-slide">
                    <img src="images/testimonial2.jpg" alt="" class="image">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, numquam?</p>
                    <i class="fa fa-quote-left quote-icon"></i>

                    <div class="details">
                        <span class="name">Marnie Lotter</span>
                        <span class="job">Web Developer</span>
                    </div>
                </div>
                <div class="slide swiper-slide">
                    <img src="images/testimonial1.jpg" alt="" class="image">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, numquam?</p>
                    <i class="fa fa-quote-left quote-icon"></i>

                    <div class="details">
                        <span class="name">Marnie Lotter</span>
                        <span class="job">Web Developer</span>
                    </div>
                </div>
                <div class="slide swiper-slide">
                    <img src="images/testimonial3.jpg" alt="" class="image">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, numquam?</p>
                    <i class="fa fa-quote-left quote-icon"></i>

                    <div class="details">
                        <span class="name">Marnie Lotter</span>
                        <span class="job">Web Developer</span>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next nav-btn"></div>
            <div class="swiper-button-prev nav-btn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <div class="wrapper-faq" data-aos="fade-up">
        <h1>Frequently Asked Questions</h1>

        <div class="faq" data-aos="fade-up" data-aos-delay="100">
            <button class="accordion">
                What is an online job portal?
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="panel">
                <p>An online job portal is a website that connects job seekers with employers. It allows users to search
                    for jobs, apply for positions, and post resumes, while employers can post job listings and search
                    for suitable candidates.</p>
            </div>
        </div>

        <div class="faq" data-aos="fade-up" data-aos-delay="200">
            <button class="accordion">
                How do I create an account on the job portal?
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="panel">
                <p>To create an account, click on the "Sign Up" or "Register" button on the homepage, fill out the
                    required information such as your name, email, and password, and then follow the instructions to
                    complete the registration process.</p>
            </div>
        </div>

        <div class="faq" data-aos="fade-up" data-aos-delay="300">
            <button class="accordion">
                How do I search for jobs?
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="panel">
                <p>After logging in, use the search bar on the homepage to enter keywords, job titles, or company names.
                    You can also use filters to narrow down your search based on location, industry, job type, and more.
                </p>
            </div>
        </div>

        <div class="faq" data-aos="fade-up" data-aos-delay="400">
            <button class="accordion">
                How can I apply for a job?
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="panel">
                <p>Once you find a job listing that interests you, click on it to view the job details. Then, click the
                    "Apply" button and follow the instructions to submit your application, which may include uploading
                    your resume and cover letter.</p>
            </div>
        </div>

        <div class="faq" data-aos="fade-up" data-aos-delay="500">
            <button class="accordion">
                How do I update my profile information?
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="panel">
                <p>To update your profile information, log in to your account, go to your profile or account settings,
                    and make the necessary changes to your personal details, resume, or other relevant information.
                    Remember to save your changes.</p>
            </div>
        </div>

        <div class="faq" data-aos="fade-up" data-aos-delay="600">
            <button class="accordion">
                How do I contact customer support?
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="panel">
                <p>If you need assistance, you can contact customer support by clicking on the "Contact Us" or "Help"
                    section on the website. You can usually find support options such as email, phone, or live chat for
                    quick assistance.</p>
            </div>
        </div>
    </div>

    <div class="contactUs" data-aos="fade-up">
        <div class="title">
            <h2>Get in Touch</h2>
        </div>
        <div class="box">
            <div class="contact form" data-aos="fade-up" data-aos-delay="100">
                <h3>Send a Message</h3>
                <form action="">
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>First Name</span>
                                <input type="text" placeholder="John">
                            </div>
                            <div class="inputBox">
                                <span>Last Name</span>
                                <input type="text" placeholder="Doe">
                            </div>
                        </div>
                        <div class="row50">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" placeholder="johndoe@gmail.com">
                            </div>
                            <div class="inputBox">
                                <span>Mobile</span>
                                <input type="text" placeholder="+91 987 6543 210">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <span>Message</span>
                                <textarea placeholder="Write Your Message here..."></textarea>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="contact info" data-aos="fade-up" data-aos-delay="200">
                <h3>Contact Info</h3>
                <div class="infoBox">
                    <div>
                        <span><i class="fa fa-map-marker"></i></span>
                        <p>Guntur, Andhra Pradesh <br>INDIA</p>
                    </div>
                    <div>
                        <span><i class="fa fa-envelope"></i>
                        </span>
                        <a href="mailto:eswarreddygangavarapu@gmail.com">eswarreddygangavarapu@gmail.com</a>
                    </div>
                    <div>
                        <span><i class="fa fa-phone"></i></span>
                        <a href="tel:+916304132185">+91 6304 132 185</a>
                    </div>
                    <ul class="sci">
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="contact map" data-aos="fade-up" data-aos-delay="300">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61263.805117283686!2d80.39331873134502!3d16.323566604498545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a4a755cb1787785%3A0x9f7999dd90f1e694!2sGuntur%2C%20Andhra%20Pradesh!5e0!3m2!1sen!2sin!4v1722885504983!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>
    <section>
        <div class="about-us" data-aos="fade-up">
            <h1>About Us</h1>
            <div class="wrapper-about">
                <div class="content">
                    <h3>Your Gateway to Career Opportunities</h3>
                    <p>Welcome to JOB SPOT, your ultimate online job portal connecting job seekers with employers across
                        various industries. At JOB SPOT, we believe in empowering individuals by providing a platform
                        that makes job searching and recruitment seamless and efficient. Whether you are a recent
                        graduate, an experienced professional, or an employer looking for the perfect candidate, JOB
                        SPOT is here to help you achieve your career goals.</p>
                    <div class="read-more-btn">
                        <a href="">Read More</a>
                    </div>
                    <!-- <div class="about-social">
                        <a href=""><i class="fa fa-facebook-square"></i></a>
                        <a href="#"><i class="fa fa-twitter-square"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div> -->
                </div>
                <div class="about-image">
                    <img src="images/about-us-image.avif" alt="About Us - JOB SPOT">
                </div>
            </div>
        </div>

    </section>

    <footer>
        <div class="footer-col" data-aos="fade-up">
            <h4>Products</h4>
            <ul>
                <li><a href="#">teams</a></li>
                <li><a href="#">advertising</a></li>
                <li><a href="#">talent</a></li>
            </ul>
        </div>
        <div class="footer-col" data-aos="fade-up" data-aos-delay="100">
            <h4>Network</h4>
            <ul>
                <li><a href="#">technology</a></li>
                <li><a href="#">science</a></li>
                <li><a href="#">business</a></li>
                <li><a href="#">professional</a></li>
                <li><a href="#">API</a></li>
            </ul>
        </div>
        <div class="footer-col" data-aos="fade-up" data-aos-delay="200">
            <h4>company</h4>
            <ul>
                <li><a href="#">about</a></li>
                <li><a href="#">legal</a></li>
                <li><a href="#">contact us</a></li>
            </ul>
        </div>
        <div class="footer-col" data-aos="fade-up" data-aos-delay="300">
            <h4>follow us</h4>
            <div class="links">
                <a href="#"><i class="fa fa-facebook-square"></i></a>
                <a href="#"><i class="fa fa-twitter-square"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </footer>


    <script src="js/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="js/script.js"></script>
    <script src="js/signup.js"></script>
    <script></script>
</body>

</html>