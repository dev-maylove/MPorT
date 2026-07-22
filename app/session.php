<?php
session_start();

function isLoggedIn(){
    return isset($_SESSION['user']);
}

function isAdmin(){
    return isset($_SESSION['user']) && $_SESSION['user']['role']=='admin';
}

function auth(){
    if(!isLoggedIn()){
        header("Location: /public/auth/login.php");
        exit;
    }
}

function adminOnly(){
    auth();
    if(!isAdmin()){
        http_response_code(403);
        exit("Akses ditolak");
    }
}
