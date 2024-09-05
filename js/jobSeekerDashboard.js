document.addEventListener('DOMContentLoaded', () => {
    const profileButton = document.getElementById('profileButton');
    const profilePopup = document.getElementById('profilePopup');
    const editProfileBtn = document.getElementById('editProfileBtn');
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    const profileName = document.getElementById('profileName');
    const profileEmail = document.getElementById('profileEmail');
    const profilePhone = document.getElementById('profilePhone');
    const profileLocation = document.getElementById('profileLocation');
    const profileNameEdit = document.getElementById('profileNameEdit');
    const profileEmailEdit = document.getElementById('profileEmailEdit');
    const profilePhoneEdit = document.getElementById('profilePhoneEdit');
    const profileLocationEdit = document.getElementById('profileLocationEdit');
    const profilePicUpload = document.getElementById('profilePicUpload');
    const uploadBtn = document.getElementById('uploadBtn');
    const closePopupBtn = document.getElementById('closePopup');
    const statusFilter = document.getElementById('statusFilter');
    const appliedJobs = document.getElementById('appliedJobs');
    const jobSearchInput = document.getElementById('jobSearchInput');

    // Profile popup toggle
    profileButton.addEventListener('click', () => {
        profilePopup.classList.toggle('active');
    });

    closePopupBtn.addEventListener('click', () => {
        profilePopup.classList.remove('active');
    });

    // Edit profile functionality
    editProfileBtn.addEventListener('click', () => {
        profileName.classList.add('hidden');
        profileEmail.classList.add('hidden');
        profilePhone.classList.add('hidden');
        profileLocation.classList.add('hidden');
        profileNameEdit.classList.remove('hidden');
        profileEmailEdit.classList.remove('hidden');
        profilePhoneEdit.classList.remove('hidden');
        profileLocationEdit.classList.remove('hidden');
        editProfileBtn.classList.add('hidden');
        saveProfileBtn.classList.remove('hidden');
        profileNameEdit.classList.add('show');
        profileEmailEdit.classList.add('show');
        profilePhoneEdit.classList.add('show');
        profileLocationEdit.classList.add('show');
    });

    saveProfileBtn.addEventListener('click', () => {
        profileName.textContent = profileNameEdit.value || profileName.textContent;
        profileEmail.textContent = profileEmailEdit.value || profileEmail.textContent;
        profilePhone.textContent = profilePhoneEdit.value || profilePhone.textContent;
        profileLocation.textContent = profileLocationEdit.value || profileLocation.textContent;

        profileName.classList.remove('hidden');
        profileEmail.classList.remove('hidden');
        profilePhone.classList.remove('hidden');
        profileLocation.classList.remove('hidden');
        profileNameEdit.classList.add('hidden');
        profileEmailEdit.classList.add('hidden');
        profilePhoneEdit.classList.add('hidden');
        profileLocationEdit.classList.add('hidden');
        editProfileBtn.classList.remove('hidden');
        saveProfileBtn.classList.add('hidden');
        profileNameEdit.classList.remove('show');
        profileEmailEdit.classList.remove('show');
        profilePhoneEdit.classList.remove('show');
        profileLocationEdit.classList.remove('show');
    });

    // Profile picture upload
    uploadBtn.addEventListener('click', () => {
        profilePicUpload.click();
    });

    profilePicUpload.addEventListener('change', () => {
        const file = profilePicUpload.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('profilePic').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Job status filter
    statusFilter.addEventListener('change', () => {
        const selectedStatus = statusFilter.value;
        Array.from(appliedJobs.children).forEach(jobCard => {
            if (selectedStatus === 'all' || jobCard.dataset.status === selectedStatus) {
                jobCard.style.display = '';
            } else {
                jobCard.style.display = 'none';
            }
        });
    });

    // Job search functionality
    jobSearchInput.addEventListener('input', () => {
        const searchTerm = jobSearchInput.value.toLowerCase();
        Array.from(appliedJobs.children).forEach(jobCard => {
            const title = jobCard.dataset.title.toLowerCase();
            if (title.includes(searchTerm)) {
                jobCard.style.display = '';
            } else {
                jobCard.style.display = 'none';
            }
        });
    });

    // Handling job cards interactions (e.g., edit, view applicants)
    document.querySelectorAll('.edit-job-btn').forEach(button => {
        button.addEventListener('click', function () {
            alert("Edit Job functionality coming soon!");
        });
    });

    document.querySelectorAll('.view-applicants-btn').forEach(button => {
        button.addEventListener('click', function () {
            alert("View Applicants functionality coming soon!");
        });
    });

    // Example job posting form submission handling
    document.getElementById('postJobForm').addEventListener('submit', function (e) {
        e.preventDefault();
        alert("Job Posted Successfully!");
        // Here you would normally handle the form submission, perhaps by sending data to a server
    });
});
