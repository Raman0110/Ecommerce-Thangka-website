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

function validateProduct(isAdd) {
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
  if (isAdd) {
    if (image.value != "") {
      const imgType = image.files[0].type;
      if (!allowedTypes.includes(imgType)) {
        isvalid = false;
        imageErr.innerHTML = "Image must be in .jpg, .jpeg or .png";
      }
    }else {
      isvalid = false;
      imageErr.innerHTML = "Upload product image";
    }
  } else {
    if (image.value != "") {
      const imgType = image.files[0].type;
      if (!allowedTypes.includes(imgType)) {
        isvalid = false;
        imageErr.innerHTML = "Image must be in .jpg, .jpeg or .png";
      }
    }
  }
  return isvalid;
}
function validateSignup() {
  const signupUname = document.querySelector("#r-username");
  const phone = document.querySelector("#phone");
  const email = document.querySelector("#email");
  const signupPassword = document.querySelector("#password");
  const signupCpassword = document.querySelector("#c-password");
  let signupUnameErr = document.querySelector("#r-username-err");
  let phoneErr = document.querySelector("#phone-err");
  let emailErr = document.querySelector("#email-err");
  let signupPasswordErr = document.querySelector("#r-password-err");
  let signupCpasswordErr = document.querySelector("#r-cpassword-err");
  signupUnameErr.innerHTML = "";
  phoneErr.innerHTML = "";
  emailErr.innerHTML = "";
  signupPasswordErr.innerHTML = "";
  signupCpasswordErr.innerHTML = "";

  let isValid = true;
  if (signupUname.value === "") {
    isValid = false;
    signupUnameErr.innerHTML = "Create a username";
  } else if (signupUname.value.length <= 6) {
    isValid = false;
    signupUnameErr.innerHTML =
      "Username should be greater than 6 characters";
  }
  if (phone.value === "") {
    isValid = false;
    phoneErr.innerHTML = "Enter your phone number";
  } else if (phone.value.length != 10) {
    isValid = false;
    phoneErr.innerHTML = "Enter valid phone number";
  }
  var validRegex = /^[a-zA-Z0-9!#_]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;
  if (email.value === "") {
    isValid = false;
    emailErr.innerHTML = "Enter email";
  } else if (!email.value.match(validRegex)) {
    isValid = false;
    emailErr.innerHTML = "Enter valid email";
  }
  if (signupPassword.value === "") {
    isValid = false;
    signupPasswordErr.innerHTML = "Create passowrd";
  } else if (signupPassword.value.length < 8) {
    isValid = false;
    signupPasswordErr.innerHTML = "Passowrd must contain 8 characters";
  }
  if (signupCpassword.value === "") {
    isValid = false;
    signupCpasswordErr.innerHTML = "Repeat your password here";
  } else if (signupCpassword.value !== signupPassword.value) {
    isValid = false;
    signupCpasswordErr.innerHTML = "Password doesn't match";
  }
  return isValid;
}

function validateBlog(isAdd) {
  const blogName = document.querySelector('#b-name');
  const blogCategory = document.querySelector('#b-category');
  const blogDescription = document.querySelector('#b-description');
  const bImage = document.querySelector('#b-image')
  const bNameErr = document.querySelector('#b-name-error');
  const bCategoryErr = document.querySelector('#b-category-error');
  const bDescriptionErr = document.querySelector('#b-description-error');
  const imageErr = document.querySelector('#b-image-error');
  const allowedTypes = ['image/jpg', 'image/jpeg', 'image/png'];
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
  if (isAdd) {
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
  } else {
    if (bImage.value != "") {
      const imgType = bImage.files[0].type;
      if (!allowedTypes.includes(imgType)) {
        isvalid = false;
        imageErr.innerHTML = "Image must be in .jpg, .jpeg or .png";
      }
    }
  }
  return isvalid;
}

function validateChangePw(){
  const currentPw = document.querySelector('#current-pw');
  const newPw = document.querySelector('#new-pw');
  const confirmPw = document.querySelector('#confirm-pw');
  let currentPwErr = document.querySelector('#current-pw-err'); 
  let newPwErr = document.querySelector('#new-pw-err'); 
  let confirmPwErr = document.querySelector('#confirm-pw-err');
  currentPwErr.innerHTML=newPwErr.innerHTML=confirmPwErr.innerHTML = "";
  let isvalid = true; 
  if(currentPw.value==""){
    isvalid = false;
    currentPwErr.innerHTML = "Enter your current password";
  }
  if(newPw.value==""){
    isvalid = false;
    newPwErr.innerHTML = "Create new password";
  }
  if(confirmPw.value==""){
    isvalid = false;
    confirmPwErr.innerHTML = "Repeat your new password";
  }
  if(newPw.value!==confirmPw.value){
    isvalid = false;
    confirmPwErr.innerHTML = "Password didn't match";
  }
  return isvalid;
}
