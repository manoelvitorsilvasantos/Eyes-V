from typing import Dict, List, Optional
from pydantic import BaseModel, Field


class ZapModel(BaseModel):
    sender: str = Field(max_length=64)
    to: str = Field(max_length=64)
    contents: List[dict]

class ZapRequest(BaseModel):
    name: str
    phone: str
    on_school: bool
