<?php
$conn = mysqli_connect("localhost", "root", "", "std");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM stdlist WHERE id=$id";
    $result = mysqli_query($conn, $sql);
  
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Update Student
</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        <input type="number" name="age" value="<?php echo $row['age']; ?>" required><br>
        <input type="text" name="grade" value="<?php echo $row['grade']; ?>" required><br>
        <button type="submit">Update Student</button>
    </form>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>