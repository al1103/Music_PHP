<?php

require("../../config.php");

if (isset($_POST['login'])) {
    header("location: ../Login/index.php");
    exit(); // Ensure that no further code is executed after the redirection
}

if (isset($_POST['register'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `subscription_type`) VALUES (
        '$firstname',
        '$lastname',
        '$email',
        '$hashedPassword',
        'Free'
    )";

    if ($conn->query($sql) === TRUE) {
        header("Location:../../index.php"); // Redirect to a success page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/globals.css">

  <link rel="stylesheet" href="./Style.css">
</head>

<body>
  <div class="Register">
    <div class="Form__Header">
      <div class="header">
        <div class="link__logo">Zilong</div>
      <form class="link__register" action="index.php" method="post">
        <button  name="login">
          LOGIN
        </button>
        </form>
      </div>
    </div>
    <div class="Form__left">
      <img alt="" src="https://i.pinimg.com/564x/c2/b5/a9/c2b5a924d3f25847d87ecaeaf2082326.jpg" />
    </div>

    <div class="Form__right">
      <div class="Form__content">
        <div class="Form__header">
          <h1>REGISTER</h1>
        </div>
        <form class="Form_php" action="index.php" method="post">
          <div class="Form__input__header">
            <div class="Form__input__header__left">
              <label>Fist Name * </label>
              <div class="input">
                <input placeholder="your first name here..." id="fistName" type="text" name="firstname" />

              </div>
            </div>
            <div class="Form__input__header__right">
              <label>Last Name * </label>
              <div class="input">
                <input placeholder="your last name here..." id="lastName" type="text" name="lastname" />

              </div>
            </div>
          </div>
          <div class="Form__input_email">
            <label>Email * </label>
            <div class="input">
              <input placeholder="your email here..." id="email" type="text" name="email" />

            </div>
          </div>
          <div class="Form__input__password">
            <label>Password * </label>
            <div class="input">
              <input placeholder="Your password here..." id="password" type="password" name="password" />

            </div>


          </div>

          <div class="Form__btn__submit">
            <input class="site__btn" type="submit" value="SUBMIT" name="register" />
          </div>

        </form>
        <p>
          By registering with Anna Eshwood, I agree to the site's Terms.
        </p>
      </div>
    </div>
  </div>
</body>

</html>