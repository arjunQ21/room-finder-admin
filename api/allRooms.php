<?php
try {
    require_once "../configs/loader.php";
    //all rooms in system
    $sql = "SELECT * from rooms order by id desc";
    $result = mysqli_query($connection, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $hostname = $_SERVER['HTTP_HOST'];
    $URI = $_SERVER['REQUEST_URI'];
    $URIs = explode("/", $URI);
    $appHostedURI = "http://" . $hostname . implode("/", array_slice($URIs, 0, count($URIs) - 2)) . "/";

    $defaultImage = 'assets/images/rooms/room-default.jpg';
    $withRightImageURLs = array_map(function (&$room) {
        global $appHostedURI, $defaultImage;
        $image = $appHostedURI . (($room['image']) ? $room['image'] : $defaultImage);
        $room['image'] = $image;
        return $room;
    }, $arr);

    header('Content-Type: application/json');


    echo json_encode([
        'status' => 'success',
        'data' => ['rooms' => $withRightImageURLs],
    ], JSON_PRETTY_PRINT
    );

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage(),
    ]);
}
