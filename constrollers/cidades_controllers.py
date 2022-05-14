from fastapi import APIRouter
from models.model import Cidades
# ! este arquivo será o nosso controller para cidade, aqui ficará nossos métodos para cidade
# ? nossos métodos serão assícronos
router = APIRouter()

@router.post('/')
async def add_cidade(cidade: Cidades):
  await cidade.save()
  return cidade

@router.get('/')
async def list_cidades():
  return await Cidades.objects.all()