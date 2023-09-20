from serial import Serial

class MYSerial:

	def __init__(self, port, baud):
		self.port = port
		self.baud = baud
		self.arduino = None

	def load(self):
		while True:
			try:
				self.arduino = Serial(self.port, self.baud)
				print("Conectou com Arduiono")
				break
			except Exception as e:
				print(f"Erro ao conectar: {str(e)}")

	def receive(self, estado):
		if estado == 1:
			self.arduino.write('1'.encode())
		else:
			self.arduino.write('0'.encode())
		self.arduino.flush()

