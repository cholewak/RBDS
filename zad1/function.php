<?php
session_start();

function login($user_name, $user_password){
    if($user_name == "test" && $user_password == "test123"){
        $_SESSION['user_name'] = $user_name;
        return true;
    }
    return false;
}

function is_login(){
    if(isset($_SESSION['user_name'])){
        return true;
    }else{
        return false;
    }
}

function logout(){
    session_destroy();
}

$mysqli = new mysqli("58897.m.tld.pl", "admin58897_baza_1", "0Xh5WLd259", "baza58897_baza_1");
if(mysqli_connect_errno()){
    prontf("Connect dailed: %s\n", mysqli_connect_error());
}

function get_users(){
    $sql = "select * from users";
    $response = [];
    if ($result = $GLOBALS["mysqli"]->query($sql)) {
        while ($row = $result->fetch_assoc()){
            $response[] = $row;
        }
        mysqli_free_result($result);
    }
    return $response;
}