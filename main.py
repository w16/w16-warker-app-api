# Imports
import os
from fastapi import FastAPI
from datetime import datetime
from sqlalchemy import create_engine, Column, ForeignKey
from sqlalchemy import Integer, Float, String, DateTime
from sqlalchemy.orm import sessionmaker, relationship
from sqlalchemy.ext.declarative import declarative_base

# Cria uma Engine, que a sessão usará para recursos de conexão
engine = create_engine('sqlite:///postos.db', echo=True)

# Cria uma classe "Session" configurada
Session = sessionmaker(bind=engine)

# Cria um sessão
session = Session()

# Cria objeto para mapear tabelas do BD com classes do arquivo
Base = declarative_base()

# Cria classe Cidade, que herda de Base, e indica como será a 
# tabela correspondente no banco de dados
class Cidade(Base):
    __tablename__ = 'cidade'

    id = Column(Integer, primary_key=True)
    nome_da_cidade = Column(String(40), index=True)
    latitude = Column(Float)
    longitude = Column(Float)
    created_at = Column(DateTime)
    updated_at = Column(DateTime)

    def __repr__(self):
        return '{<Cidade {self.nome}>}'

# Cria classe Posto, que herda de Base, e indica como será a 
# tabela correspondente no banco de dados
class Posto(Base):
    __tablename__ = 'posto'

    id = Column(Integer, primary_key=True)
    cidade_id = Column(Integer, ForeignKey('cidade.id'))
    reservatorio = Column(Integer)
    latitude = Column(Float)
    longitude = Column(Float)
    created_at = Column(DateTime)
    updated_at = Column(DateTime)
    cidade = relationship('Cidade')

    def __repr__(self):
        return '{<Posto {self.nome}>}'

# Cria a aplicação
app = FastAPI()

# Cria rota para o método get e define função para ler cidades
@app.get("/api/cidade/{id_cidade}")
async def get_cidade(id_cidade: int):
    query = session.query(Cidade).filter_by(id=id_cidade)
    cidade = session.query(Cidade).filter_by(id=id_cidade).first()
    postos = session.query(Posto).filter_by(cidade_id=id_cidade).all()          
    if query.count() > 0:        
        return { 
            "id" : cidade.id,
            "cidade" : cidade.nome_da_cidade,
            "coords" : {
                "latitude" : cidade.latitude,
                "longitude" : cidade.longitude
            },
            "postos" : postos,
            "created_at": cidade.created_at,
            "updated_at": cidade.updated_at,
        }        
    return {"Mensagem" : "Cidade não encontrada!"}

# Cria rota para o método get e define função para ler postos
@app.get("/api/posto/{id_posto}")
async def get_posto(id_posto: int):
    query = session.query(Posto).filter_by(id=id_posto)    
    posto = query.first()
    if query.count() > 0:
        return { 
            "id" : posto.id,
            "reservatorio" : posto.reservatorio,
            "coords" : {
                "latitude" : posto.latitude,
                "longitude" : posto.longitude
            },
            "created_at": posto.created_at,
            "updated_at": posto.updated_at,
        }        
    return {"Mensagem" : "Posto não encontrado!"}

# Cria rota para o método get e define função para criar cidades
@app.post("/api/cidade")
async def insere_cidade(id2: int, 
                        nome_da_cidade2: str, 
                        latitude2: float, 
                        longitude2: float, 
                        created_at2: datetime,                         
                        updated_at2: datetime):
    cidade = Cidade(id = id2, 
                    nome_da_cidade = nome_da_cidade2,                     
                    latitude = latitude2, 
                    longitude = longitude2, 
                    created_at = created_at2, 
                    updated_at = updated_at2)
    session.add(cidade)
    session.commit()        
    return cidade

# Cria rota para o método post e define função para criar cidades
@app.post("/api/posto")
async def insere_posto(id2: int, 
                       cidade_id2: int, 
                       reservatorio2: int,
                       latitude2: float, 
                       longitude2: float, 
                       created_at2: datetime, 
                       updated_at2: datetime
                       ):
    cidade = Posto(id = id2, 
                    cidade_id = cidade_id2, 
                    reservatorio = reservatorio2,
                    latitude = latitude2, 
                    longitude = longitude2, 
                    created_at = created_at2, 
                    updated_at = updated_at2
                    )
    session.add(cidade)
    session.commit()        
    return cidade

# Criar o banco de dados
def init_db():
    Base.metadata.create_all(bind=engine)

# Método principal (executado apenas para criar o BD)
if __name__ == '__main__':
    arquivo = 'postos.db'
    if not os.path.isfile(arquivo):
        init_db()