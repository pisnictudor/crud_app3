<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $servername = "us-cluster-east-01.k8s.cleardb.net";
    $username = "b4d1b5495faff0";
    $password = "e39f2731";
    $database = "heroku_e716d8192725226";

    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM students WHERE id=$id";
    $conn->query($sql);

    header("location:/crud_app/index.php");
    exit;
}
?>