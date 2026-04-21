<?php
$conn = mysqli_connect("localhost", "root", "", "std");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ( $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST["id"];
    $name = $_POST["name"];
    $grade = $_POST["grade"];
    $age = $_POST["age"];
    $sql = "UPDATE stdlist SET name='$name', grade='$grade', age='$age' WHERE id=$id";
    if (!mysqli_query($conn, $sql)) {
        die("Error updating record: " . mysqli_error($conn));
    }
    mysqli_close($conn);
    header("Location: view.php");
    exit();
} else {
    echo "Invalid request method.";
    mysqli_close($conn);
}
?>