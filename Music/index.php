<?php
session_start();
require("./config.php");
if (isset($_POST['login'])) {
  header("location: ./page/Login/index.php");
}
if (isset($_POST['register'])) {
  header("location: ./page/SignUp/index.php");
}
if (isset($_POST['logout'])) {
  session_destroy();
  header("location: ./index.php");
}



if (isset($_POST["add_playlist"])) {

  if (isset($_SESSION['user'])) {
    $playlist_name = $_POST['playlist_name'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO `your_playlist`(`name`, `user_id`) VALUES ('$playlist_name','$user_id')";
    $result = $conn->query($sql);
    if ($result) {
      echo 'success';
    }
  }
  else {
    echo 'can phia login truoc khi them moi';
  }
}



?>


<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/globals.css">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/Header.css" />
  <link rel="stylesheet" href="./css/Sidebar.css" />
  <link rel="stylesheet" href="./css/Main.css" />
  <link rel="stylesheet" href="./css/Control.css" />
  <link rel="stylesheet" href="./css/Footer.css">
</head>

<body style="height: 100%">
  <div class="container">
    <?php include('./Components/Header.php'); ?>

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
            <div class="addPlaylist">
              <button class="button-30" role="button" onclick="document.getElementById('input_add_playlist').style.display='block'">
                <svg data-encore-id="icon" role="img" aria-hidden="true" viewBox="0 0 24 24" class="icon">
                  <path d="M12 3a1 1 0 0 1 1 1v7h7a1 1 0 1 1 0 2h-7v7a1 1 0 1 1-2 0v-7H4a1 1 0 1 1 0-2h7V4a1 1 0 0 1 1-1z"></path>
                </svg>
              </button>

            </div>
            <?php
            echo '
<div class="input_add_playlist" id="input_add_playlist">
      <form action="index.php" method="post">
        <input type="text" name="playlist_name" />
        <div class="button" required>

        <button class="button-30" role="button" 
        onclick="document.getElementById(\'input_add_playlist\').style.display=\'none\'"
        >Cancel</button>
        <input
          type="submit"
          name="add_playlist"
          class="button-30"
          value="Add"
        />
    </div>

      </form>
    </div>

';
            ?>
          </div>
          <div class="your-music-items">
            <ul class="your-music-items-list" id="your-music">
              <?php
              if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user_id'];

                $sql = "SELECT  `id`, `name`, `user_id`, `image_url` FROM `your_playlist` WHERE `user_id` = '$user_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo '<li >
                       <a href="./page/YourPlaylist/index.php?id=' . $row['id'] . '" class="items">
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
                             <p> Playlists  <span class="material-symbols-outlined">• </span>    ' . $row['id'] . ' Songs  </p>
                           </div>
                         </div>
                         
                       </a>
                       </li>';
                  }
                }
              }

              ?>

            </ul>
          </div>
        </div>
      </div>
    </div>

    <main>
      <div id="main">
      </div>
      <div class="frame" id="frame">
        <div class="div-2">
          <div class="div-3">
            <div class="text-wrapper-2">Focus</div>
            <div class="text-wrapper-3">Show all</div>
          </div>
          <div class="div-4" id="top-tracks">
            <?php
            $sql = "SELECT `id`, `name`,`image_url`, `owner_id`, `description`, `creation_date` FROM `playlist` limit 5";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="play">
                     <a class="inside" href="page/Playlist/index.php?id=' . $row['id'] . '">
                     <div class="inside2">
                    
                         <img class="rectangle" src="' . $row['image_url'] . '" />
                         <div class="div-5">
                             <div class="text-wrapper-4">' . $row['name'] . '</div>
                             <p class="p">' . $row['description'] . '</p>
                         </div>
                         <div class="iconplay">
                             <svg xmlns="http:www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                                 <path d="M0.989258 17.5151V0.484863L16.016 9L0.989258 17.5151Z" fill="black" />
                             </svg>
                         </div>
                     </div>

                     </a>
                 </div>';
              }
            }

            ?>



          </div>
        </div>

        <div class="div-2">
          <div class="div-3">
            <div class="text-wrapper-2">Zilong Playlists</div>
            <div class="text-wrapper-3">Show all</div>
          </div>
          <div class="div-4" id="Your-top-mixes">
            <?php
            $sql = "SELECT `id`, `name`, `image_url`, `owner_id`, `description`, `creation_date`
            FROM `playlist`
            LIMIT 5 OFFSET 5";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="play">
                     <a class="inside" href="page/Playlist/index.php?id=' . $row['id'] . '">
                     <div class="inside2">
                    
                         <img class="rectangle" src="' . $row['image_url'] . '" />
                         <div class="div-5">
                             <div class="text-wrapper-4">' . $row['name'] . '</div>
                             <p class="p">' . $row['description'] . '</p>
                         </div>
                         <div class="iconplay">
                             <svg xmlns="http:www.w3.org/2000/svg" width="17" height="18" viewBox="0 0 17 18" fill="none">
                                 <path d="M0.989258 17.5151V0.484863L16.016 9L0.989258 17.5151Z" fill="black" />
                             </svg>
                         </div>
                     </div>

                     </a>
                 </div>';
              }
            }

            $conn->close();
            ?>


          </div>
        </div>
        <?php include('./Components/Footer.php'); ?>
      </div>

    </main>
  </div>
</body>
<script src="./js/WhatsNew.js"></script>
<script src="./js/addPlayList.js"></script>



</html>