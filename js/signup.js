document.addEventListener('DOMContentLoaded', function() {
    const registerBtn = document.getElementById('register-btn');
    const signInBtn = document.getElementById('signIn-btn');
    const overlay = document.getElementById('overlay');
    const formSection = document.getElementById('form-section');
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    const registerTab = document.getElementById('registerTab');
    const loginTab = document.getElementById('loginTab');
    const userType = document.getElementById('userType');
    const additionalFields = {
        jobSeeker: document.getElementById('jobSeekerFields'),
        employer: document.getElementById('employerFields'),
        company: document.getElementById('companyFields'),
        college: document.getElementById('collegeFields'),
    };
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.form-content');
    const closeBtn = document.getElementById('form-close-btn');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const target = this.getAttribute('data-target');

            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('active'));

            // Add active class to the clicked tab
            this.classList.add('active');

            // Hide all tab contents
            tabContents.forEach(content => content.classList.remove('active'));

            // Show the targeted tab content
            document.querySelector(`#${target}`).classList.add('active');
        });
    });

    function showOverlay() {
        overlay.style.display = 'block';
        formSection.style.display = 'block';
    }

    function hideOverlay() {
        overlay.style.display = 'none';
        formSection.style.display = 'none';
    }

    registerBtn.addEventListener('click', function() {
        registerForm.classList.add('active');
        loginForm.classList.remove('active');
        showOverlay();
    });

    signInBtn.addEventListener('click', function() {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
        showOverlay();
    });

    overlay.addEventListener('click', hideOverlay);

    registerTab.addEventListener('click', function() {
        registerForm.classList.add('active');
        loginForm.classList.remove('active');
    });

    loginTab.addEventListener('click', function() {
        loginForm.classList.add('active');
        registerForm.classList.remove('active');
    });

    closeBtn.addEventListener('click', function() {
        hideOverlay();
    });

    userType.addEventListener('change', function() {
        Object.values(additionalFields).forEach(field => {
            field.style.display = 'none';
        });
        if (userType.value) {
            additionalFields[userType.value].style.display = 'block';
        }
    });
});


const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const fileName = this.nextElementSibling;
            if (this.files.length > 0) {
                fileName.textContent = this.files[0].name;
            } else {
                fileName.textContent = 'No file chosen';
            }
        });
    });