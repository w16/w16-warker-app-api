from datetime import datetime
from sqlite3 import Timestamp
from typing import Optional
import ormar
from config import database, metadata

from models.cidade import Cidade

class Posto(ormar.Model):
  class Meta:
    metadata = metadata
    database = database
    tablename = 'postos'

  id: int = ormar.Integer(primary_key=True)
  reservatorio: int = ormar.Integer() # vai ser representado em porcentagem
  latitude: float = ormar.Float()
  longitude: float = ormar.Float()
  # created_at: Timestamp = ormar.DateTime(timezone=True)
  # updated_at: Timestamp = ormar.DateTime(timezone=True)
  cidade_id: int = ormar.ForeignKey(Cidade) #FOREIGN KEY