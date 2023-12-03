<?php
require("../../config.php");
$id = isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : "");


if (isset($_POST['login'])) {
  header("location: ../Login/index.php");
}
if (isset($_POST['register'])) {
  header("location: ../SignUp/index.php");
}
if (isset($_POST['logout'])) {
  session_destroy();
  header("location: ../index.php");
}
if (isset($_POST['next'])) {
}
if (isset($_POST["add_playlist"])) {

  if (isset($_SESSION['user'])) {
    $playlist_name = $_POST['playlist_name'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO `your-playlist`(`name`, `user_id`) VALUES ('$playlist_name','$user_id')";
    $result = $conn->query($sql);
    if ($result) {
      echo 'success';
    }
  }
}


$sql = "SELECT `id`, `name`, `user_id` FROM `your_playlist`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo 'success';
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../css/globals.css">

  <link rel="stylesheet" href="../../css/Header.css" />
  <link rel="stylesheet" href="../../css/Sidebar.css" />
  <link rel="stylesheet" href="../../css/Control.css" />
  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/Playlist.css" />

</head>

<body>
  <style>
    .like {
      width: 20px;
      height: 20px;
      font-size: 16px;
      display: inline-block;
      text-align: center;
      margin-right: 20px;
      cursor: pointer;
    }

    .like svg {
      width: 100%;
      height: 100%;
      stroke: rgb(255, 255, 255);

    }
  </style>
  <div class="container">
    <?php include('../../Components/Header.php'); ?>
    <div class="box">
      <div class="left-section">
        <div class="sidebar-top">
          <div class="home">
            <a href="/Music" class="ins">
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
            <div class="add_playlist" onclick="addPlaylist()">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 112v288M400 256H112" />
              </svg>
            </div>
            <?php

            echo '
        <div class="input_add_playlist" id="input_add_playlist">
          <form action="index.php" method="post">
            <input type="text" name="playlist_name">
            <input type="button" value="Cancel">
            <input type="submit" name="add_playlist" value="Add">
          </form>
        </div>';
            ?>
          </div>
          <div class="your-music-items">
            <ul class="your-music-items-list" id="your-music">
              <?php
              if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user']['id'];
              $sql = "SELECT `id`, `name`, `user_id`, `image_url` FROM `your_playlist` WHERE `user_id` = '$user_id'";
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
                             <span> by ' . $row['user_id'] . ' </span>
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
    <?php
    include('../../Components/Control.php'); 
    ?>
    <main>
      <div id="main">
      </div>
      <div class="frame" id="frame">
        <div class="div" id="div">
          <?php
          $sql = "SELECT `name`, `image_url`, `owner_id`, `description`, `creation_date` FROM `playlist` WHERE `id` = '" . $id . "'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while ($playlist = $result->fetch_assoc()) {
              echo '
    <img class="img-2" src="' . $playlist['image_url'] . '" />
    <div class="div-2">
      <div class="div-3">
        <div class="text-wrapper">' . $playlist['name'] . '</div>
        <div class="text-wrapper-2">' . $playlist['name'] . '</div>
        <p class="p">' . $playlist['description'] . '</p>
      </div>
      <div class="div-4">
        <img class="img" src="https://placehold.co/25x25" />
        <div class="text-wrapper-3">・</div>
        <div class="text-wrapper"> </div>
        <div class="text-wrapper-3">' . $playlist['creation_date'] . '</div>
        <div class="text-wrapper">' . $playlist['creation_date'] . ' songs,</div>
        <div class="text-wrapper-4">about 10 hr</div>
      </div>
    </div>
';
            }
          }
          ?>
        </div>
        <div class="div-10">
          <div class="div-11">
            <div class="text-wrapper-8">#</div>
            <div class="text-wrapper-9">Title</div>
          </div>
          <div class="div-8">
            <div class="text-wrapper-10">Album</div>
            <div class="text-wrapper-11">Date added</div>
            <div class="time">

              <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                <path d="M256 64C150 64 64 150 64 256s86 192 192 192 192-86 192-192S362 64 256 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 128v144h96" />
              </svg>
            </div>
          </div>
        </div>
        <div id="playlist">







        </div>
        <?php include('../../Components/Footer.php'); ?>

      </div>

    </main>
  </div>
</body>
<script src="../../js/Playlists.js"></script>
<script type="module" src="../../js/control.js"></script>
<script type="module" src="../../js/Sidebar.js"></script>
<script src="../../js/Header.js"></script>


</html>