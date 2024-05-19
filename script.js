
let bars = document.querySelector("#bars");
let mobileNav = document.querySelector(".mobile-nav");
bars.addEventListener('click', () => {
  mobileNav.classList.add("active-nav");
})
let exitIcon = document.querySelector("#exit-icon");
exitIcon.addEventListener('click', () => {
  mobileNav.classList.remove("active-nav");
})
let searchBtn = document.querySelector('#search-btn');
let searchForm = document.querySelector('.searchForm');
searchBtn.addEventListener('click',()=>{
  searchForm.classList.toggle("d-none");
})

