from sqlite3 import Timestamp
from typing import Optional
import ormar
from config import database, metadata

class Cidade(ormar.Model):
  class Meta:
    metadata = metadata
    database = database
    tablename = 'cidades'

  id: int = ormar.Integer(primary_key=True)
  nome_da_cidade: str = ormar.String(max_length=150)
  latitude: float = ormar.Float()
  longitude: float = ormar.Float()
  created_at: Timestamp
  updated_at: Timestamp