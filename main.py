import os
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
        return '<Cidade {self.nome}>'

class Posto(Base):
    __tablename__ = 'posto'

    id = Column(Integer, primary_key=True)
    cidade_id = Column(Integer, ForeignKey('cidade.id'))
    latitude = Column(Float)
    longitude = Column(Float)
    created_at = Column(DateTime, default=datetime.now)
    updated_at = Column(DateTime, default=datetime.now, onupdate=datetime.now)
    cidade = relationship('Cidade')

    def __repr__(self):
        return '<Posto {self.nome}>'


def init_db():
    arquivo = 'postos.db'
    if not os.path.isfile(arquivo):
        Base.metadata.create_all(bind=engine)


if __name__ == '__main__':
    init_db()