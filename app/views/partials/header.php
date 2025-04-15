<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Management System 14</title> 
        <link rel="stylesheet" href= "app/css/index.css" >
    </head>
    <body>
        <header>
            <div class="header-container">
                <h1>Welcome to the test facility</h1>
                <button class="menu-btn" onclick="toggleMenu()">☰ Navigation</button>
            </div>
            <ul class="menu-content" id="menu">
                <?php if (isset($_SESSION['api_key'])): ?>
                    <li><a href="/<?php echo APP_ROOT_DIR; ?>">Home</a></li>
                    <li><a href="/<?php echo APP_ROOT_DIR; ?>">Event Dashboard</a></li>
                    <li><a href="/<?php echo APP_ROOT_DIR; ?>">User Dashboard</a></li>                    
                    <li><a href="/<?php echo APP_ROOT_DIR; ?>/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="/<?php echo APP_ROOT_DIR; ?>/login">Login Page</a></li>
                    <li><a href="/<?php echo APP_ROOT_DIR; ?>">Register Page</a></li>
                <?php endif?>
            </ul>
            <script src="app/js/header.js"></script>            
        </header>
        <main>