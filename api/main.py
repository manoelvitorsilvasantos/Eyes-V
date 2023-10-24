from datetime import datetime
import json
from fastapi import FastAPI, Request
import httpx
import aiohttp

import os
from twilio.rest import Client

from zap.schemas import ZapModel, ZapRequest
from zap.zap import Student
from config import Twilio


app = FastAPI()


@app.post("/send_message")
async def send_message(data: ZapRequest):
    """
        student_name: str
        phone: str
        on_school: bool
    """
    now = datetime.now()
    now_formatted = now.strftime("%d/%m/%Y %H:%M")

    status = "saiu da" if data.on_school else "entrou na"
    _message = f"(Nao Responda) Às {now_formatted} o aluno {data.name} {status} escola."

    try:
        client = Client(Twilio.TWILIO_ACCOUNT_SID, Twilio.TOKEN)

        message = client.messages.create(
            from_='whatsapp:+14155238886',
            body=_message,
            to=f'whatsapp:{data.phone}'
        )
    except Exception as error:
        return {"error": error}, 500

    return {"message": f"mensagem enviada com sucesso para {data.phone}"}
