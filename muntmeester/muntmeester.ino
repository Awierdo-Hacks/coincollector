
struct Muntenteller {
    const uint8_t PIN;
    uint32_t puls;
    bool pressed;
};

Muntenteller Muntenteller1 = {14, 0, false};

const int interval = 500;
unsigned long lastTime = 0;

void IRAM_ATTR isr() {
    Muntenteller1.puls++;
    Muntenteller1.pressed = true;
    lastTime = millis();
}

void setup() {
    Serial.begin(115200);
    pinMode(Muntenteller1.PIN, INPUT_PULLUP);
    attachInterrupt(Muntenteller1.PIN, isr, FALLING);
}

void loop() {
  if (Muntenteller1.pressed && ((millis() - lastTime) > interval)) {
    Muntenteller1.pressed = false;

    float coinValue = 0;
   
    // Controleer of er pulsen zijn ontvangen
    if (Muntenteller1.puls > 0) {
      // Bepaal de muntwaarde op basis van het aantal pulsen
      if (Muntenteller1.puls == 1) {
        coinValue = 2;
      } else if (Muntenteller1.puls == 2) {
        coinValue = 1;
      } else if (Muntenteller1.puls == 3) {
        coinValue = 0.5;
      } else if (Muntenteller1.puls == 4) {
        coinValue = 0.2;
      } else if (Muntenteller1.puls == 5) {
        coinValue = 0.1;
      } else {
        coinValue = 0;
      }
      Serial.print("De muntenteller heeft ");
      Serial.println(coinValue);
      Serial.print("Pulsen: ");
      Serial.println(Muntenteller1.puls);
      
      Muntenteller1.puls = 0;
    }
    lastTime = millis();
  }
}