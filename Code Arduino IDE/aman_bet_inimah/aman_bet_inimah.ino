/* --------------------------------------
 *             MFRC522      NodeMCU      
 *             Reader/PCD   ESP 8266        
 * Signal      Pin          Pin           
 * --------------------------------------
 * RST/Reset   RST          D4 / 2           
 * SPI SS      SDA(SS)      D8 / 15          
 * SPI MOSI    MOSI         D7 / 13  
 * SPI MISO    MISO         D6 / 12  
 * SPI SCK     SCK          D5 / 14   
 *
 */
#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#define RST_PIN   2
#define SS_PIN    15
#define relay     16

byte LED_Red    = 4;
byte LED_Green  = 5;
byte Buzzer     = 12; 

MFRC522 rfid(SS_PIN, RST_PIN);  

const char* ssid = "Pojok Priangan 1";
const char* password = "passwordnya22";
const char* serverIP = "192.168.1.20";  
const int serverPort = 80;  

bool readCard = false;

void setup() {
  Serial.begin(9600);
  while (!Serial);
  SPI.begin();
  rfid.PCD_Init();
  Serial.println("Tap RFID/NFC Tag on reader");

  pinMode(LED_Red, OUTPUT);
  pinMode(LED_Green, OUTPUT);
  pinMode(relay, OUTPUT);

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
}

void valid() {
  Serial.println("Access Granted");
  Serial.println();
  delay(500);

  digitalWrite(LED_Green, HIGH);
  // tone(Buzzer, 2000);
  // delay(200);
  // noTone(Buzzer);
  // delay(50);
  digitalWrite(relay, LOW);
  delay(5000);
  digitalWrite(relay, HIGH);
  delay(100);
  digitalWrite(LED_Green, LOW);

  // tone(Buzzer, 2000);
  // delay(200);
  // noTone(Buzzer);
  // delay(50);
}

void invalid() {
  Serial.println("Access Denied");
  Serial.println();
  delay(500);

  digitalWrite(LED_Red, HIGH);
  delay(500);
  digitalWrite(LED_Red, LOW);
  delay(500);
  digitalWrite(LED_Red, HIGH);
  delay(500);
  digitalWrite(LED_Red, LOW);
  delay(500);
  digitalWrite(LED_Red, HIGH);
  delay(500);
  digitalWrite(LED_Red, LOW);
  delay(500);
  digitalWrite(LED_Red, HIGH);
  delay(500);
  digitalWrite(LED_Red, LOW);
  delay(500);
  digitalWrite(LED_Red, HIGH);
  delay(500);
  digitalWrite(LED_Red, LOW);
  delay(500);
  // digitalWrite(LED_Red, HIGH);
  // tone(Buzzer, 1500);
  // delay(500);
  // digitalWrite(LED_Red, LOW);
  // noTone(Buzzer);
  // delay(100);
  // digitalWrite(LED_Red, HIGH);
  // tone(Buzzer, 1500);
  // delay(500);
  // digitalWrite(LED_Red, LOW);
  // noTone(Buzzer);
  // delay(100);
  // digitalWrite(LED_Red, HIGH);
  // tone(Buzzer, 1500);
  // delay(500);
  // digitalWrite(LED_Red, LOW);
  // noTone(Buzzer);
}

void sendtoserver(String cardUid) {
  String uid;
  uid = cardUid;
  if (uid != "") {
    WiFiClient client;
    HTTPClient http;

    String data = "?rfid=" + uid;
    String url = "http://" + String(serverIP) + "/Project/monitoring_doorlock/Monitoring/getstatus" + data;

    Serial.print("Connecting to: ");
    Serial.println(url);
    http.begin(client, url);
    int httpCode = http.GET();

    if (httpCode > 0) {
      if (httpCode == HTTP_CODE_OK) {
        String payload = http.getString();
        Serial.println("Server Response:");
        Serial.println(payload);

        if (payload == "1") {
          valid();
        } else {
          invalid();
        }
      }
    } else {
      Serial.println("Failed to connect to the server");
    }

    http.end();
  }
}

void loop() {
  if (rfid.PICC_IsNewCardPresent() && !readCard) {
    readCard = true;

    if (rfid.PICC_ReadCardSerial()) {
      MFRC522::PICC_Type piccType = rfid.PICC_GetType(rfid.uid.sak);
      Serial.print("RFID/NFC Tag Type: ");
      Serial.println(rfid.PICC_GetTypeName(piccType));

      String cardUid = "";
      for (int i = 0; i < rfid.uid.size; i++) {
        cardUid += (rfid.uid.uidByte[i] < 0x10 ? "0" : "") + String(rfid.uid.uidByte[i], HEX);
        if (i < rfid.uid.size - 1) {
          cardUid += "%20";
        }
      }
      cardUid.toUpperCase();
      Serial.println(cardUid);
      sendtoserver(cardUid);

      rfid.PICC_HaltA(); 
      rfid.PCD_StopCrypto1(); 
    }

    readCard = false;
  }

  delay(100);  // Add a delay to prevent rapid consecutive card reads
}
