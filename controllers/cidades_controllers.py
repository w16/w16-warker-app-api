from fastapi import status
from fastapi import APIRouter
from fastapi import Response
import ormar

from models.cidade import Cidade
# ! este arquivo será o nosso controller para cidade, aqui ficará nossos métodos para cidade
# ? nossos métodos serão assícronos
router = APIRouter()

# * método post
@router.post('/')
async def add_cidade(cidade: Cidade):
  await cidade.save()
  return cidade

# * método get all
@router.get('/')
async def list_cidades():
  return await Cidade.objects.all()

# * método put by id
@router.put('/{cidade_id}')
async def update_cidade(cidade: Cidade):
  await cidade.update()
  return cidade

# * método delete by id
@router.delete('/{cidade_id}')
async def delete_cidade(cidade_id: int, response: Response):
  try:
    cidade = await Cidade.objects.get(id=cidade_id)
    return await cidade.delete()
  except ormar.exceptions.NoMatch:
    response.status_code = status.HTTP_404_NOT_FOUND
    return {'message': 'Cidade não encontrada'}