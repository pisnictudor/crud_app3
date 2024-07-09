<?php
require "students/components/mainHeader.php";
?>
        <?php

    $servername = "us-cluster-east-01.k8s.cleardb.net";
    $username = "b4d1b5495faff0";
    $password = "e39f2731";
    $database = "heroku_e716d8192725226";
        //Create connection
        $conn = new mysqli($servername, $username, $password, $database);
        //Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //Read all from database
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        if (!$result) {
            die("Invalid query: " . $conn->error);
        }
        //Read the data
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['age']}</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/crud_app/students/edit.php?id={$row['id']}'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/crud_app/students/delete.php?id={$row['id']}'>Delete</a>
                </td>
            </tr>
            ";
        }
        ?>

<?php
require "students/components/mainFooter.php";
?>
