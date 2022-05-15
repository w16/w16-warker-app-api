from fastapi import APIRouter
from models.cidade import Cidade
# ! este arquivo será o nosso controller para cidade, aqui ficará nossos métodos para cidade
# ? nossos métodos serão assícronos
router = APIRouter()

@router.post('/')
async def add_cidade(cidade: Cidade):
  await cidade.save()
  return cidade

@router.get('/')
async def list_cidades():
  return await Cidade.objects.all()