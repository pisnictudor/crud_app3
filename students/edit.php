<?php

$servername = "us-cluster-east-01.k8s.cleardb.net";
$username = "b4d1b5495faff0";
$password = "e39f2731";
$database = "heroku_e716d8192725226";

//Creating connection
$conn = new mysqli($servername, $username, $password, $database);

$id = "";
$name = "";
$email = "";
$age = "";

$errorMessage = '';
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        header("location: /crud_app/index.php");
        exit;
    }

    $id = $_GET["id"];

    //read the row of the selected student from db table
    $sql = "SELECT * FROM students WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /crud_app/index.php");
        exit;
    }
    $name = $row['name'];
    $email = $row['email'];
    $age = $row['age'];
} else {
    //POST method: Update the data of the client
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($age)) {
            $errorMessage = "Please fill all the fields";
            break;
        }
        $sql = "UPDATE students SET name = '$name', email = '$email', age = '$age' WHERE id = $id";

        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }
        $successMessage = "Student updated successfully";

        header("location: /crud_app/index.php");
        exit;

    } while (false);
}
?>

<?php
require "components/editHeader.php"
?>
