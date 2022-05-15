from fastapi import HTTPException
from fastapi import status
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

@router.put('/{cidade_id}')
async def update_cidade(cidade_id: int, cidade: Cidade):
  if cidade_id in Cidade.objects.all():
    Cidade.objects[cidade_id] = cidade
    return await cidade
  else:
    raise HTTPException(
      status_code=status.HTTP_404_NOT_FOUND,
      detail=f'Não existe cidade com ID: {cidade_id}'
    )