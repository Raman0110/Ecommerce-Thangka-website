let dropdown = document.querySelectorAll('.dropdown');
let dropdownMenu = document.querySelectorAll('.dropdown-menu');
dropdown.forEach((item)=>{
  item.addEventListener('click',()=>{
    let dropdownItems = item.querySelector('.dropdown-menu');
    dropdownMenu.forEach((menu)=>{
      if(dropdownItems!=menu){
        menu.classList.add('d-none')
      }
    });
    dropdownItems.classList.toggle('d-none');
  })
});
