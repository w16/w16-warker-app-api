from sqlite3 import Timestamp
from fastapi import FastAPI
from pydantic import BaseModel

import ormar

app = FastAPI()

# ! Rota raiz
@app.get('/')
def raix():
  return {'Olá': 'Mundo'}

# * criar model
class Cidades(ormar.Model):
  id: int = ormar.Integer(primary_key=True)
  nome_da_cidade: str = ormar.String(max_length=150)
  latitude: float = ormar.Float()
  longitude: float = ormar.Float()
  created_at: Timestamp
  updated_at: Timestamp

class Postos(ormar.Model):
  id: int = ormar.Integer(primary_key=True)
  cidade_id: int = ormar.Integer(foreign_key=True) #FOREIGN KEY
  reservatorio: int = ormar.Integer() # vai ser representado em porcentagem
  latitude: float = ormar.Float()
  longitude: float = ormar.Float()
  created_at: Timestamp
  updated_at: Timestamp

banco_de_dados = []

@app.post('/cidades')
def add_cidade(cidade: Cidades):
  banco_de_dados.append(cidade)
  return cidade

@app.get('/cidades')
def list_cidades():
  return banco_de_dados