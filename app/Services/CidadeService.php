<?php

namespace App\Services;

use App\Models\Cidade;
use App\Http\Resources\Entity as EntityResource;

class CidadeService
{
    /**
     * Pegar uma cidade
     *
     * @return \App\Resource\Entity
     */
    public function get($id)
    {
        return new EntityResource(Cidade::findOrFail($id)->load(['postos']));
    }

    /**
     * Pegar todas as cidades
     *
     * @return \App\Resource\Entity
     */
    public function getAll()
    {
        return EntityResource::collection(Cidade::all()->load(['postos']));
    }

    /**
     * Criar uma cidade
     *
     * @param array $data
     * @return \App\Resource\Entity
     */
    public function create($data)
    {
        return new EntityResource(Cidade::create($data)->load(['postos']));
    }

    /**
     * Alterar uma cidade
     *
     * @param int $id
     * @param array $data
     * @return \App\Resource\Entity
     */
    public function update($id, $data)
    {
        $cidade = Cidade::findOrFail($id);

        foreach ($cidade->getFillable() as $field) {
            if (isset($data[$field])) {
                $cidade[$field] = $data[$field];
            }
        }

        $cidade->save();

        return EntityResource::collection($cidade->load(['postos']));
    }

    /**
     * Remover uma cidade
     *
     * @param int $id
     */
    public function delete($id)
    {
        Cidade::findOrFail($id)->delete();
    }
}
