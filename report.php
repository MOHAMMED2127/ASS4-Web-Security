<?php
session_start();

if(isset($_SESSION["role"])){

    if(isset($_GET["type"])){
        $type = $_GET["type"];
    }else{
        $type = "user";
    }

    if($type == "admin" && $_SESSION["role"] != "admin"){
        echo "You are not allowed to access admin report";
    }else{

        if(isset($_SESSION["username"])){
            $username = htmlspecialchars($_SESSION["username"]);
        }else{
            $username = "user";
        }

        if($type == "admin"){
            echo "<h1>Admin Report</h1>";
            echo "<h3>hello $username</h3>";
        }else{
            echo "<h1>User Report</h1>";
            echo "<h3>hello $username</h3>";
        }
    }

}else{
    echo "Please login first";
}
?>