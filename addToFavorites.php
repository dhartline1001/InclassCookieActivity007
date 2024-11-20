<?php
session_start(); // Start session to access session state

// Check if the required query string parameters are present
if (isset($_GET['PaintingID'], $_GET['ImageFileName'], $_GET['Title'])) {
    // Create an associative array for the favorite item
    $favoriteItem = [
        'PaintingID' => $_GET['PaintingID'],
        'ImageFileName' => $_GET['ImageFileName'],
        'Title' => $_GET['Title']
    ];

    // Check if the favorites array exists in the session, if not, initialize it
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = []; // Initialize as an empty array
    }

    // Add the new favorite item to the favorites array
    $_SESSION['favorites'][] = $favoriteItem;

    // Redirect to the view-favorites.php page
    header('Location: view-favorites.php');
    exit();
} else {
    // If query string parameters are missing, display an error message (for debugging)
    echo "Error: Missing PaintingID, ImageFileName, or Title in the query string.";
    exit();
}
