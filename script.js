
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
let buyBtn = document.querySelector('#buy-btn');
let orderMsg = document.querySelector('.order-msg');
buyBtn.addEventListener('click',()=>{
  orderMsg.classList.remove("d-none");
})
let okBtn = document.querySelector('#ok-btn');
okBtn.addEventListener('click',()=>{
  orderMsg.classList.add("d-none");
})

