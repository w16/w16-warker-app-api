from fastapi import HTTPException
from fastapi import status
from fastapi import APIRouter
from fastapi import Response

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

@router.put('/{cidade_id}')
async def update_cidade(cidade: Cidade):
  await cidade.update()
  return cidade

@router.delete('/{cidade_id}')
async def delete_cidade(cidade_id: int, cidade: Cidade):
  await cidade.delete()
  return Response(
    status_code=status.HTTP_204_NO_CONTENT
    )