<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "testdatabase";

$conn = new mysqli($host,$username,$password,$database_name);

if(isset($_POST["login"])){
    $email_from = $_POST["email"];
    $password_from = $_POST["password"];

    $sql_select = "SELECT * FROM users Where email = '$email_from'";
    $result = $conn->query($sql_select);

    if($result->num_rows >= 1){

        $data = $result->fetch_assoc();   

        $hased_password = $data["password"];

        if(password_verify($password_from,$hased_password)){

            session_start();
            $_SESSION["username"] = $data["username"];
            $_SESSION["role"] = $data["role"];

            header("Location: report.php?type=user");
            exit;

        }else{
            echo "login data false";
        }
    }else{
        echo "login data false";
    }
}
?>
