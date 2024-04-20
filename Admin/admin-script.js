let dropdown = document.querySelectorAll('.dropdown');
let dropdownMenu = document.querySelectorAll('.dropdown-menu');
dropdown.forEach((item) => {
  item.addEventListener('click', () => {
    let dropdownItems = item.querySelector('.dropdown-menu');
    dropdownMenu.forEach((menu) => {
      if (dropdownItems != menu) {
        menu.classList.add('d-none')
      }
    });
    dropdownItems.classList.toggle('d-none');
  })
});
function validateCate() {
  const categoryName = document.querySelector('#category-name');
  const categoryErr = document.querySelector('#categoryErr');
  if (categoryName.value == "") {
    categoryErr.innerHTML = 'Enter category name'
    return false;
  } else {
    return true
  }
}

function validateProduct() {
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
  const allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];
  let isvalid = true;
  pNAmeErr.innerHTML = sizeErr.innerHTML = categoryErr.innerHTML = priceErr.innerHTML = descriptionErr.innerHTML = imageErr.innerHTML = "";
  if (productName.value == "") {
    isvalid = false;
    pNAmeErr.innerHTML = "Enter product name";
  }
  if (size.value == "") {
    isvalid = false;
    sizeErr.innerHTML = "Enter product size";
  }
  if (category.value == "") {
    isvalid = false;
    categoryErr.innerHTML = "Enter category";
  }
  if (price.value == "") {
    isvalid = false;
    priceErr.innerHTML = "Enter product price";
  }
  if (description.value == "") {
    isvalid = false;
    descriptionErr.innerHTML = "Enter product description";
  }
  if (image.value != "") {
    const imgType = image.files[0].type;
    if (!allowedTypes.includes(imgType)) {
      isvalid = false;
      imageErr.innerHTML = "Image must be in .jpg, .jpeg or .png";
    }
  }
  else {
    isvalid = false;
    imageErr.innerHTML = "Upload product image";
  }

  return isvalid;
}

function validateBlog() {
  const blogName = document.querySelector('#b-name');
  const blogCategory = document.querySelector('#b-category');
  const blogDescription = document.querySelector('#b-description');
  const bImage = document.querySelector('#b-image')
  const bNameErr = document.querySelector('#b-name-error');
  const bCategoryErr = document.querySelector('#b-category-error');
  const bDescriptionErr = document.querySelector('#b-description-error');
  const imageErr = document.querySelector('#b-image-error');
  const allowedTypes = ['image/jpg', 'image/jpeg', 'image.png'];
  bNameErr.innerHTML = bCategoryErr.innerHTML = bDescriptionErr.innerHTML = imageErr.innerHTML = "";
  let isvalid = true;
  if (blogName.value == "") {
    isvalid = false;
    bNameErr.innerHTML = "Enter blog name"
  }
  if (blogCategory.value == "") {
    isvalid = false;
    bCategoryErr.innerHTML = "Select blog category"
  }
  if (blogDescription.value == "") {
    isvalid = false;
    bDescriptionErr.innerHTML = "Enter short description";
  }
  if (bImage.value != "") {
    const imgType = bImage.files[0].type;
    if (!allowedTypes.includes(imgType)) {
      isvalid = false;
      imageErr.innerHTML = "Image must be in .jpg, .jpeg or .png";
    }
  } else {
    isvalid = false;
    imageErr.innerHTML = "Upload a image";

  }

  return isvalid;
}