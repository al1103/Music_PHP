const main = document.getElementById("main");
const frame = document.getElementById("frame");
show =false;
function openNotification() {
    show = !show;
    if (!show) {
        frame.style.display = "block";
        main.style.display = "none";
    } else {
        frame.style.display = "none";
        main.style.display = "block";
        const xhr = new XMLHttpRequest();
    xhr.open("POST", "WhatsNew.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
            main.innerHTML = xhr.responseText;
        }

    };
    xhr.send();
    }
}
    
