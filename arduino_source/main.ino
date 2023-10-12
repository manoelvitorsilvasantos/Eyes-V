//
#include <Servo.h>

const int LED_RED = 9;
const int LED_GREEN = 8;
Servo meuServo;
int dt = 0;

void setup()
{
  Serial.begin(9600);
  pinMode(LED_RED, OUTPUT);
  pinMode(LED_GREEN, OUTPUT);
  meuServo.attach(9);
  digitalWrite(LED_GREEN, LOW);
  digitalWrite(LED_RED, LOW);
}

void loop()
{
  dt = Serial.parseInt();
  if(dt == 1){
  	meuServo.write(90);
  	digitalWrite(LED_GREEN, HIGH);
  	digitalWrite(LED_RED, LOW);
    delay(4000);
  }
  else{
  	meuServo.write(0);
  	digitalWrite(LED_GREEN,LOW);
  	digitalWrite(LED_RED, HIGH);
  	delay(500);
  }
}