const a = document.getElementById("input_add_playlist");
function addPlaylist() {
  a.style.display = "block";
}
function closePlaylist() {
  a.style.display = "none";
}

const navigation = document.querySelector(".left-section");
const showMenu  = () => {
  navigation.classList.add("active");
};
function closeSidebar(){
  navigation.classList.remove("active");
}