<?php
session_start();
if (isset($_GET['id'])) { //if only removing one item
    $paintingID = htmlspecialchars($_GET['id']); 

    if (isset($_SESSION['favorites']) && is_array($_SESSION['favorites'])) {//no longer a fav
        foreach ($_SESSION['favorites'] as $key => $favorite) {
            if ($favorite['PaintingID'] == $paintingID) {
                unset($_SESSION['favorites'][$key]);
                break;
            }
        }
        $_SESSION['favorites'] = array_values($_SESSION['favorites']);
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'clear') {//clears if ur supposed to clear all
    unset($_SESSION['favorites']);
}

header('Location: view-favorites.php');
exit();
