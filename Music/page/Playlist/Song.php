<?php
require("../../config.php");
$id = isset($_GET["id"]) ? $_GET["id"] : (isset($_POST["id"]) ? $_POST["id"] : "");

$index = 0;
$sql = "SELECT
album.image_url AS album_image_url,
track.id AS track_id,
track.title AS track_name,
track.duration AS track_duration,
track.preview_url AS track_preview_url,
track.genre AS track_genre,
track.datecreate AS track_datecreate,
artist.id AS artist_id,
album.title AS album_name,
album.id AS album_id,
artist.name AS artist_name
FROM album
RIGHT JOIN track ON album.id = track.album_id
INNER JOIN artist ON track.artist_id = artist.id
WHERE album.id = '$id'";


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