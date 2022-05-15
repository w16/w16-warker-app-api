from fastapi import APIRouter
from models.posto import Posto

# ! este arquivo será o nosso controller para posto, aqui ficará nossos métodos para postos
# ? nossos métodos serão assícronos

router = APIRouter()

@router.post('/')
async def add_posto(posto: Posto):
  await posto.save()
  return posto


@router.get('/')
async def list_postos():
  return await Posto.objects.all()