<?php
require("../../config.php");



$keyword = isset($_GET["q"]) ? $_GET["q"] : (isset($_POST["q"]) ? $_POST["q"] : "");

$option = isset($_GET["option"]) ? $_GET["option"] : (isset($_POST["option"]) ? $_POST["option"] : "Albums");


if ($keyword != "" && $option == "Albums") {
  $sql = "SELECT `id`, `title`, `genre`, `playlist_id`, `release_date`, `popularity`, `image_url` FROM `album` WHERE title LIKE '%$keyword%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        echo '
            <a href="../Playlist/index.php?id=' . $product['id'] . '" class="main__a">
                <div class="main__content__list__item">
                    <div class="main__content__list__item__img">
                        <img src="' . $product['image_url'] . '" alt="" />
                    </div>
                    <p class="main__content__list__item__text">' . $product['title'] . '</p>
                </div>
            </a>
        ';
    }
} else {
    echo '
        <div class="main__content__list__item">
            <p class="main__content__list__item__text">No results found</p>
        </div>
    ';
}
  } else if ($keyword != "" && $option == "Songs") {
    $sql = "SELECT `id`, `title`, `artist_id`, `album_id`, `image_url`, `preview_url`, `genre`, `datecreate`, `duration`, `popularity` FROM `track` WHERE title LIKE '%$keyword%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($product = $result->fetch_assoc()) {
          echo '
              <a href="../Playlist/index.php?id=' . $product['id'] . '" class="main__a">
                  <div class="main__content__list__item">
                      <div class="main__content__list__item__img">
                          <img src="' . $product['image_url'] . '" alt="" />
                      </div>
                      <p class="main__content__list__item__text">' . $product['title'] . '</p>
                  </div>
              </a>
          ';
      }
  } else {
      echo '
          <div class="main__content__list__item">
              <p class="main__content__list__item__text">No results found</p>
          </div>
      ';
  }
  
  } else if ($keyword != "" && $option == "Artists") {
    $sql = "SELECT `id`, `name`, `image_url`, `album_id`, `popularity`, `followers_total`, `genres` FROM `artist` WHERE 'name' LIKE '%$keyword%'";
    $result = $conn->query($sql);

    $conn->close();
    if ($result->num_rows > 0) {
      while ($product = $result->fetch_assoc()) {
          echo '
              <a href="../Playlist/index.php?id=' . $product['id'] . '" class="main__a">
                  <div class="main__content__list__item">
                      <div class="main__content__list__item__img">
                          <img src="' . $product['image_url'] . '" alt="" />
                      </div>
                      <p class="main__content__list__item__text">' . $product['title'] . '</p>
                  </div>
              </a>
          ';
      }
  } else {
      echo '
          <div class="main__content__list__item">
              <p class="main__content__list__item__text">No results found</p>
          </div>
      ';
  }
  } else if ($keyword != "" && $option == "Playlists") {
    $sql = "SELECT `id`, `name`, `image_url`, `owner_id`, `description`, `creation_date` FROM `playlist` WHERE 'name' LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($product = $result->fetch_assoc()) {
          echo '
              <a href="../Playlist/index.php?id=' . $product['id'] . '" class="main__a">
                  <div class="main__content__list__item">
                      <div class="main__content__list__item__img">
                          <img src="' . $product['image_url'] . '" alt="" />
                      </div>
                      <p class="main__content__list__item__text">' . $product['title'] . '</p>
                  </div>
              </a>
          ';
      }
  } else {
      echo '
          <div class="main__content__list__item">
              <p class="main__content__list__item__text">No results found</p>
          </div>
      ';
  }
    } else if ($keyword != "") {

      $sql = "SELECT `id`, `title`, `artist_id`, `genre`, `release_date`, `popularity`, `image_url` FROM `album` WHERE title LIKE '%$keyword%'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            echo '
                <a href="../Playlist/index.php?id=' . $product['id'] . '" class="main__a">
                    <div class="main__content__list__item">
                        <div class="main__content__list__item__img">
                            <img src="' . $product['image_url'] . '" alt="" />
                        </div>
                        <p class="main__content__list__item__text">' . $product['title'] . '</p>
                    </div>
                </a>
            ';
        }
    } else {
        echo '
            <div class="main__content__list__item">
                <p class="main__content__list__item__text">No results found</p>
            </div>
        ';
    }
  }
