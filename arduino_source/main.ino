
const int LED_RED = 9;
const int LED_GREEN = 8;
int dt = 0;

void setup()
{
  Serial.begin(9600);
  pinMode(LED_RED, OUTPUT);
  pinMode(LED_GREEN, OUTPUT);
  digitalWrite(LED_GREEN, LOW);
  digitalWrite(LED_RED, LOW);
}

void loop()
{
  dt = Serial.parseInt();
  if(dt == 1){
  	digitalWrite(LED_GREEN, HIGH);
  	digitalWrite(LED_RED, LOW);
    delay(3500);
  }
  else{
  	digitalWrite(LED_GREEN,LOW);
  	digitalWrite(LED_RED, HIGH);
  	delay(1000);
  }
}