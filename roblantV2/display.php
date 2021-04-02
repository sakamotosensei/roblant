

<!DOCTYPE html>
<html>
<head>
    <title>data</title>
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
            <a class="py-2" href="home.html" aria-label="home">
                <img src="Images/roblantfull.png" alt="">


        </div>

        <div class="topnav clearfix">
            <a  href="plantsensor.php">fortnite</a>
            <a href="logout.php">Sign-out</a>
        </div>

    </header>
<body>

<?php
include_once(__DIR__ . "/classes/PlantData.php"); // This class is used for adding and retrieving data

if(isset($_POST["data"])){ // Checks if $_POST['data'] exists
    if(!empty($_POST["data"])){ // Checks that something is stored in $_POST['data']
        var_dump($_POST["data"]); // Dumps the information that was received (this is displayed in the serial monitor)
        $data = null;
        $data = explode(";", $_POST["data"]); // Splits the data into usable parts

        $plantData = new PlantData(); // New instance of class PlantData
        $plantData->setCelcius($data[0]); // Assigns the data to a variable using getters
        $plantData->setFahrenheit($data[1]);
        $plantData->setLight($data[2]);
        $plantData->setMoisture($data[3]);
        $plantData->settime($data[4]);

        $plantData->addData(); // Enters the data into the database
    }
}

$result = PlantData::retrieveData(); // Retrieves the most recent entry from the database

/* These print the data onto the webpage */
echo("Celcius: " . $result['celcius'] . "<br></br>");
echo("Fahrenheit: " . $result['fahrenheit'] . "<br></br>");
echo("Brightness: " . $result['light'] . "<br></br>");
echo("Moisture: " . $result['moisture'] . "<br></br>");
echo("Date of Measurement: " . $result['time'] . "<br></br>");
?>

</body>
</html>