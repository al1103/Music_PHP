<?php
require("./config.php");

echo '
<div class="containers">
';

$sql = "SELECT
a.id AS album_id,
a.title AS album_title,
ar.name AS artist_name,
a.genre,
a.release_date,
a.popularity,
a.image_url
FROM album a
INNER JOIN artist ar ON a.id = ar.id;

    ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
           
            <div class="song">
      <a class="song-container" href="./page/Playlist/index.php?id=' . $row['album_id'] . '">
        <div class="header-side-area">
          <div class="album-art" style="width: 112px; height: 112px">
            <img
              src="' . $row['image_url'] . '"
              alt="Midnight Blues"
              class="album-art-image"
            />
          </div>
        </div>
        <div class="header-area">
          <div class="interactive-area">
            <p class="song-title">
              <span class="title-line-clamp">
                <p class="song-link">' . $row['album_title'] . '</p>
              </span>
            </p>
            <p class="artist-details">
              <span class="details-line-clamp">
                <p class="artist-link">' . $row['artist_name'] . '</p>
              </span>
            </p>
            <span class="song-type">
                Single
                <span class="upload-date">
                  <span class="date"> ' . $row['release_date'] . '</span>
                </span>
              </span>
          </div>
          
        </div>
      </a>
    </div>
            ';
    }
}

echo '
</div>
</main>';
