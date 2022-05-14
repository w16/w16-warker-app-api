from sqlite3 import Timestamp
from fastapi import FastAPI
from pydantic import BaseModel

app = FastAPI()

# ! Rota raiz
@app.get('/')
def raix():
  return {'Olá': 'Mundo'}

# * criar model
class Cidades(BaseModel):
  id: int
  nome_da_cidade: str
  latitude: float
  longitude: float
  created_at: Timestamp
  updated_at: Timestamp

class Postos():
  id: int
  cidade_id: int() #FOREIGN KEY
  reservatorio: int # vai ser representado em porcentagem
  latitude: float
  longitude: float
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