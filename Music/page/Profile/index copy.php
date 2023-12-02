<?php
session_start();
require("../../config.php");

if (isset($_POST['login'])) {
    header("location: ./page/Login/index.php");
} elseif (isset($_POST['register'])) {
    header("location: ./page/SignUp/index.php");
} elseif (isset($_POST['logout'])) {
    session_destroy();
    header("location: ./index.php");
} elseif (isset($_POST['updateCountry'])) {
    $user = $_SESSION['user'];

    if (!isset($_FILES["fileupload"])) {
        echo "Dữ liệu không đúng cấu trúc";
        die;
    }

    $target_dir = "../Upload";
    $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    $allowUpload = true;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $maxfilesize = 800000;
    $allowtypes = array('jpg', 'png', 'jpeg', 'gif');

    if ($_FILES["fileupload"]['error'] != 0) {
        echo "Dữ liệu upload bị lỗi";
        die;
    }

    if (isset($_POST["submit"])) {
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        echo $lastname . ' ' . $firstname . ' ' . $country . ' ' . $city . ' ' . $description;

        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
        if ($check !== false) {
            echo "Đây là file ảnh - " . $check["mime"] . ".";
            $allowUpload = true;
        } else {
            echo "Không phải file ảnh.";
            $allowUpload = false;
        }
    }

    if (file_exists($target_file)) {
        echo "Tên file đã tồn tại trên server, không được ghi đè";
        $allowUpload = false;
    }

    if ($_FILES["fileupload"]["size"] > $maxfilesize) {
        echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
        $allowUpload = false;
    }

    if (!in_array($imageFileType, $allowtypes)) {
        echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
        $allowUpload = false;
    }

    if ($allowUpload) {
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
            echo "File " . basename($_FILES["fileupload"]["name"]) . " Đã upload thành công.";

            $sql = "UPDATE `users` SET `firstname` = '$firstname', `lastname` = '$lastname',  `image_url` = '$target_file' WHERE `email` = '$user'";
            $result = $conn->query($sql);

            if ($result) {
                header("location: ./index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Có lỗi xảy ra khi upload file.";
        }
    } else {
        echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
    }
}
?>

<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/Header.css" />
    <link rel="stylesheet" href="../../css/Sidebar.css" />
    <link rel="stylesheet" href="../../css/Main.css" />
    <link rel="stylesheet" href="../../css/Control.css" />
    <link rel="stylesheet" href="./style.css">
</head>

<body style="height: 100%">
    <div class="container">
        <header>
            <div class="header__inner">
                <div class="navigate">
                    <div class="navigate__icon" id="back" disable>
                        <svg xmlns="http:www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M10.5999 12.71C10.5062 12.617 10.4318 12.5064 10.381 12.3846C10.3303 12.2627 10.3041 12.132 10.3041 12C10.3041 11.868 10.3303 11.7373 10.381 11.6154C10.4318 11.4936 10.5062 11.383 10.5999 11.29L15.1899 6.71C15.2836 6.61704 15.358 6.50644 15.4088 6.38458C15.4596 6.26272 15.4857 6.13201 15.4857 6C15.4857 5.86799 15.4596 5.73728 15.4088 5.61542C15.358 5.49356 15.2836 5.38296 15.1899 5.29C15.0026 5.10375 14.7491 4.99921 14.4849 4.99921C14.2207 4.99921 13.9673 5.10375 13.7799 5.29L9.18992 9.88C8.62812 10.4425 8.31256 11.205 8.31256 12C8.31256 12.795 8.62812 13.5575 9.18992 14.12L13.7799 18.71C13.9662 18.8947 14.2176 18.9989 14.4799 19C14.6115 19.0008 14.742 18.9755 14.8638 18.9258C14.9857 18.876 15.0965 18.8027 15.1899 18.71C15.2836 18.617 15.358 18.5064 15.4088 18.3846C15.4596 18.2627 15.4857 18.132 15.4857 18C15.4857 17.868 15.4596 17.7373 15.4088 17.6154C15.358 17.4936 15.2836 17.383 15.1899 17.29L10.5999 12.71Z" fill="#7B7B7B" />
                        </svg>
                    </div>
                    <div class="navigate__icon" id="forward">
                        <svg xmlns="http:www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15.3999 9.88L10.8099 5.29C10.6225 5.10375 10.369 4.99921 10.1049 4.99921C9.84068 4.99921 9.58723 5.10375 9.39986 5.29C9.30613 5.38296 9.23174 5.49356 9.18097 5.61542C9.1302 5.73728 9.10406 5.86799 9.10406 6C9.10406 6.13201 9.1302 6.26272 9.18097 6.38458C9.23174 6.50644 9.30613 6.61704 9.39986 6.71L13.9999 11.29C14.0936 11.383 14.168 11.4936 14.2188 11.6154C14.2695 11.7373 14.2957 11.868 14.2957 12C14.2957 12.132 14.2695 12.2627 14.2188 12.3846C14.168 12.5064 14.0936 12.617 13.9999 12.71L9.39986 17.29C9.21156 17.477 9.10524 17.7311 9.10431 17.9965C9.10337 18.2618 9.20789 18.5167 9.39486 18.705C9.58184 18.8933 9.83596 18.9996 10.1013 19.0006C10.3667 19.0015 10.6216 18.897 10.8099 18.71L15.3999 14.12C15.9617 13.5575 16.2772 12.795 16.2772 12C16.2772 11.205 15.9617 10.4425 15.3999 9.88Z" fill="white" />
                        </svg>
                    </div>
                </div>

                <div class="user">
                    <button class="notification">
                        <svg role="img" height="16" width="16" aria-hidden="true" class="Svg-sc-ytk21e-0 haNxPq t93PZphItuM19kPhX7tC" viewBox="0 0 16 16" data-encore-id="icon">
                            <path d="M8 1.5a4 4 0 0 0-4 4v3.27a.75.75 0 0 1-.1.373L2.255 12h11.49L12.1 9.142a.75.75 0 0 1-.1-.374V5.5a4 4 0 0 0-4-4zm-5.5 4a5.5 5.5 0 0 1 11 0v3.067l2.193 3.809a.75.75 0 0 1-.65 1.124H10.5a2.5 2.5 0 0 1-5 0H.957a.75.75 0 0 1-.65-1.124L2.5 8.569V5.5zm4.5 8a1 1 0 1 0 2 0H7z"></path>
                        </svg>
                    </button>
                    <div>
                        <?php
                        try {
                            if (isset($_SESSION['user'])) {
                                echo '
                <form class="box-user" method="post" action="index.php">
              <button class="Login" type="submit" name="logout">LOGOUT</button>
            </form>';
                            } else {
                                echo '
                <form class="box-user" method="post" action="index.php">
              <button class="Login" type="submit" name="login">LOGIN</button>
              <button class="Login" type="submit" name="register">REGISTER</button>
            </form>';
                            }
                        } catch (Exception $e) {
                            echo $e;
                        }



                        ?>
                    </div>
                </div>
            </div>
        </header>
        <div class="box">
            <div class="left-section">
                <div class="sidebar-top">
                    <div class="home">
                        <a href="./index.php" class="ins">
                            <svg data-encore-id="icon" role="img" aria-hidden="true" class="icon" viewBox="0 0 24 24">
                                <path d="M13.5 1.515a3 3 0 0 0-3 0L3 5.845a2 2 0 0 0-1 1.732V21a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6h4v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V7.577a2 2 0 0 0-1-1.732l-7.5-4.33z"></path>
                            </svg>

                            <div class="text">Home</div>
                        </a>
                    </div>
                    <div class="search">
                        <a href="./page/Search/index.php" class="ins">
                            <svg data-encore-id="icon" role="img" aria-hidden="true" class="icon" viewBox="0 0 24 24">
                                <path d="M10.533 1.279c-5.18 0-9.407 4.14-9.407 9.279s4.226 9.279 9.407 9.279c2.234 0 4.29-.77 5.907-2.058l4.353 4.353a1 1 0 1 0 1.414-1.414l-4.344-4.344a9.157 9.157 0 0 0 2.077-5.816c0-5.14-4.226-9.28-9.407-9.28zm-7.407 9.279c0-4.006 3.302-7.28 7.407-7.28s7.407 3.274 7.407 7.28-3.302 7.279-7.407 7.279-7.407-3.273-7.407-7.28z"></path>
                            </svg>

                            <div class="text">Search</div>
                        </a>
                    </div>
                </div>
                <div class="sidebar-center">
                    <div class="ins">
                        <svg data-encore-id="icon" role="img" aria-hidden="true" viewBox="0 0 24 24" class="icon">
                            <path d="M3 22a1 1 0 0 1-1-1V3a1 1 0 0 1 2 0v18a1 1 0 0 1-1 1zM15.5 2.134A1 1 0 0 0 14 3v18a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V6.464a1 1 0 0 0-.5-.866l-6-3.464zM9 2a1 1 0 0 0-1 1v18a1 1 0 1 0 2 0V3a1 1 0 0 0-1-1z"></path>
                        </svg>
                        <div class="text">Your Music</div>
                    </div>
                    <div class="your-music-items">
                        <ul class="your-music-items-list" id="your-music">
                            <?php
                            $sql = "SELECT `id`, `name`,`image_url`, `owner_id`, `album_id`, `description`, `creation_date` FROM `playlist`";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li >
                       <a href="./page/Playlist/index.php?id=' . $row['id'] . '" class="items">
                         <div class="items-img">
                           <img
                             src=" ' . $row['image_url'] . '
                           "
                             alt=""
                           />
                         </div>
                         <div class="items-text">
                           <div class="items-name">' . $row['name'] . '</div>
                           <div class="items-artist">
                             <span> by ' . $row['owner_id'] . ' </span>
                           </div>
                         </div>
                       </a>
                       </li>';
                                }
                            }

                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="main">
            </div>
            <div class="frame" id="frame">
            <?php
echo '
<
        </div>
        </main>

</body>
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

</html>