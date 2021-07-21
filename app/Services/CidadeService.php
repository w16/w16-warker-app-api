<?php

namespace App\Services;

use App\Http\Resources\Cidade as CidadeResource;
use App\Models\Cidade;

class CidadeService
{
    /**
     * Pegar uma cidade
     *
     * @return \App\Resource\Entity
     */
    public function get($id)
    {
        return new CidadeResource(Cidade::findOrFail($id)->load(['postos']));
    }

    /**
     * Pegar todas as cidades
     *
     * @return \App\Resource\Entity
     */
    public function getAll()
    {
        return CidadeResource::collection(Cidade::all()->load(['postos']));
    }

    /**
     * Criar uma cidade
     *
     * @param array $data
     * @return \App\Resource\Entity
     */
    public function create($data)
    {
        return new CidadeResource(Cidade::create($data)->load(['postos']));
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

        return CidadeResource::collection($cidade->load(['postos']));
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
