#from utils.twilio import App
from twilio.rest import Client

account_sid = 'AC32215330dcd9178564d0b312cffe4531'
auth_token = '28d5285f9ba6d7b99fae4058e12792a9'
client = Client(account_sid, auth_token)

message = client.messages.create(
  from_='whatsapp:+14155238886', 
  body='My name is Brendy, How are your?', # your message
  to='whatsapp:+557499729815' # MEU NUMERO
)

print(message.sid)

#if __name__=="__main__":
#	app = App()
#	app.sendMessage('557499729815', "Hello viktor")