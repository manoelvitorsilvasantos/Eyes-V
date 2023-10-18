from twilio.rest import Client
from time import sleep

class App:
	def __init__(self):
		self.account_sid = 'AC32215330dcd9178564d0b312cffe4531'
		self.auth_token = '28d5285f9ba6d7b99fae4058e12792a9'
	def sendMessage(self, your_number, your_message):
		client = Client(self.account_sid, self.auth_token)
		msg = f'{your_message}'
		cel = f'whatsapp:+{your_number}'
		message = client.messages.create(
			from_='whatsapp:+14155238886',
			body=msg,
			to=cel
		)
		print(message.sid)