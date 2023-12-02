<?php

require("../../config.php");
$user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : (isset($_POST["user_id"]) ? $_POST["user_id"] : "");

$id = isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : "");

$sql = "SELECT ps.id AS playlist_song_id, t.title AS song_title, t.duration AS song_duration, t.datecreate AS song_datecreate, a.name AS artist_name, al.title AS album_name FROM playlist_songs ps JOIN your_playlist p ON ps.playlist_id = p.id JOIN track t ON ps.song_id = t.id JOIN artist a ON t.artist_id = a.id JOIN album al ON t.album_id = al.id WHERE p.id = '$id'";
$result = $conn->query($sql);
$responseData = [];

// Check if there are any results from the query
if ($result->num_rows > 0) {
    // Fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        // Add the row data to the response array
        $responseData[] = $row;
    }
}

// Encode the response array into JSON format
$json = json_encode($responseData);

// Set the appropriate content type for JSON output
header('Content-Type: application/json');

// Output the JSON data
echo $json
?>