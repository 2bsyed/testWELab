<?php
$conn= mysqli_connect("localhost", "root", "", "std");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM stdlist";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
     <div class="nav">
        <a href="index.html">Home</a>
        <a href="view.php">View Students</a>
        <a href="search.php">Search Students</a>
    </div>
    <br>
    <h1>Student List</h1>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Grade</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["name"]. "</td><td>" . $row["grade"]. "</td><td>" . $row["age"]. "</td><td><a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    ?>
    </table>
</body>
</html>