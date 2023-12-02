<?php
session_start();
require("../../config.php");
$playlist_id = 1;
$user_id = $_SESSION['user_id'];

$song_id = isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : "");

// Đặt giá trị cho $playlist_id và $song_id từ dữ liệu hoặc form
$playlist_id = 1; // Ví dụ

// Kiểm tra xem bản ghi đã tồn tại hay chưa
$check_sql = "SELECT * FROM `playlist_songs` WHERE `playlist_id` = '$playlist_id' AND `song_id` = '$song_id'";
$check_result = $conn->query($check_sql);

if ($check_result) {
    if ($check_result->num_rows > 0) {
        // Nếu đã tồn tại, xóa bản ghi
        $delete_sql = "DELETE FROM `playlist_songs` WHERE `playlist_id` = '$playlist_id' AND `song_id` = '$song_id'";
        $delete_result = $conn->query($delete_sql);

        if ($delete_result) {
            echo 'Đã xóa bài hát thành công.';
        } else {
            echo 'Lỗi khi xóa bài hát: ' . $conn->error;
        }
    } else {
        // Nếu chưa tồn tại, thêm bản ghi
        $insert_sql = "INSERT INTO `playlist_songs` (`playlist_id`, `song_id`) VALUES ('$playlist_id','$song_id')";
        $insert_result = $conn->query($insert_sql);

        if ($insert_result) {
            echo 'Đã thêm bài hát thành công.';
        } else {
            echo 'Lỗi khi thêm bài hát: ' . $conn->error;
        }
    }
} else {
    echo 'Lỗi khi kiểm tra sự tồn tại: ' . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
