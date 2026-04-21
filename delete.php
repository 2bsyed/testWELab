<?php
$conn = mysqli_connect("localhost", "root", "", "std");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM stdlist WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("Location: view.php");
    exit();
} else {
    echo "No ID specified.";
    mysqli_close($conn);
}
?>