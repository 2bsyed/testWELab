<?php
$conn = mysqli_connect("localhost", "root", "", "std");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $grade = $_POST["grade"];
    $age = $_POST["age"];
    $sql = "INSERT INTO stdlist (name, grade, age) VALUES ('$name', '$grade', '$age')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("Location: view.php");
    exit();
}