from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker
from sqlalchemy.ext.declarative import declarative_base
import os

engine = create_engine('sqlite:///combustivel.db')

Session = sessionmaker(bind=engine)
session = Session()

Base = declarative_base()

def init_db():
    arquivo = 'combustivel.db'
    if not os.path.isfile(arquivo):
        Base.metadata.create_all(bind=engine)

if __name__ == '__main__':
    init_db()