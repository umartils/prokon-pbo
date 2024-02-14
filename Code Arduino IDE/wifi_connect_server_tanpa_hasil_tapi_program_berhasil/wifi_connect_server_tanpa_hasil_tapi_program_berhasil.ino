#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "Pojok Priangan 1";
const char* password = "passwordnya22";
const char* serverIP = "192.168.1.20";  // Ganti dengan IP ESP8266 di jaringan Anda
const int serverPort = 80;  // Port default untuk HTTP

void setup() {
  Serial.begin(115200);
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

  String url = "http://" + String(serverIP) + "/Project/monitoring_doorlock/monitoring/getstatus";

  // Membuat data POST
   
  String postData = "?rfid=13 8C 45 10";  // Ganti dengan data RFID yang sesuai
  // Serial.println("RFID yang Dikirim: " + postData);
  http.begin(client, url);
  // http.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpCode = http.POST(postData);
  if (httpCode > 0) {
    if (httpCode == HTTP_CODE_OK) {
      String payload = http.getString();
      Serial.println("Server Response:");
      Serial.println(payload);
      // Proses respons dari server di sini
    }
  } else {
    Serial.println("Gagal terhubung ke server");
  }

  http.end();
  delay(5000);  // Tunggu 5 detik sebelum mengirim permintaan lagi

  Serial.println("Data telah terkirim!");  // Pesan ini akan muncul di Serial Monitor
}
