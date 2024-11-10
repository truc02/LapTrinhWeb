<?php
    include("../connectDB/connectDB.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fullName = $_POST['registerName'] ?? '';
        $userName = $_POST['registerUsername'] ?? '';
        $email = $_POST['registerEmail'] ?? '';
        $password = $_POST['registerPassword'] ?? '';
        $repeatPassword = $_POST['registerRepeatPassword'] ?? '';
    }