
<?php

$servername = "us-cluster-east-01.k8s.cleardb.net";
$username = "b4d1b5495faff0";
$password = "e39f2731";
$database = "heroku_e716d8192725226";

$conn = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$age = "";

$errorMessage='';
$successMessage='';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];

    do{
        if(empty($name) || empty($email) || empty($age)){
            $errorMessage = "Please fill all the fields";
            break;
        }

        $sql = "INSERT INTO students (name, email, age) VALUES ('$name', '$email', '$age')";
        $result = $conn -> query($sql);

        if(!$result){
            $errorMessage="Invalid query: ".$conn>error;
            break;
        }
        //add the new student
        $name = "";
        $email = "";
        $age = "";

        $successMessage = "Student added successfully";

        header("location: /crud_app/index.php");
        exit;
    }while(false);
}
?>
<?php

require "components/createHeader.php" ?>
