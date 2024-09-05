var navLinks = document.getElementById("navLinks");

function showMenu(){
    navLinks.style.right ="0px";
}
function hideMenu(){
    
    navLinks.style.right ="-200px";
}
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    grabCursor: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
  });



AOS.init({
    duration: 1000, // Duration of animation
    easing: 'ease-in-out', // Easing function for animation
    once: true, // Whether animation should happen only once
    mirror: false, // Whether elements should animate out while scrolling past them
});

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        // Close all other open panels
        for (var j = 0; j < acc.length; j++) {
            if (acc[j] !== this) {
                acc[j].classList.remove("active");
                acc[j].parentElement.classList.remove("active");
                acc[j].nextElementSibling.style.display = "none";
            }
        }

        // Toggle the clicked panel
        this.classList.toggle("active");
        this.parentElement.classList.toggle("active");
        var panel = this.nextElementSibling;
        
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
