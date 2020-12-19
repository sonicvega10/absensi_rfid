#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
 
#define SS_PIN D2 // sda pin d2
#define RST_PIN D3 // reset pin d3
MFRC522 rfid(SS_PIN, RST_PIN); 
int buser=D4; 

String tag;
 
void setup() {
  Serial.begin(9600);
  SPI.begin(); 
  rfid.PCD_Init();
}
 
void loop() {
  if ( ! rfid.PICC_IsNewCardPresent())
    return;
  if (rfid.PICC_ReadCardSerial()) {
    for (byte i = 0; i < 4; i++) {
      tag += rfid.uid.uidByte[i];
    }
    Serial.println(tag);
 
    HTTPClient http; //
 
    http.begin(" http://e073880824d4.ngrok.io/api/mode_get"); //
    http.GET(); //
    String payload = http.getString(); //
 
    char json[500]; //
    payload.toCharArray(json, 500); //
    StaticJsonDocument<200> doc; //
    deserializeJson(doc, json); //
 
    const char* mode = doc["status"]; //
 
    if(String(mode) == "user"){ //
 
    http.begin(" http://e073880824d4.ngrok.io/api/tmprfid_post"); //
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //
    String httpRequestData = "card_id=" + tag; //
 
      int httpResponseCode = http.POST(httpRequestData); //
 
      if (httpResponseCode>0) {
        Serial.print("Kartu berhasil ditambahkan ");
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
        String payload = http.getString();
        Serial.println(payload);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
    }else if(String(mode) == "kehadiran"){ //
      http.begin(" http://e073880824d4.ngrok.io/api/kehadiran_post"); //
      http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //
      String httpRequestData = "card_id=" + tag; //
 
        int httpResponseCode = http.POST(httpRequestData); //
 
        if (httpResponseCode>0) {
          Serial.print("Kehadiran berhasil ditambahkan ");
          Serial.print("HTTP Response code: ");
          Serial.println(httpResponseCode);
          String payload = http.getString();
          Serial.println(payload);
        }
        else {
          Serial.print("Error code: ");
          Serial.println(httpResponseCode);
        }
    }
 
    http.end(); //
 
    tag = ""; //
    rfid.PICC_HaltA();
    rfid.PCD_StopCrypto1();
  }
}
