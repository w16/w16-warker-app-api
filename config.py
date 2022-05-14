import databases
import sqlalchemy
import os

#? Aqui neste arquivo ficará a nossa configuração para conecção e teste do Banco de Dados 
DATABASE_URL = os.getenv('DATABASE_URL', 'sqlite:///db.sqlite')
TEST_DATABASE = os.getenv('TEST_DATABASE', 'false') in ('true', 'yes')
database = databases.Database(DATABASE_URL, force_rollback=TEST_DATABASE)
metadata = sqlalchemy.MetaData()