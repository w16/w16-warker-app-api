from fastapi import APIRouter
from models.model import Postos

# ! este arquivo será o nosso controller para posto, aqui ficará nossos métodos para postos
# ? nossos métodos serão assícronos

router = APIRouter()

@router.post('/')
async def add_posto(posto: Postos):
  await posto.save()
  return posto


@router.get('/')
async def list_postos():
  return await Postos.objects.all()