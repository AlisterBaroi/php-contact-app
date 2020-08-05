<?php
$conn = mysqli_connect('localhost', 'root', '', 'contactapp') or die("unable to connect");
session_start();

$err = array("No data", "Please fill in the informations", "Contact added successfully", "Could not be deleted", "Deleted successfully", "No matching contacts found", "Contact updated successfully", "Sorry, contact couldn't be updated", "User name or password does not match", "Welcome", "Logged out", "Please login to view this page", "Yor already are logged in", "You are already logged out");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact App</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,7700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <link rel="stylesheet" href="style.css">
<nav class="navbar">
        <ul class="navbar-nav">
        <?php if (!isset($_SESSION['user'])) {?>
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <div class="">
                        <img width="50" height="50" src="img/home.png" alt="">
                        <span class="link-text">HOME</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link">
                    <div class="">
                        <img width="50" height="50" src="img/login.png" alt="">
                        <span class="link-text">LOGIN</span>
                    </div>
                </a>
            </li>
            <?php } else {?>
                <li class="nav-item">
            <a href="view.php" class="nav-link">
                    <div class="View-Nav">
                        <img width="50" height="50" src="img/view.png" alt="">
                        <span class="link-text">VIEW</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="add.php" class="nav-link">
                    <div class="Add-Nav">
                        <img width="50" height="50" src="img/add.png" alt="">
                        <span class="link-text">ADD</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="edit.php" class="nav-link">
                    <div class="Edit-Nav">
                        <img width="50" height="50" src="img/edit.png" alt="">
                        <span class="link-text">EDIT</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="delete.php" class="nav-link">
                    <div class="Delete-Nav">
                        <img width="50" height="50" src="img/delete.png" alt="">
                        <span class="link-text">DELETE</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                    <div class="Delete-Nav">
                        <img width="50" height="50" src="img/logout.png" alt="">
                        <span class="link-text">LOGOUT</span>
                    </div>
                </a>
            </li>
            <?php }?>
            <div class="name">
                <h1>by:</h1>
                <h1>Alister <span>0340938</span></h1>
                <h1>Muntahin <span>0341137</span></h1>
            </div>
        </ul>
</nav>