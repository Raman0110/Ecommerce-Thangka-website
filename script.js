var swiper = new Swiper(".banner-swiper", {
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
let bars = document.querySelector("#bars");
let mobileNav = document.querySelector(".mobile-nav");
bars.addEventListener('click', () => {
  mobileNav.classList.add("active-nav");
})
let exitIcon = document.querySelector("#exit-icon");
exitIcon.addEventListener('click', () => {
  mobileNav.classList.remove("active-nav");
})


