<?php
session_start();
require_once "GoogleAPI/vendor/autoload.php";
$gClient= new Google_Client();
$gClient->setClientId("161975795958-g6sqr2nigv4vsk4ap2bqsvqdeovbu21f.apps.googleusercontent.com");
$gClient->setClientSecret("W2XbueCr4YOZoA6vX1TK97qM");
$gClient->setApplicationName("GOOGLE Login Tutorial");
$gClient->setRedirectUri("http://localhost/SandBox/public/callback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");


