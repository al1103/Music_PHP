<?php
session_start();
require("../../config.php");

if (isset($_POST['update'])) {
    $user = $_SESSION['user'];
    $uploadOk = 1;

    if (isset($_FILES["fileupload"])) {
        $target_dir = "./Upload/";
        $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a valid image
        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if (!$check) {
            echo "File is not a valid image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileupload"]["size"] > 800000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk) {
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Hash the password if provided
        $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : '';

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare("UPDATE `users` SET `firstname`=?, `lastname`=?, `image_url`=?, `password`=?, `country`=? WHERE email=?");
            $stmt->bind_param("ssssss", $firstname, $lastname, $target_file, $hashedPassword, $country, $user);

            if ($stmt->execute()) {
                echo "Profile updated successfully.";
            } else {
                echo "Error updating profile: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <link rel="stylesheet" href="./style.css">
</head>



<body style="height: 100%">
    <div class="container">


        <?php
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $sql = "SELECT `id`, `firstname`, `lastname`, `email`, `password`, `subscription_type`, `playlist_id`, `image_url`, `country` FROM `users` WHERE email = '$user'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if ($row) {
                echo '
                <form class="profile" enctype="multipart/form-data" action="index.php" method="post">
                <div class="profile-info">
                    <div class="profile-picture-upload">
                        <div>
                            <label for="avatar">
                                <img src="' . $row['image_url'] . '" id="avatar-preview" alt="">
                                <input type="file" accept="image/*" class="form-control-file" name="fileupload" id="avatar" />
                            </label>
                        </div>
                    </div>
                    <div class="profile-information">
                        <div class="profile-user">
                            <div class="profile-user-fn">
                                ' . $row['firstname'] . '
                            </div>
                            <div class="profile-user-ln">
                                ' . $row['lastname'] . '

                            </div>
                        </div>
                        <div class="profile-user-email">
                            ' . $row['email'] . '
                        </div>
                    </div>
                </div>
                <div class="personal-information">
                    <div class="form-name">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstname" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastname" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <select name="country" id="country" class="form-control">
                            <option value="VN">Vietnam</option>
                            <option value="TW">Taiwan</option>
                            <option value="US">United States</option>
                            <option value="JP">Japan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div>
                    <input type="submit" name="update" value="Update" />
                </div>
                </form>
            ';
            } else {
                echo "User not found.";
            }
        }
        ?>

        <script>
            var avatar = document.getElementById("avatar");
            avatar.addEventListener('change', function() {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("avatar-preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            });
        </script>
</body>

</html>