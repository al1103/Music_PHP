const playlist = document.getElementById("playlist");
const IconPlay = document.getElementById("play--icon");
const IconPause = document.getElementById("pause--icon");
const nextSong = document.getElementById("next");
const previousSong = document.getElementById("prev");
const untidy = document.getElementById("untidy");
const loop = document.getElementById("loop");
const currentTimeDisplay = document.getElementById("currentTime");
const durationTimeDisplay = document.getElementById("durationTime");
const seekSlider = document.getElementById("seekSlider");
const nameSongPlay = document.querySelector(
  ".control__play__inner__left__text"
);
const ShowPlay = document.querySelector(".control__play");
const musicSong = document.getElementById("audio");

let currentSongIndex;
let response;

function LoadSongs() {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "Song.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
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

          return `
          <div class="playlist" onclick="handlePostLinkPlay('${trackPreviewUrl}', '${trackDuration}', '${trackId}', '${trackTitle}', '${artistName}')">
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
              <div class="div-right">
              <div class="like" onClick="handleLike('${trackId}')"> 
              <svg data-encore-id="icon" role="img" aria-hidden="true" viewBox="0 0 16 16" class="Svg-sc-ytk21e-0 kPpCsU"><path d="M15.724 4.22A4.313 4.313 0 0 0 12.192.814a4.269 4.269 0 0 0-3.622 1.13.837.837 0 0 1-1.14 0 4.272 4.272 0 0 0-6.21 5.855l5.916 7.05a1.128 1.128 0 0 0 1.727 0l5.916-7.05a4.228 4.228 0 0 0 .945-3.577z"></path></svg></div>
              <div class="text-time">${formattedDuration}</div>
              </div>

              
            </div>
          </div>
        `;
        })
        .join(""); // Append generated HTML to the playlist element
    }
  };
  xhr.send("id=" + playlistId);
}

const handlePostLinkPlay = (url, duration, index, name, artists) => {
  setNameSong(url, duration, index, name, artists);
  togglePlaySong();
  checkIndex(index);
  ShowPlay.style.display = "block";
};
const setNameSong = (url, duration, index, name, artist) => {
  nameSongPlay.innerHTML = `
    <div class="control__play__inner__left__text__name">${name}</div>
    <div class="control__play__inner__left__text__artist"><p>${artist}</p></div>`;
  musicSong.setAttribute("src", url);
  durationTimeDisplay.innerHTML = formatDuration(duration);
  musicSong.pause();
};

const togglePlaySong = () => {
  if (musicSong.paused) {
    musicSong.play();
    IconPause.style.display = "block";
    IconPlay.style.display = "none";
  } else {
    musicSong.pause();
    IconPause.style.display = "none";
    IconPlay.style.display = "block";
  }
};

const updateSong = async () => {
  handlePostLinkPlay(
    response[currentSongIndex].track_preview_url,
    response[currentSongIndex].track_duration,
    currentSongIndex,
    response[currentSongIndex].track_title,
    response[currentSongIndex].artist_name
  );
};

const checkIndex = (id) => {
  currentSongIndex = id;
};

nextSong.addEventListener("click", async () => {
  currentSongIndex = (currentSongIndex + 1) % response.length;
  updateSong();
});

previousSong.addEventListener("click", async () => {
  currentSongIndex = (currentSongIndex - 1) % response.length;
  if (currentSongIndex < 0) {
    currentSongIndex = response.length - 1;
  }
  updateSong();
});

untidy.addEventListener("click", async () => {
  untidy.classList.toggle("active");
  currentSongIndex = Math.floor(Math.random() * response.length);
  updateSong();
});

loop.addEventListener("click", () => {
  loop.classList.toggle("active");
  musicSong.loop = !musicSong.loop;
  updateSong();
});

const formatDuration = (duration) => {
  const minutes = Math.floor(duration / 60);
  const seconds = Math.floor(duration % 60);
  return `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
};

const playButton = document.getElementById("play");
playButton.addEventListener("click", togglePlaySong);

seekSlider.addEventListener("input", function () {
  musicSong.currentTime = seekSlider.value;
  currentTimeDisplay.innerHTML = formatDuration(seekSlider.value);
});

musicSong.addEventListener("timeupdate", function (e) {
  seekSlider.value = e.target.currentTime;
  currentTimeDisplay.innerHTML = formatDuration(e.target.currentTime);
});

musicSong.addEventListener("loadedmetadata", function () {
  seekSlider.max = musicSong.duration;
});

const url = window.location.href;
const playlistId = url.split("=")[1];

window.onload = LoadSongs;


function handleLike(id) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "like.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
    }
  };
  xhr.send("id=" + id);
}
