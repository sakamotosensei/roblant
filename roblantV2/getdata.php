<?php
include_once(__DIR__ . "/classes/PlantData.php");
if(isset($_POST["data"])){ // Checks if $_POST['data'] exists
    //echo ("if");
    if(!empty($_POST["data"])){ // Checks that something is stored in $_POST['data']
        //echo("if2");
        var_dump($_POST["data"]); // Dumps the information that was received (this is displayed in the serial monitor)
        $data = null;
        $data = explode(";", $_POST["data"]); // Splits the data into usable parts

        $plantData = new PlantData(); // New instance of class PlantData
        $plantData->setTemperatuur($data[0]); // Assigns the data to a variable using getters
        $plantData->setLight($data[1]);
        $plantData->setMoisture($data[2]);
        $plantData->setWatered($data[3]);
        
        //echo("hello");
        $insertresult = $plantData->addData(); // Enters the data into the database
        echo($insertresult);
    }
}
?>