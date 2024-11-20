<?php
// Start or resume the session to access or modify session data.
session_start();

// Check if the 'clear' query parameter is set and its value is 'true'.
if (isset($_GET['clear']) && $_GET['clear'] === 'true') {
    // If 'clear' is true, clear the favorites list by removing it from the session.
    unset($_SESSION['favorites']);
} 
// Check if the 'PaintingID' query parameter is set.
elseif (isset($_GET['PaintingID'])) {
    $paintingID = $_GET['PaintingID']; // Retrieve the PaintingID from the query string.

    // Ensure the favorites list exists in the session before attempting to modify it.
    if (isset($_SESSION['favorites'])) {
        // Filter the favorites list, keeping only items that do not match the provided PaintingID.
        $_SESSION['favorites'] = array_filter($_SESSION['favorites'], function ($favorite) use ($paintingID) {
            return $favorite['PaintingID'] != $paintingID; // Keep items where PaintingID does not match.
        });
    }
}

// Redirect the user back to the view-favorites.php page after the action is completed.
header('Location: view-favorites.php');
exit(); // Terminate the script to ensure the redirect is executed properly.
?>
