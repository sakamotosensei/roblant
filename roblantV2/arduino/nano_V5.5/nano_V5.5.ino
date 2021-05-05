//ifMoistureIsBiggerThan - this value controls when to water your plant
int ifMoistureIsBiggerThan = 790;
int wateringTimeInSeconds = 120;
int watered = 0;
int moistureReading;
int moistureReading2;
int moisturePin = 7;//A7
int moisturePin2 = 3;//A3
int temperaturePin = 6;//A6
int tempReading;
float voltage; // This defines the voltage of the microcontroller to calculate the temperatures
int photocellPin = 5;//A5
int photocellReading;
//lcd screen
#include <LiquidCrystal.h>
const int rs = 12, en = 11, d4 = 4, d5 = 5, d6 = 6, d7 = 7;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);
#include <SoftwareSerial.h>
#include <Arduino.h>
// These define the RX and TX pin for the Arduino, which are used for the serial communication with the ESP
const int RX = 13;
const int TX = 12;
String StringtoESP; // This variable is used to store the string that will be sent to the ESP

//serial comm for esp8266
SoftwareSerial s(RX, TX); // This uses the integers to set the pins for serial communication


void setup() {

  pinMode(2, OUTPUT);
  pinMode(A7, INPUT);
  digitalWrite(2, LOW);
  Serial.begin(9600);
  s.begin(9600); // The baud rate for the serial communication with the ESP

  // set up the LCD's number of columns and rows:
  lcd.begin(16, 2);
  // Print a message to the LCD.
  lcd.setCursor(4, 0);
  lcd.print("RoBlant!");
  delay(1500);
}

void loop() {


  moistureReading = analogRead(moisturePin); // Grabs the reading of the moisture sensor
  moistureReading2 = analogRead(moisturePin2); // Grabs the reading of the moisture sensor2
  int average = (moistureReading + moistureReading2) / 2; //average of the 2 sensors
  if (average <= 650)
  {
    average == 0;
  }
  else
  {
    average = map(average, 866, 650, 100, 0); //this function maps the highest and lowest values of the reading and links them to a number between 0 and 100

  }



  lcd.setCursor(1, 0);
  //Serial.print("Moisture reading = "); // Prints the moisture reading to the serial monitor
  //Serial.print (average);
  //Serial.println ("%");
  // Serial.print(" | ");
  lcd.clear();
  lcd.print("Moisture = ");
  lcd.print(average);
  lcd.print("%");
  int rawValue = (analogRead(A7) + analogRead(A3)) / 2;
  //Serial.print("Raw: ");
  // Serial.print(rawValue);
  //Serial.print(" | ");

  /*==============This Code is for the light Sensor==================*/

  photocellReading = analogRead(photocellPin); // Grabs the reading of the photocell
  // Serial.print("Photocell reading = "); // Prints the photocell reading to the serial monitor
  // Serial.println(photocellReading);
  if (photocellReading < 10) {
    // Serial.println(" - Dark");
  } else if (photocellReading < 200) {
    //  Serial.println(" - Dim");
  } else if (photocellReading < 500) {
    // Serial.println(" - Light");
  } else if (photocellReading < 800) {
    // Serial.println(" - Bright");
  } else {
    //Serial.println(" - Very bright");
  }
  /*=================================================================*/

  /*=============This Code is for the temperature Sensor=============*/
  //Serial.println();
  tempReading = analogRead(temperaturePin); // This grabs the reading of the temperature sensor

  voltage = (tempReading * 500) / 1024; // Returns usable values from the temperature sensor
  //voltage = voltage / 1023; // Divides the voltage by the bit range of the temperature sensor

  float temperatureC = (voltage);// - 0.5) * 100 ; // Standard formula to turn the sensor reading into Celcius including a correction for negative temperatures
  //Serial.print(temperatureC); Serial.println(" degrees C");


  lcd.setCursor(0, 1);
  lcd.print("Temp C = ");
  lcd.print(temperatureC);
  delay(250);
  int watered = 0;
  int moistsens = analogRead(moisturePin);
  if (ifMoistureIsBiggerThan <= moistsens)
  {
    digitalWrite(2, HIGH);
    watered = watered + 1;
    delay(250);
  }
  /*=================================================================*/
  else
  {
    digitalWrite(2, LOW);
    delay(250);
  }
  /*==========This Code is for sending the data to the ESP===========*/
  StringtoESP = ""; //resetting the string
  StringtoESP = String("_") + String(temperatureC, 0) + String(";") // This is where the sensor data is put into a single string for easy transmission to the ESP
                + String(photocellReading) + String(";")
                + String(average) + String(";")
                + String(watered) + String("$"); // The '$' is used to terminate the string

  Serial.println(StringtoESP); // Prints the data string to the serial monitor
  //Serial.println(" "); // Another break for formatting
  //Serial.println("===");
  //Serial.println(" ");
  s.print(StringtoESP); // Sends the full string of data to the ESP via serial communication
  delay(5000); // Wait 10 seconds

  /*=================================================================*/
  //delay(10000);
}
