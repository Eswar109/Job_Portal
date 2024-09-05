document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("progress-bar");
    const step1Content = document.getElementById("step1-content");
    const step2Content = document.getElementById("step2-content");
    const step3Content = document.getElementById("step3-content");

    function resetSteps() {
        progressBar.style.width = "0"; // Reset the progress bar
        step1Content.classList.add("active");
        step2Content.classList.remove("active");
        step3Content.classList.remove("active");

        document.querySelectorAll('.step').forEach(step => {
            step.classList.remove('active', 'completed');
        });

        document.querySelectorAll('.step')[0].classList.add('completed');
        document.querySelectorAll('.step')[1].classList.add('active');
    }

    function animateProgress() {
        resetSteps();

        setTimeout(() => {
            progressBar.style.width = "50%"; // Progress to step 2
            step1Content.classList.remove("active");
            step2Content.classList.add("active");

            document.querySelectorAll('.step')[1].classList.remove('active');
            document.querySelectorAll('.step')[1].classList.add('completed');
            document.querySelectorAll('.step')[2].classList.add('active');
        }, 2000); // Adjust timing for progress to step 2

        setTimeout(() => {
            progressBar.style.width = "100%"; // Progress to step 3
            step2Content.classList.remove("active");
            step3Content.classList.add("active");

            document.querySelectorAll('.step')[2].classList.remove('active');
            document.querySelectorAll('.step')[2].classList.add('completed');
        }, 4000); // Adjust timing for progress to step 3

        setTimeout(() => {
            animateProgress(); // Repeat the animation loop
        }, 6000); // Adjust timing for when to reset and loop
    }

    animateProgress();
});
