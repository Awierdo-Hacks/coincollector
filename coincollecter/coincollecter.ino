#include <WiFi.h>

#define CLK 5
#define DIO 4
// WiFi configuration
const char* ssid = "WIFIIICT";
const char* password = "fakatijger";
WiFiClient client;

// Coin values in cents
const float coinValues[] = {2, 1, 0.5, 0.2, 0.1};

// Server URL
const String serverURL = "http://192.168.0.101/GIPCOIN/Coinloginsert.php";
int impulsCount = 0;
int i = 0;
float totalAmount = 0;

void setup() {

  // Connect to WiFi
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
    Serial.println();
    int totaalConnecties = WiFi.scanNetworks();
    for (int i = 0; i < totaalConnecties; i++) {
      Serial.println(WiFi.SSID(i));
    }
  }
  Serial.println("Connected to WiFi");

  // Set up coin acceptor
  pinMode(CLK, INPUT_PULLUP);
  pinMode(DIO, INPUT_PULLUP);
  attachInterrupt(digitalPinToInterrupt(CLK), incomingImpuls, RISING);

  // Load total amount from EEPROM

}
bool coinAdded = false;  // variable to keep track of whether a coin has been added or not

void incomingImpuls() {
  impulsCount++;
}

void loop() {
  // Measure the intervals between impulses
  i++;

  // Check if an impulse has been detected
  if (i >= 30 && impulsCount > 0 && !coinAdded) {
    // Add the coin value to the total amount
    float coinValue = 0;
    if(impulsCount >1 && impulsCount<=5){ // this will fix the problem of impulseCount reaching to 1
      coinValue = coinValues[impulsCount - 2];
    }
    totalAmount += coinValue;
    coinAdded = true;
    // Update the total amount in EEPROM

    Serial.println(impulsCount);
    Serial.println(coinValue);
    Serial.println(totalAmount);

    // send data to the server
    String url = serverURL + "?coinvalue=" + String(coinValue) + "&totalamount=" + String(totalAmount);
    if(client.connect("localhost",80)) {
      client.println("GET "+ url + " HTTP/1.1");
      client.println("Host: localhost");
      client.println("Connection: close");
      client.println();
    }
  }
  // Reset the counter and coinAdded variable after the coin has been processed
  if (i >= 30 && impulsCount > 0 && coinAdded) {
    impulsCount = 0;
    i = 0;
    coinAdded = false;
  }
}

