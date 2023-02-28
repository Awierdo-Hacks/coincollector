#include <Servo.h>
#include <WiFi.h>

// Define WiFi credentials and server address
const char* ssid = "your_SSID";
const char* password = "your_PASSWORD";
const char* serverAddress = "your_PHP_server_address";

// Define servo pins
const int servoPins[] = {2, 3, 4, 5, 6};

// Define coin values in cents
enum Coin {
  TenCents = 10,
  TwentyCents = 20,
  FiftyCents = 50,
  OneEuro = 100,
  TwoEuros = 200
};

void setup() {
  // Set up serial communication
  Serial.begin(9600);
  // Connect to WiFi network
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  // Make a GET request to the PHP page to retrieve the amount of money
  WiFiClient client;
  if (!client.connect(serverAddress, 80)) {
    Serial.println("Connection failed");
    return;
  }
  client.print("GET /zakgeldmaker.php HTTP/1.1\r\n");
  client.print("Host: ");
  client.println(serverAddress);
  client.println("Connection: close");
  client.println();
  
  // Read the response from the server
  String response = "";
  while (client.connected()) {
    if (client.available()) {
      char c = client.read();
      response += c;
    }
  }
  Serial.println("Server response: " + response);
  
  // Parse the amount of money from the response
  int amount = response.toInt();
  
  // Calculate the number of coins of each denomination
  int numTwoEuros = amount / TwoEuros;
  amount -= numTwoEuros * TwoEuros;
  int numOneEuros = amount / OneEuro;
  amount -= numOneEuros * OneEuro;
  int numFiftyCents = amount / FiftyCents;
  amount -= numFiftyCents * FiftyCents;
  int numTwentyCents = amount / TwentyCents;
  amount -= numTwentyCents * TwentyCents;
  int numTenCents = amount / TenCents;
  
  // Dispense the coins using the servos
  for (int i = 0; i < 5; i++) {
    // Set the servo to the correct position based on the number of coins
    int pos = 0;
    switch (i) {
      case 0:
        pos = numTwoEuros;
        break;
      case 1:
        pos = numOneEuros;
        break;
      case 2:
        pos = numFiftyCents;
        break;
      case 3:
        pos = numTwentyCents;
        break;
      case 4:
        pos = numTenCents;
        break;
    }
    // Attach the servo to the pin and move it to the correct position
    Servo servo;
    servo.attach(servoPins[i]);
    servo.write(pos);
    delay(1000);
    servo.detach();
  }
  
  // Wait for 10 seconds before dispensing more coins
  delay(10000);
}
