<?php
require("../../config.php");

if (isset($_POST['login'])) {
    header("location: ./page/Login/index.php");
}
if (isset($_POST['register'])) {
    header("location: ./page/SignUp/index.php");
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
    <link rel="stylesheet" href="../../css/Header.css" />
    <link rel="stylesheet" href="../../css/Sidebar.css" />
    <link rel="stylesheet" href="../../css/Control.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="stylesheet" href="../../css/Footer.css" />
    <link rel="stylesheet" href="../../css/Playlist.css" />

</head>

<body>
    <div class="container">
        <?php include('../../Components/Header.php'); ?>
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
                            $sql = "SELECT `id`, `name`, `user_id`, `image_url` FROM `your_playlist`";
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

                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="control__play">
            <div class="control__play__inner">
                <div class="control__play__inner__left">
                    <div class="control__play__inner__left__img">
                        <img src="https://placehold.co/56" alt="anh" />
                    </div>
                    <div class="control__play__inner__left__text">
                        <div class="control__play__inner__left__text__name">
                            Dreaming On
                        </div>
                        <div class="control__play__inner__left__text__artist">
                            <p>NEFFEX</p>
                        </div>
                    </div>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M20.205 4.79099C19.6536 4.2357 18.9979 3.79488 18.2756 3.49387C17.5533 3.19286 16.7786 3.03759 15.996 3.03699C14.5158 3.03723 13.0897 3.59326 12 4.59499C10.9104 3.59309 9.48422 3.03703 8.00401 3.03699C7.22055 3.0378 6.44499 3.19355 5.72195 3.49526C4.99891 3.79696 4.34268 4.23868 3.79101 4.79499C1.43801 7.15799 1.43901 10.854 3.79301 13.207L12 21.414L20.207 13.207C22.561 10.854 22.562 7.15799 20.205 4.79099Z" fill="#1DB954" />
                        </svg>
                    </div>
                </div>
                <div class="control__play__inner__center">
                    <div class="control__play__inner__center__inner">
                        <div class="control__play__inner__center__top">
                            <div class="control__play__inner__center__top__left">
                                <div class="control__play__inner__center__top__left__dao icon " id="untidy">
                                    <svg role="img" height="16" width="16" aria-hidden="true" viewBox="0 0 16 16" data-encore-id="icon" class="Svg-sc-ytk21e-0 haNxPq">
                                        <path d="M13.151.922a.75.75 0 1 0-1.06 1.06L13.109 3H11.16a3.75 3.75 0 0 0-2.873 1.34l-6.173 7.356A2.25 2.25 0 0 1 .39 12.5H0V14h.391a3.75 3.75 0 0 0 2.873-1.34l6.173-7.356a2.25 2.25 0 0 1 1.724-.804h1.947l-1.017 1.018a.75.75 0 0 0 1.06 1.06L15.98 3.75 13.15.922zM.391 3.5H0V2h.391c1.109 0 2.16.49 2.873 1.34L4.89 5.277l-.979 1.167-1.796-2.14A2.25 2.25 0 0 0 .39 3.5z"></path>
                                        <path d="m7.5 10.723.98-1.167.957 1.14a2.25 2.25 0 0 0 1.724.804h1.947l-1.017-1.018a.75.75 0 1 1 1.06-1.06l2.829 2.828-2.829 2.828a.75.75 0 1 1-1.06-1.06L13.109 13H11.16a3.75 3.75 0 0 1-2.873-1.34l-.787-.938z"></path>
                                    </svg>
                                </div>
                                <div class="control__play__inner__center__top__left__prev icon" id="prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                        <path d="M20.6667 9.04166L11.625 15.5L20.6667 21.9583V9.04166ZM11.625 15.5V9.04166H9.04167V21.9583H11.625V15.5Z" fill="#C4C4C4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="control__play__inner__center__top__center" id="play">
                                <svg id="play--icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                </svg>

                                <svg id="pause--icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M14.25 9v6m-4.5 0V9M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div class="control__play__inner__center__top__right" id="next">
                                <div class="control__play__inner__center__top__left__prev icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                        <path d="M10.3333 9.04166L19.375 15.5L10.3333 21.9583V9.04166ZM19.375 15.5V9.04166H21.9583V21.9583H19.375V15.5Z" fill="#C4C4C4" />
                                    </svg>
                                </div>
                            </div>

                            <div class="control__play__inner__center__top__left__dao  icon" id="loop">
                                <svg role="img" height="16" width="16" aria-hidden="true" viewBox="0 0 16 16" data-encore-id="icon" class="Svg-sc-ytk21e-0 haNxPq">
                                    <path d="M0 4.75A3.75 3.75 0 0 1 3.75 1h8.5A3.75 3.75 0 0 1 16 4.75v5a3.75 3.75 0 0 1-3.75 3.75H9.81l1.018 1.018a.75.75 0 1 1-1.06 1.06L6.939 12.75l2.829-2.828a.75.75 0 1 1 1.06 1.06L9.811 12h2.439a2.25 2.25 0 0 0 2.25-2.25v-5a2.25 2.25 0 0 0-2.25-2.25h-8.5A2.25 2.25 0 0 0 1.5 4.75v5A2.25 2.25 0 0 0 3.75 12H5v1.5H3.75A3.75 3.75 0 0 1 0 9.75v-5z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="control__play__inner__center__bottom">
                            <audio src="" preload="metadata" id="audio"></audio>

                            <span id="currentTime">00:00</span>
                            <span class="control__play__inner__center__bottom__time">
                                <input type="range" name="" value="0" id="seekSlider" min="0" max="100" />
                            </span>
                            <span id="durationTime">03:00</span>
                        </div>
                    </div>
                </div>
                <div class="control__play__inner__right">
                    <div class="control__play__inner__right__inner">
                        <div class="control__play__inner__right__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                <path d="M18.1263 10.6003C18.8866 9.40633 19.1415 7.95919 18.8348 6.57728C18.5281 5.19537 17.685 3.99189 16.491 3.23159C15.297 2.4713 13.8498 2.21646 12.4679 2.52315C11.086 2.82984 9.88252 3.67293 9.12223 4.86695L9.08116 4.92168L9.04894 4.98205C8.31157 6.16432 8.06805 7.5889 8.37082 8.94898C8.41082 9.13566 8.46184 9.31981 8.52362 9.50046L4.74411 18.0938C4.62959 18.3537 4.61205 18.6461 4.69469 18.9179C4.77733 19.1897 4.95466 19.4229 5.19451 19.5751L6.46058 20.3813C6.69997 20.5342 6.98626 20.5963 7.2675 20.5562C7.54873 20.5161 7.80627 20.3765 7.99339 20.1627L14.1811 13.1029C14.3709 13.0824 14.5593 13.0508 14.7454 13.008C16.1059 12.707 17.2937 11.8837 18.0531 10.7154L18.0941 10.6607L18.1263 10.6003ZM17.6452 6.89071C17.8406 7.76635 17.7448 8.68186 17.3724 9.49808L10.44 5.08387C10.9416 4.49737 11.5969 4.06242 12.3321 3.8279C13.0674 3.59337 13.8535 3.56858 14.602 3.7563C15.3506 3.94401 16.032 4.33681 16.5696 4.89052C17.1072 5.44423 17.4797 6.13691 17.6452 6.89071ZM7.09762 19.3808L5.83156 18.5746L9.22361 10.8732C10.0341 12.0179 11.261 12.7991 12.6411 13.0493L7.09762 19.3808ZM9.53012 8.69169C9.33467 7.81605 9.43047 6.90054 9.80293 6.08432L10.44 5.08387L17.3724 9.49808C16.8707 10.0846 15.5784 11.52 14.8432 11.7545C14.1079 11.989 13.3218 12.0138 12.5732 11.8261C11.8247 11.6384 11.1433 11.2456 10.6057 10.6919C10.0681 10.1382 9.69564 9.44549 9.53012 8.69169Z" fill="#C4C4C4" />
                            </svg>
                        </div>
                        <div class="control__play__inner__right__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path d="M10 19H28V21H10V19Z" fill="#C4C4C4" />
                                <path d="M19 14H28V16H19V14Z" fill="#C4C4C4" />
                                <path d="M10 24H28V26H10V24Z" fill="#C4C4C4" />
                                <path d="M10 9L16 13.5L10 18V9Z" fill="#C4C4C4" />
                            </svg>
                        </div>
                        <div class="control__play__inner__right__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.5 18.0038H4.5C4.1023 18.0034 3.721 17.8452 3.43978 17.564C3.15856 17.2828 3.0004 16.9015 3 16.5038V6.00375C3.0004 5.60605 3.15856 5.22475 3.43978 4.94353C3.721 4.66231 4.1023 4.50415 4.5 4.50375H19.5C19.8977 4.50415 20.279 4.66231 20.5602 4.94353C20.8414 5.22475 20.9996 5.60605 21 6.00375V16.5038C20.9994 16.9014 20.8412 17.2826 20.56 17.5638C20.2788 17.8449 19.8976 18.0032 19.5 18.0038ZM4.5 6.00375V16.5038H19.5V6.00375H4.5Z" fill="#1B9145" />
                                <path d="M1.5 19.5037H22.5V21.0037H1.5V19.5037Z" fill="#1B9145" />
                            </svg>
                        </div>
                        <div class="control__play__inner__right__icon__mute">
                            <div class="control__play__inner__right__icon" id="volume">
                                <svg id="volume--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M157.65 192H88a8 8 0 00-8 8v112a8 8 0 008 8h69.65a16 16 0 0110.14 3.63l91.47 75a8 8 0 0012.74-6.46V119.83a8 8 0 00-12.74-6.44l-91.47 75a16 16 0 01-10.14 3.61zM352 320c9.74-19.41 16-40.81 16-64 0-23.51-6-44.4-16-64M400 368c19.48-34 32-64 32-112s-12-77.7-32-112" stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="32" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="volume-mute">
                                    <path fill="none" stroke="currentColor" strokeLinecap="round" strokeMiterlimit="10" strokeWidth="32" d="M416 432L64 80" />
                                    <path d="M224 136.92v33.8a4 4 0 001.17 2.82l24 24a4 4 0 006.83-2.82v-74.15a24.53 24.53 0 00-12.67-21.72 23.91 23.91 0 00-25.55 1.83 8.27 8.27 0 00-.66.51l-31.94 26.15a4 4 0 00-.29 5.92l17.05 17.06a4 4 0 005.37.26zM224 375.08l-78.07-63.92a32 32 0 00-20.28-7.16H64v-96h50.72a4 4 0 002.82-6.83l-24-24a4 4 0 00-2.82-1.17H56a24 24 0 00-24 24v112a24 24 0 0024 24h69.76l91.36 74.8a8.27 8.27 0 00.66.51 23.93 23.93 0 0025.85 1.69A24.49 24.49 0 00256 391.45v-50.17a4 4 0 00-1.17-2.82l-24-24a4 4 0 00-6.83 2.82zM125.82 336zM352 256c0-24.56-5.81-47.88-17.75-71.27a16 16 0 00-28.5 14.54C315.34 218.06 320 236.62 320 256q0 4-.31 8.13a8 8 0 002.32 6.25l19.66 19.67a4 4 0 006.75-2A146.89 146.89 0 00352 256zM416 256c0-51.19-13.08-83.89-34.18-120.06a16 16 0 00-27.64 16.12C373.07 184.44 384 211.83 384 256c0 23.83-3.29 42.88-9.37 60.65a8 8 0 001.9 8.26l16.77 16.76a4 4 0 006.52-1.27C410.09 315.88 416 289.91 416 256z" />
                                    <path d="M480 256c0-74.26-20.19-121.11-50.51-168.61a16 16 0 10-27 17.22C429.82 147.38 448 189.5 448 256c0 47.45-8.9 82.12-23.59 113a4 4 0 00.77 4.55L443 391.39a4 4 0 006.4-1C470.88 348.22 480 307 480 256z" />
                                </svg>
                            </div>
                            <div class="mute__line">
                                <input type="range" name="range" id="sound" max="100" min="0" value="50" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main>
            <div id="main">
            </div>
            <div class="frame" id="frame">
                <div class="div" id="div">
                    <?php
                    $sql = "SELECT `id`, `name`, `image_url`, `popularity`, `followers_total`, `genres` FROM `artist` WHERE `id` = '1'";
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

                </div>
                <?php include('../../Components/Footer.php'); ?>
            </div>

        </main>
    </div>
</body>
<script src="../../js/albums.js"></script>
<script src="../../js/control.js"></script>
<script src="../../js/Sidebar.js"></script>
<script src="../../js/Header.js"></script>


</html>