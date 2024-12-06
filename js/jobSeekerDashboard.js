document.addEventListener('DOMContentLoaded', () => {
    fetchAppliedJobs();
    fetchAvailableJobs();

    const profileButton = document.getElementById('profileButton');
    const profilePopup = document.getElementById('profilePopup');
    const editProfileBtn = document.getElementById('editProfileBtn');
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    const profileName = document.getElementById('profileName');
    const profileEmail = document.getElementById('profileEmail');
    const profilePhone = document.getElementById('profilePhone');
    const profileNameEdit = document.getElementById('profileNameEdit');
    const profileEmailEdit = document.getElementById('profileEmailEdit');
    const profilePhoneEdit = document.getElementById('profilePhoneEdit');

    // Profile popup toggle
    profileButton.addEventListener('click', () => {
        profilePopup.classList.toggle('active');
    });

    document.getElementById('closePopup').addEventListener('click', () => {
        profilePopup.classList.remove('active');
    });

    // Edit profile functionality
    editProfileBtn.addEventListener('click', () => {
        profileName.classList.add('hidden');
        profileEmail.classList.add('hidden');
        profilePhone.classList.add('hidden');
        profileNameEdit.value = profileName.textContent;
        profileEmailEdit.value = profileEmail.textContent;
        profilePhoneEdit.value = profilePhone.textContent;
        profileNameEdit.classList.remove('hidden');
        profileEmailEdit.classList.remove('hidden');
        profilePhoneEdit.classList.remove('hidden');
        editProfileBtn.classList.add('hidden');
        saveProfileBtn.classList.remove('hidden');
    });

    saveProfileBtn.addEventListener('click', () => {
        profileName.textContent = profileNameEdit.value || profileName.textContent;
        profileEmail.textContent = profileEmailEdit.value || profileEmail.textContent;
        profilePhone.textContent = profilePhoneEdit.value || profilePhone.textContent;
        profileName.classList.remove('hidden');
        profileEmail.classList.remove('hidden');
        profilePhone.classList.remove('hidden');
        profileNameEdit.classList.add('hidden');
        profileEmailEdit.classList.add('hidden');
        profilePhoneEdit.classList.add('hidden');
        editProfileBtn.classList.remove('hidden');
        saveProfileBtn.classList.add('hidden');
    });

    // Fetch applied jobs dynamically
    function fetchAppliedJobs() {
        fetch('get_applied_jobs.php')
            .then(response => response.json())
            .then(jobs => {
                const appliedJobsContainer = document.getElementById('appliedJobs');
                appliedJobsContainer.innerHTML = ''; // Clear any existing jobs
                jobs.forEach(job => {
                    const jobCard = document.createElement('div');
                    jobCard.classList.add('job-card');
                    jobCard.dataset.status = job.status.toLowerCase();
                    jobCard.dataset.title = job.position.toLowerCase();
                    jobCard.innerHTML = `
                        <h3>${job.position}</h3>
                        <p>Company: ${job.company_name}</p>
                        <p>Status: ${job.status}</p>
                    `;
                    appliedJobsContainer.appendChild(jobCard);
                });
            });
    }

    // Fetch available jobs dynamically
    function fetchAvailableJobs() {
        fetch('get_available_jobs.php')
            .then(response => response.json())
            .then(jobs => {
                const savedJobsContainer = document.getElementById('savedJobs');
                savedJobsContainer.innerHTML = ''; // Clear any existing jobs
                jobs.forEach(job => {
                    const jobCard = document.createElement('div');
                    jobCard.classList.add('job-card');
                    jobCard.dataset.title = job.position.toLowerCase();
                    jobCard.innerHTML = `
                        <h3>${job.position}</h3>
                        <p>Company: ${job.company_name}</p>
                        <button class="apply-btn">Apply Now</button>
                    `;
                    savedJobsContainer.appendChild(jobCard);
                });
            });
    }
});
