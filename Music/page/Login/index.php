<?php
require("../../config.php");
session_start();
if(isset($_POST['register'])) {
  header("Location: ../SignUp/index.php");
  exit();
}
if ( isset($_POST['login'])) {
    $email =  $_POST['email'];
    $password =$_POST['password'];

    $sql = "SELECT `id` ,`lastname`, `email`, `password`, `image_url` FROM `users`  WHERE `email` = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

    
        if (password_verify($password, $storedPassword)) {
            // Login successful
            $_SESSION['user'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['lastname'];

            if ($row['image_url'] != null) {
                $_SESSION['image_url'] = $row['image_url'];
            } else {
                $_SESSION['image_url'] = "https://placehold.co/600x400";
              }

             // Store user information in the session
            header("Location: ../../index.php");
            exit();
        } else {
            // Incorrect password
            echo "Incorrect password";
        }
    } else {
        // User not found
        echo "User not found";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Log in - MUSIC</title>
  <link rel="stylesheet" href="./Style.css">
</head>

<body>

  <div class="Login">
      <div class="Form__Header">
        <div class="header">
          <div class="link__logo">Zilong</div>
          <form action="index.php" method="post">
            <button class="link__register" name="register">
              REGISTER
            </button>
          </form>

        </div>
      </div>
      <div class="Form__left">
        <img src="https://i.pinimg.com/564x/c2/b5/a9/c2b5a924d3f25847d87ecaeaf2082326.jpg" alt="ho" />
      </div>

      <div class="Form__right">
        <div class="Form__content">
          <h1>LOGIN</h1>
          <form action="" method="post">
            <div class="Form__input_email">
              <label>Email *</label>
              <div class="input">
                <input placeholder="Your email here..." id="email" type="email" name="email" />
              </div>

            </div>
            <div class="Form__input__password">
              <label>Password *</label>
              <div class="input">
                <input type="password" placeholder="Your password here..." name="password" id="password" />
                <div class="svg" onClick={togglePasswordVisibility}>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" strokeMiterlimit="10" strokeWidth="32" />
                  </svg>
                  <!-- <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"
                      >
                        <path d="M432 448a15.92 15.92 0 01-11.31-4.69l-352-352a16 16 0 0122.62-22.62l352 352A16 16 0 01432 448zM255.66 384c-41.49 0-81.5-12.28-118.92-36.5-34.07-22-64.74-53.51-88.7-91v-.08c19.94-28.57 41.78-52.73 65.24-72.21a2 2 0 00.14-2.94L93.5 161.38a2 2 0 00-2.71-.12c-24.92 21-48.05 46.76-69.08 76.92a31.92 31.92 0 00-.64 35.54c26.41 41.33 60.4 76.14 98.28 100.65C162 402 207.9 416 255.66 416a239.13 239.13 0 0075.8-12.58 2 2 0 00.77-3.31l-21.58-21.58a4 4 0 00-3.83-1 204.8 204.8 0 01-51.16 6.47zM490.84 238.6c-26.46-40.92-60.79-75.68-99.27-100.53C349 110.55 302 96 255.66 96a227.34 227.34 0 00-74.89 12.83 2 2 0 00-.75 3.31l21.55 21.55a4 4 0 003.88 1 192.82 192.82 0 0150.21-6.69c40.69 0 80.58 12.43 118.55 37 34.71 22.4 65.74 53.88 89.76 91a.13.13 0 010 .16 310.72 310.72 0 01-64.12 72.73 2 2 0 00-.15 2.95l19.9 19.89a2 2 0 002.7.13 343.49 343.49 0 0068.64-78.48 32.2 32.2 0 00-.1-34.78z" />
                        <path d="M256 160a95.88 95.88 0 00-21.37 2.4 2 2 0 00-1 3.38l112.59 112.56a2 2 0 003.38-1A96 96 0 00256 160zM165.78 233.66a2 2 0 00-3.38 1 96 96 0 00115 115 2 2 0 001-3.38z" />
                      </svg> -->
                </div>
              </div>


            </div>
            <div class="Form__forgetPassword">
              <Link to="/forgot-password">
              <p>Forgot Password?</p>
              </Link>
            </div>
            <div class="Form__submit">
              <input class="site__btn" name="login" type="submit" value="SUBMIT" />
            </div>
            <p>By logging in, I agree to the site's Terms.</p>
          </form>

        </div>
      </div>
  </div>
</body>

</html>