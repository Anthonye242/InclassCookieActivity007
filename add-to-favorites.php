<?php
session_start();

// Check if required query parameters exist
if (isset($_GET['PaintingID'], $_GET['ImageFileName'], $_GET['Title'])) {
    $paintingID = $_GET['PaintingID'];
    $imageFileName = $_GET['ImageFileName'];
    $title = $_GET['Title'];

    // Initialize favorites array in session if not already set
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    // Add the painting to the favorites list
    $_SESSION['favorites'][] = [
        'PaintingID' => $paintingID,
        'ImageFileName' => $imageFileName,
        'Title' => $title
    ];
}

// Redirect back to the previous page or to a default page
header('Location: viewFavorites.php');
exit;
?>
