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
function validateCate(){
  const categoryName = document.querySelector('#category-name');
  const categoryErr = document.querySelector('#categoryErr');
  if(categoryName.value==""){
    categoryErr.innerHTML = 'Enter category name'
    return false;
  }else{
    return true
  }
}

function validateProduct(){
  const productName = document.querySelector("#p-name");
  const size = document.querySelector("#size");
  const category = document.querySelector("#category");
  const price = document.querySelector("#price");
  const description = document.querySelector("#description");
  const image = document.querySelector("#image");
  const pNAmeErr = document.querySelector('#p-name-error');
  const sizeErr = document.querySelector('#size-error');
  const categoryErr = document.querySelector('#category-error');
  const priceErr = document.querySelector('#price-error');
  const descriptionErr = document.querySelector('#description-error');
  const imageErr = document.querySelector('#image-error');
  let isvalid = true;
  pNAmeErr.innerHTML = sizeErr.innerHTML = categoryErr.innerHTML = priceErr.innerHTML = descriptionErr.innerHTML = imageErr.innerHTML = "";
  if(productName.value==""){
    isvalid = false;
    pNAmeErr.innerHTML = "Enter product name";
  }
  if(size.value==""){
    isvalid = false;
    sizeErr.innerHTML = "Enter product size";
  }
  if(category.value==""){
    isvalid = false;
    categoryErr.innerHTML = "Enter category";
  }
  if(price.value==""){
    isvalid = false;
    priceErr.innerHTML = "Enter product price";
  }
  if(description.value==""){
    isvalid = false;
    descriptionErr.innerHTML = "Enter product description";
  }

  return isvalid;
}