<?php
session_start();
require("../../config.php");

// Check if user is logged in and retrieve user_id from the session
if (!isset($_SESSION['user_id'])) {
    // Handle the case when the user is not logged in
    echo 'User not logged in.';
    exit;
}

$user_id = $_SESSION['user_id'];
$id = isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : "");

// Retrieve playlist_id from the session or your application logic
$playlist_id = 1; // Example value, replace this with your actual logic to get the playlist_id

$delete_sql = "DELETE FROM `playlist_songs` WHERE `playlist_id` = '$playlist_id' AND `id` = '$id'";
$delete_result = $conn->query($delete_sql);

if ($delete_result) {
    echo 'Đã xóa bài hát thành công.';
} else {
    echo 'Lỗi khi xóa bài hát: ' . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
