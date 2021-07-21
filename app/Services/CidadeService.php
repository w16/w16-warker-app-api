<?php

namespace App\Http\Services;

use App\Models\Cidade;
use App\Resource\Object as ObjectResource;

class CidadeService
{
    /**
     * Pegar uma cidade
     *
     * @return \App\Resource\Object
     */
    public function get($id)
    {
        return new ObjectResource(Cidade::findOrFail($id)->load(['postos']));
    }

    /**
     * Pegar todas as cidades
     *
     * @return \App\Resource\Object
     */
    public function getAll()
    {
        return ObjectResource::collection(Cidade::all()->load(['postos']));
    }

    /**
     * Criar uma cidade
     *
     * @param array $data
     * @return \App\Resource\Object
     */
    public function create($data)
    {
        return new ObjectResource(Cidade::create($data)->load(['postos']));
    }

    /**
     * Alterar uma cidade
     *
     * @param int $id
     * @param array $data
     * @return \App\Resource\Object
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

        return ObjectResource::collection($cidade->load(['postos']));
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
