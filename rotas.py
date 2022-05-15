from fastapi import APIRouter
from controllers import cidades_controllers as cidades, postos_controllers as postos

router = APIRouter()

# * definição das rotas
router.include_router(cidades.router, prefix='/cidades') #rota para cidades
router.include_router(postos.router, prefix='/postos') #rota para postos

