import os
from fastapi import FastAPI
from datetime import datetime
from sqlalchemy import create_engine, Column, ForeignKey
from sqlalchemy import Integer, Float, String, DateTime
from sqlalchemy.orm import sessionmaker, relationship
from sqlalchemy.ext.declarative import declarative_base


engine = create_engine('sqlite:///postos.db', echo=True)

Session = sessionmaker(bind=engine)
session = Session()


Base = declarative_base()

class Cidade(Base):
    __tablename__ = 'cidade'

    id = Column(Integer, primary_key=True)
    nome_da_cidade = Column(String(40), index=True)
    latitude = Column(Float)
    longitude = Column(Float)
    created_at = Column(DateTime, default=datetime.now)
    updated_at = Column(DateTime, default=datetime.now, onupdate=datetime.now)

    def __repr__(self):
        return '{<Cidade {self.nome}>}'

class Posto(Base):
    __tablename__ = 'posto'

    id = Column(Integer, primary_key=True)
    cidade_id = Column(Integer, ForeignKey('cidade.id'))
    reservatorio = Column(Integer)
    latitude = Column(Float)
    longitude = Column(Float)
    created_at = Column(DateTime, default=datetime.now)
    updated_at = Column(DateTime, default=datetime.now, onupdate=datetime.now)
    cidade = relationship('Cidade')

    def __repr__(self):
        return '<Posto {self.nome}>'


app = FastAPI()
'''
def pegar_postos(id_cidade: int):
    query2 = session.query(Posto).filter_by(cidade_id=id_cidade)   
    postos = query2.all()
    
    for p in postos:

'''
@app.get("/api/cidade/{id_cidade}")
async def get_cidade(id_cidade: int):
    query = session.query(Cidade).filter_by(id=id_cidade)    
    query2 = session.query(Posto).filter_by(cidade_id=id_cidade)   
    postos = query2.all()
    cidade = query.first()
    
    if query.count() > 0:        
        value = { 
            "id" : cidade.id,
            "cidade" : cidade.nome_da_cidade,
            "coords" : {
                "latitude" : cidade.latitude,
                "longitude" : cidade.longitude
            },
            "postos" : query2.all()
        }
        return value#json.dumps(value)
    return {"Mensagem" : "Cidade não encontrada!"}

@app.get("/api/posto/{id_posto}")
async def get_posto(id_posto: int):
    query = session.query(Posto).filter_by(id=id_posto)    
    posto = query.first()
    if query.count() > 0:
        value = { 
            "id" : posto.id,
            "reservatorio" : posto.reservatorio,
            "coords" : {
                "latitude" : posto.latitude,
                "longitude" : posto.longitude
            },
            "created_at": posto.created_at,
            "updated_at": posto.updated_at,
        }
        return value
    return {"Mensagem" : "Posto não encontrado!"}


@app.post("/api/cidade")
async def insere_cidade(id2: int, 
                        nome_da_cidade2: str,                         
                        latitude2: float, 
                        longitude2: float, 
                        created_at2: datetime,                         
                        updated_at2: datetime
                        ):
    cidade = Cidade(id = id2, 
                    nome_da_cidade = nome_da_cidade2,                     
                    latitude = latitude2, 
                    longitude = longitude2, 
                    created_at = created_at2, 
                    updated_at = updated_at2
                    )
    session.add(cidade)
    session.commit()        
    return cidade

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

def init_db():
    Base.metadata.create_all(bind=engine)

if __name__ == '__main__':
    arquivo = 'postos.db'
    if not os.path.isfile(arquivo):
        init_db()