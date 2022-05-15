import sqlalchemy

# ! ESTÁ NÃO É A FORMA CORRETA DE SE CODAR EM PRODUÇÃO, ESTOU USANDO ESTE MÉTODO PARA ESTE PROJETO PARA AGILIZAR

from config import DATABASE_URL, metadata
from models.cidade import Cidade
from models.posto import Posto

def configurar_banco(database_url = DATABASE_URL):
  engine = sqlalchemy.create_engine(database_url)
  metadata.drop_all(engine)
  metadata.create_all(engine)

if __name__ == '__main__':
  configurar_banco()