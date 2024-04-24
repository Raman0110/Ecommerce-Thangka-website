<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css" />
</head>

<body>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $registermsg = "";
    if (isset($_POST['login'])) {
      $userName = $_POST['username'];
      $password = $_POST['password'];
      $userErr = '';
      $sql = "SELECT * FROM users where username = '$userName' and password = '$password'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $isAdmin = $row['isadmin'];
        if($isAdmin){
          header('location:Admin/dashboard.php');
        }else{
          header('location:index.html');
        }
      } else {
        $userErr = 'Invalid username or passowrd';
      }
    } elseif (isset($_POST['submit'])) {
      $userName = $_POST['nusername'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $password = $_POST['npassword'];
      $sql = "INSERT INTO users(username,phone,email,password) values('$userName','$phone','$email','$password')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $registermsg = "User account created you may login";
      }else{
        $registermsg = "User account creation failed";
      }
    }
  }




  ?>
  <div class="form-container">
    <div>
      <?php echo $registermsg?>
    <div class="form-box">
      <div class="option-btn">
        <button class="tab-btn btn active-btn" data-target="#login-form">
          Login
        </button>
        <button class="tab-btn btn" data-target="#register-form">
          Signup
        </button>
      </div>
      <h2>Welcome</h2>
      <div class="login-form forms-tab d-block" id="login-form">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateLogin()" method="POST">
          <div class="flex">
            <i class="fa fa-user"></i><input type="text" name="username" id="l-username" placeholder="Username" />
          </div>
          <p class="error" id="l-username-err"></p>
          <div class="flex">
            <i class="fa fa-key"></i><input type="password" name="password" id="l-password" placeholder="Password" />
          </div>
          <p class="error" id="l-password-err"></p>
          <p class="error"><?php echo $userErr ?></p>
          <button type="submit" class="login-submit btn" id="login-btn" name="login">
            Login
          </button>
        </form>
      </div>
      <div class="register-form forms-tab" id="register-form">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validateSignup()" method="POST">
          <div class="flex">
            <i class="fa fa-user"></i><input type="text" name="nusername" id="r-username" placeholder="Username" />
          </div>
          <p class="error" id="r-username-err"></p>
          <div class="flex">
            <i class="fa fa-phone"></i><input type="number" name="phone" id="phone" placeholder="Phone" />
          </div>
          <p class="error" id="phone-err"></p>
          <div class="flex">
            <i class="fa fa-envelope"></i><input type="email" name="email" id="email" placeholder="Email" />
          </div>
          <p class="error" id="email-err"></p>
          <div class="flex">
            <i class="fa fa-key"></i><input type="password" name="npassword" id="password" placeholder="Password" />
          </div>
          <p class="error" id="r-password-err"></p>
          <div class="flex">
            <i class="fa fa-key"></i><input type="password" name="cpassword" id="c-password" placeholder="Confirm Password" />
          </div>
          <p class="error" id="r-cpassword-err"></p>
          <button type="submit" class="login-submit btn" id="signup-btn" name="submit">
            Signup
          </button>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script>
    const tabBtns = document.querySelectorAll(".tab-btn");
    const formTabs = document.querySelectorAll(".forms-tab");
    tabBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        tabBtns.forEach((button) => button.classList.remove("active-btn"));
        btn.classList.add("active-btn");
        formTabs.forEach((tab) => tab.classList.remove("d-block"));
        let btnAttribute = btn.getAttribute("data-target");
        document.querySelector(btnAttribute).classList.add("d-block");
      });
    });

    function validateLogin() {
      const loginUname = document.querySelector("#l-username");
      const loginPassword = document.querySelector("#l-password");
      let loginUnameErr = document.querySelector("#l-username-err");
      let loginpasswordErr = document.querySelector("#l-password-err");
      loginUnameErr.innerHTML = loginpasswordErr.innerHTML = "";
      let isValid = true;
      if (loginUname.value === "") {
        isValid = false;
        loginUnameErr.innerHTML = "Enter your username";
      }
      if (loginPassword.value === "") {
        isValid = false;
        loginpasswordErr.innerHTML = "Enter your password";
      }
      return isValid;
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
  </script>
</body>

</html>