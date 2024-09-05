document.addEventListener("DOMContentLoaded", function () {
    const profileButton = document.getElementById("profileButton");
    const profilePopup = document.getElementById("profilePopup");
    const closePopup = document.getElementById("closePopup");
    const editProfileBtn = document.getElementById('editProfileBtn');
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    const profilePic = document.getElementById("profilePic");
    const profilePicUpload = document.getElementById("profilePicUpload");
    const uploadBtn = document.getElementById("uploadBtn");

    // Toggle Profile Popup
    profileButton.addEventListener("click", function () {
        profilePopup.classList.toggle("active");
    });

    closePopup.addEventListener("click", function () {
        profilePopup.classList.remove("active");
    });

    // Edit Profile
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
    });

    // Upload Profile Picture
    uploadBtn.addEventListener("click", function () {
        profilePicUpload.click();
    });

    profilePicUpload.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profilePic.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});
