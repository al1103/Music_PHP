<?php
require("../../config.php");
$id = isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : "");

if (isset($_POST['login'])) {
    header("location: ./page/Login/index.php");
}
if (isset($_POST['register'])) {
    header("location: ./page/SignUp/index.php");
}
if(isset($_POST["add_playlist"])){

    if(isset($_SESSION['user'])){
      $playlist_name = $_POST['playlist_name'];
      $user_id = $_SESSION['user_id'];
      $sql = "INSERT INTO `your-playlist`(`name`, `user_id`) VALUES ('$playlist_name','$user_id')";
      $result = $conn->query($sql);
      if($result){
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
    <link rel="stylesheet" href="../../css/globals.css" />
    <link rel="stylesheet" href="../../css/Header.css" />
    <link rel="stylesheet" href="../../css/Sidebar.css" />
    <link rel="stylesheet" href="../../css/Control.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/Footer.css" />
    <link rel="stylesheet" href="./style.css" />

</head>

<body>
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
    <?php include('../../Components/Control.php'); ?>
        <main>
            <div id="main">
            </div>
            <div class="frame" id="frame">
                <div class="div" id="div">
                    <?php
                    $sql = "SELECT `id`, `name`, `image_url`, `popularity`, `followers_total`, `genres` FROM `artist` WHERE `id` = '$id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($playlist = $result->fetch_assoc()) {
                            echo '
    <img class="img-2" src="' . $playlist['image_url'] . '" />
    <div class="div-2">
    <div class="text-wrapper-2">' . $playlist['name'] . '</div>
    <div class="text-wrapper">' . $playlist['name'] . '</div>
      
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
                    <?php
                    $index = 0;
                    $sql = "SELECT 
                    album.id AS album_id,
                    album.title AS album_title,
                    track.datecreate AS track_datecreate,
                    track.title AS track_title,
                    artist.name AS artist_name,
                    track.duration AS track_duration,
                    track.id AS track_id,
                    track.album_id AS track_album_id,
                    track.artist_id AS track_artist_id,
                    track.genre AS track_genre,
                    track.duration AS track_duration,
                    track.preview_url AS track_preview_url
                FROM album
                RIGHT JOIN track ON album.id = track.album_id
                INNER JOIN artist ON track.artist_id = artist.id
                WHERE album.id = '$id'";



                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($album = $result->fetch_assoc()) {
                            $seconds = $album['track_duration'];
                            $minutes = floor($seconds / 60);
                            $seconds = $seconds % 60;

                            $formattedDuration = sprintf('%02d:%02d', $minutes, $seconds);
                            echo '
              <div class="playlist" onclick="handlePostLinkPlay(`' . $album['track_preview_url'] . '`, `' . $album['track_duration'] . '`, `' . $album['track_id'] . '`, `' . $album['track_title'] . '`, `' . $album['artist_name'] . '`)">

        <div class="div-5">
          <div class="text-wrapper-5">' . ($index + 1) . '</div>
          <div class="div-6">
            <img class="image" src="https://placehold.co/600x400" />
            <div class="div-7">
              <div class="link-wrapper"><div class="link">' . $album['track_title'] . '</div></div>
            </div>
          </div>
        </div>
        <div class="div-8">
         
          <div class="text-wrapper-6">' . ($album['track_datecreate']) . '</div>
          <div class="text-time">' . $formattedDuration . '</div>
        </div>
      </div>
    ';

                            $index++;
                        }
                    }
                    ?>






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
<script src="../../js/WhatsNew.js"></script>
<script>

</script>

</html>