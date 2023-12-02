const url = window.location.href;
const playlistId = url.split("=")[1];

function LoadSongs() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./Albums.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.addEventListener("load", function () {
    if (xhr.status === 200) {
      response = JSON.parse(xhr.responseText);
      const playlistElement = document.getElementById("playlist");
      playlistElement.innerHTML = response
        .map((song, index) => {
          const trackDuration = song.track_duration;
          const trackId = song.track_id;
          const trackTitle = song.track_name;
          const trackPreviewUrl = song.track_preview_url;
          const artistName = song.artist_name;
          const album = song.album_name;
          const artistId = song.artist_id;
          const albumImageUrl = song.album_image_url;
          const formattedDuration = formatDuration(trackDuration);

          return ` <div class="playlist" onclick="handlePostLinkPlay('${trackPreviewUrl}', '${trackDuration}', '${trackId}', '${trackTitle}', '${artistName}')">
          <div class="div-5">
            <div class="text-wrapper-5">${index + 1}</div>
            <div class="div-6">
              <img class="image" src="${albumImageUrl}" />
              <div class="div-7">
                <div class="link-wrapper">
                  <div class="link">${trackTitle}</div>
                </div>
                <div class="link-wrapper">
                  <a href="../Artist/index.php?id=${artistId}" class="link-2">${artistName}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="div-8">
            <div class="album"><a href="../albums/index.php?id=${artistId}" class="link-2">${album}</a></div>
            <div class="text-wrapper-6">${song.track_datecreate}</div>
            <div class="text-time">${formattedDuration}</div>
          </div>
        </div>
                        `;
        })
        .join("");
    }
  });

  xhr.send("id=" + playlistId);
}

window.addEventListener("load", LoadSongs);

const formatDuration = (duration) => {
  const minutes = Math.floor(duration / 60);
  const seconds = Math.floor(duration % 60);
  return `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
};
