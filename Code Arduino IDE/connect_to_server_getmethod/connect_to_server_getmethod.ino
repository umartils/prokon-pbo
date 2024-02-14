#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "COBA ESP";
const char* password = "123456789";
const char* serverIP = "192.168.12.183"; 
const int serverPort = 80; 

void setup() {
  Serial.begin(9600);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
}

void loop() {
  WiFiClient client;
  HTTPClient http;

  String Data = "?rfid=13%208C%2045%2010";
  String url = "http://" + String(serverIP) + "/Project/monitoring_doorlock/Monitoring/getstatus" + String(Data);
  
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
        Serial.println("Menyalakan lampu");
      } else {
        Serial.println("Matikan lampu");
      }
    }
  } else {
    Serial.println("Gagal terhubung ke server");
  }

  http.end();
  delay(5000);  

  Serial.println("Data telah terkirim!");  
}

