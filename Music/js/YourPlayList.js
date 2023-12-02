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
const control = document.querySelector(".control__play");
const nameSongPlay = document.querySelector(
  ".control__play__inner__left__text"
);
const ShowPlay = document.querySelector(".control__play");
const musicSong = document.getElementById("audio");

let currentSongIndex;
let response;


function loadYourPlayList() {
  const xhr = new XMLHttpRequest();
  const playlistElement = document.getElementById("playlist");

  xhr.open("POST", "./YourPlayList.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.addEventListener("load", function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      console.log(response);

      playlistElement.innerHTML = response
        .map((song, index) => {
          const {
            song_duration: trackDuration,
            playlist_song_id: trackId,
            song_title: trackTitle,
            track_preview_url: trackPreviewUrl,
            artist_name: artistName,
            album_name: album,
            artist_id: artistId,
            // album_image_url: albumImageUrl,
            song_datecreate: trackDateCreate,
          } = song;

          const formattedDuration = formatDuration(trackDuration);

          return `
                    <div class="playlist" onclick="handlePostLinkPlay('${trackPreviewUrl}', '${trackDuration}', '${trackId}', '${trackTitle}', '${artistName}')">
                        <div class="div-5">
                            <div class="text-wrapper-5">${index + 1}</div>
                            <div class="div-6">
                                <img class="image" src="" />
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
                            <div class="text-wrapper-6">${trackDateCreate}</div>
                            <div class="div-right">
              <div class="like" onClick="handleLike('${trackId}')"> 
              <svg data-encore-id="icon" role="img" aria-hidden="true" viewBox="0 0 16 16" class="Svg-sc-ytk21e-0 kPpCsU"><path d="M15.724 4.22A4.313 4.313 0 0 0 12.192.814a4.269 4.269 0 0 0-3.622 1.13.837.837 0 0 1-1.14 0 4.272 4.272 0 0 0-6.21 5.855l5.916 7.05a1.128 1.128 0 0 0 1.727 0l5.916-7.05a4.228 4.228 0 0 0 .945-3.577z"></path></svg></div>
              <div class="text-time">${formattedDuration}</div>
              </div>
                        </div>
                    </div>
                `;
        })
        .join("");
    }
  });

  // Assuming playlistId is defined somewhere
  const playlistId = 1; // Change this accordingly
  xhr.send("id=" + playlistId);
}

window.addEventListener("load", loadYourPlayList);

const formatDuration = (duration) => {
  const minutes = Math.floor(duration / 60);
  const seconds = Math.floor(duration % 60);
  return `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
};
function handleLike(id) {
    console.log(id);
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
  
  
  
  function handleLike(id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "remove_like.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      if (xhr.status === 200) {
        loadYourPlayList();
        musicSong.pause();
        IconPause.style.display = "none";
        IconPlay.style.display = "block";
        control.style.display = "none";

      }
    };
    xhr.send("id=" + id);
  }
  