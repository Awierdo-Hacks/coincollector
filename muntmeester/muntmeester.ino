#include <WiFi.h>
#include <HTTPClient.h>

 HTTPClient http;
    
const String serverURL = "http://10.3.41.58/coincollector/GIPCOIN/Coinloginsert.php";

struct Muntenteller {
    const uint8_t PIN;
    uint32_t puls;
    bool pressed;
};

Muntenteller muntenTeller = {14, 0, false};

const int interval = 500;
unsigned long lastTime = 0;

void IRAM_ATTR isr() {
    muntenTeller.puls++;
    muntenTeller.pressed = true;
    lastTime = millis();
}

void setup() {
    Serial.begin(115200);
    WiFi.begin("WIFIIICT", "fakatijger");
    Serial.print("Connecting to WiFi ");
    while (WiFi.status() != WL_CONNECTED) {
      Serial.print(".");
      delay(100);
    }
    Serial.print(" Connected");

    pinMode(muntenTeller.PIN, INPUT_PULLUP);
    attachInterrupt(muntenTeller.PIN, isr, FALLING);
}

void loop() {
  if (muntenTeller.pressed && ((millis() - lastTime) > interval)) {
    muntenTeller.pressed = false;
    lastTime = millis();

    int coinValue = 0;
   
    // Controleer of er pulsen zijn ontvangen
    if (muntenTeller.puls > 0) {
      // Bepaal de muntwaarde op basis van het aantal pulsen
      if (muntenTeller.puls == 1) {
        coinValue = 200;
      } else if (muntenTeller.puls == 2) {
        coinValue = 100;
      } else if (muntenTeller.puls == 3) {
        coinValue = 50;
      } else if (muntenTeller.puls == 4) {
        coinValue = 20;
      } else if (muntenTeller.puls == 5) {
        coinValue = 10;
      } else {
        coinValue = 0;
      }
      Serial.print("De muntenteller heeft ");
      Serial.println(coinValue);
      Serial.print("Pulsen: ");
      Serial.println(muntenTeller.puls);

      if (WiFi.status() == WL_CONNECTED) {

        String url = serverURL + "?coinvalue=" + String(coinValue);
        Serial.println(url);
        http.begin(url.c_str());

        int statusCode = http.GET();
        if (statusCode > 0) {
          String payload = http.getString();
        } else {
          Serial.print("Error Code: ");
          Serial.println(statusCode);
        }

        http.end();
      }
      
      muntenTeller.puls = 0;
    }
  }

  

  
}