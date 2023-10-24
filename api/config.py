import os
from dotenv import load_dotenv

load_dotenv()

class Twilio(object):
    TWILIO_ACCOUNT_SID = os.getenv('TWILIO_ACCOUNT_SID')
    TOKEN = os.getenv('AUTH_TOKEN')