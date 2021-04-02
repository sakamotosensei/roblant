<?php
include_once(__DIR__ . "/classes/PlantData.php"); // This class is used for adding and retrieving data


$result = PlantData::retrieveData(); // Retrieves the most recent entry from the database

$Temperatuur = $result['Temperatuur']; // Assigns the data from the database to a local variable
/* These if-else statements compare the data from the database to predetermined parameters */
    if($Temperatuur < 15) { 
        $tempHead = "Low";
        $tempContent = "It's too cold, find a warmer spot";
    }
    else if($Temperatuur > 15 && $Temperatuur < 24) { 
        $tempHead = "Good";
        $tempContent = "The temperature in the room is optimal!";
    }
    else if($Temperatuur > 24 && $Temperatuur < 30) { 
        $tempHead = "Little high";
        $tempContent = "The temperature in the room is getting to warm";
    }
    else {
        $tempHead = "High";
        $tempContent = "It's too warm, find a cooler spot";
    }

$light = $result['light'];
    if($result['light'] < 333){
        $brightnessHead = "Low";
        $brightnessContent = "Your plant isn't receiving enough sunlight";
        $brightness = "Dark";
    }
    else if($result['light'] > 333 && $result['light'] < 666){
        $brightnessHead = "Good";
        $brightnessContent = "Your plant is receiving enough sunlight!";
        $brightness = "Bright";
    }
    else if($result['light'] > 666){
        $brightnessHead = "High";
        $brightnessContent = "Your plant is receiving too much sunlight";
        $brightness = "Extremely Bright";
    }

$moisture = $result['moisture'];
    if($result['moisture'] < 50){
        $waterHead = "Low";
        $waterState = "Soil moisture is low, your plant gets watered";
    }
    else{
        $waterHead = "Normal";
        $waterState = "All good";
    }
?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="10"><!--number of sec until auto refresh-->

</head>
    <meta charset="UTF-8">
    <link rel="icon" href="Images\favicon-16x16.png" type="image/gif" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plantSensor.css">
    <title>Plant Monitor</title>
</head>
<body>

    <header>
    <div class="floatH1 logo">
            <a class="py-2" href="index.html" aria-label="home">
                <img src="Images/roblantfull.png" alt="">
        </div>


        </div>
        <div class="topnav clearfix">
            <a href="logout.php">Sign-out</a>
        </div>
    </header>
    <main>
        
        <!--These three articles all have the same layout-->
        <article class="water plantCard">
            <h3>Water: <span class="accent"><?php echo($waterHead); ?></span></h3> <!--The title of the info card for water-->
            <div class="articleContent">
                <img class="icon" src="Images\detail-icon-01.png" alt=""> <!--The icon for the water card-->
                <div>
                    <p class="info"><?php echo($waterState); ?></p><!--This displays whether action needs to be taken-->
                    <p><?php echo($result['moisture'] . "%" . " moisture"); ?></p> <!--Shows the raw data of the measurement-->
                </div>
            </div>
        </article>

        <article class="sunlight plantCard">
            <h3>Sunlight: <span class="accent"><?php echo($brightnessHead); ?></span></h3>
            <div class="articleContent">
                <img class="icon" src="Images\detail-icon-02.png" alt="">
                <div>
                    <p class="info"><?php echo($brightnessContent); ?></p>
                    <p><?php echo($result['light'] . " - " . $brightness); ?></p>
                </div>
            </div>
        </article>

        <article class="temperature plantCard">
            <h3>Temperature: 
                <span class="accent"><?php echo($tempHead) ?></span>
            </h3>
            <div class="articleContent">
                <img class="icon" src="Images\detail-icon-03.png" alt="">
                <div>
                    <p class="info"><?php echo($tempContent) ?></p>
                    <p><?php echo($result['Temperatuur'] . " °C"); ?></p>
                </div>
            </div>
        </article>

        

    </main>
</body>
</html>