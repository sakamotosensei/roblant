
<!DOCTYPE html>
<html>
<head>
    <title>account</title>
    <link rel="stylesheet" type="text/css" href="contact1.css">
    <!-- favicon-->
    <link rel="icon"
        href="Images\favicon-16x16.png"
        type="image/gif" sizes="16x16">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="floatH1 logo">
            <a class="py-2" href="roblant.php" aria-label="home">
                <img src="Images/roblantfull.png" alt="">


        </div>

        <div class="topnav clearfix">
            <a  href="account.php">account</a>
            <a href="logout.php">Sign-out</a>
        </div>

    </header>
<body>

<?php

// Initialize the session
session_start();

include_once(__DIR__ . "/classes/User.php");

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "roblant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, email FROM tblklanten";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th><th>email</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>