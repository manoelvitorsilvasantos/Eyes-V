from twilio.rest import Client

class SendWhatsappApi:
	def __init__(self):
		self.account_sid = 'AC32215330dcd9178564d0b312cffe4531'
		self.auth_token = 'ef133ec7862ed1b0a6cfd24313bd9ec8'
		self.client = Client(self.account_sid, self.auth_token)
	def sendMessage(self,celphone, msg):
		message = self.client.messages.create(
			from_='whatsapp:+14155238886',
			body=f'{msg}',
			to=f'whatsapp:+{celphone}'
		)
		print(message.sid)
