from fastapi import APIRouter
from fastapi import status
from fastapi import Response
import ormar

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

# * método put by id


@router.put('/{posto_id}')
async def update_posto(posto: Posto):
    await posto.update()
    return posto

# * método delete by id


@router.delete('/{posto_id}')
async def delete_posto(posto_id: int, response: Response):
    try:
        posto = await Posto.objects.get(id=posto_id)
        return await posto.delete()
    except ormar.exceptions.NoMatch:
        response.status_code = status.HTTP_404_NOT_FOUND
        return {'message': 'Posto não encontrada'}
