// Inclusief de ESP32 bibliotheken
#include <WiFi.h>
#include <HTTPClient.h>

// Definieer de pinnen van de muntenteller
const int pulseInPin = 14;

// Variabelen om de muntwaarde en het aantal pulsen bij te houden
float coinValue = 0;
int pulseCount = 0;

// WiFi-gegevens
const char* ssid = "WIFIIICT";
const char* password = "fakatijger";

// adress
const char* serverIP = "http://10.3.41.58/GIPCOIN/Coinloginsert.php";

void setup() {
  // Seriële communicatie initialiseren
  Serial.begin(115200);

  // Start de puls teller
	pinMode(pulseInPin, INPUT_PULLUP);

  // Verbinden met WiFi-netwerk
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }

  Serial.println("Connected to WiFi");
}

void loop() {
  // Tellen van pulsen met de pulseIn()-functie
  pulseCount = pulseIn(pulseInPin,LOW);

  // Controleer of er pulsen zijn ontvangen
  if (pulseCount > 0) {
    // Bepaal de muntwaarde op basis van het aantal pulsen
    if (pulseCount == 1) {
      coinValue = 2;
    } else if (pulseCount == 2) {
      coinValue = 1;
    } else if (pulseCount == 3) {
      coinValue = 0.5;
    } else if (pulseCount == 4) {
      coinValue = 0.2;
    } else if (pulseCount == 5) {
      coinValue = 0.1;
    } else {
      coinValue = 0;
    }

    Serial.print("Received ");
    Serial.print(pulseCount);
    Serial.print(" pulses. Coin value is ");
    Serial.println(coinValue);

    // Verstuur de gegevens naar de server
    sendCoinValue(coinValue);

    // Reset de pulse teller
    pulseCount = 0;
  }
}

void sendCoinValue(int value) {
  // Maak een HTTP-verzoek naar de server
  HTTPClient http;
  String url = "http://" + String(serverIP) + "?coinvalue=" + String(value);

  Serial.print("Sending data to server: ");
  Serial.println(url);

  http.begin(url);
  int httpResponseCode = http.GET();
  http.end();

  // Controleer of het verzoek succesvol was
  if (httpResponseCode > 0) {
    Serial.print("Server response code: ");
    Serial.println(httpResponseCode);
  } else {
    Serial.println("Error sending data to server");
  }
}
