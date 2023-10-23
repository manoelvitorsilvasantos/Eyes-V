from twilio.rest import Client
from time import sleep

class App:
	def __init__(self):
		self.account_sid = '<ACCOUNT_SID>'
		self.auth_token = '<AUTH_TOKEN>'
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
