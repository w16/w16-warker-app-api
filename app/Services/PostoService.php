<?php

namespace App\Services;

use App\Models\Posto;
use App\Http\Resources\Object as ObjectResource;

class PostoService
{
    /**
     * Pegar uma posto
     *
     * @return \App\Resource\Object
     */
    public function get($id)
    {
        return new ObjectResource(Posto::findOrFail($id));
    }

    /**
     * Pegar todas as postos
     *
     * @return \App\Resource\Object
     */
    public function getAll()
    {
        return ObjectResource::collection(Posto::all());
    }

    /**
     * Criar uma posto
     *
     * @param array $data
     * @return \App\Resource\Object
     */
    public function create($data)
    {
        return new ObjectResource(Posto::create($data));
    }

    /**
     * Alterar uma posto
     *
     * @param int $id
     * @param array $data
     * @return \App\Resource\Object
     */
    public function update($id, $data)
    {
        $posto = Posto::findOrFail($id);

        foreach ($posto->getFillable() as $field) {
            if (isset($data[$field])) {
                $posto[$field] = $data[$field];
            }
        }

        $posto->save();

        return ObjectResource::collection($posto);
    }

    /**
     * Remover uma posto
     *
     * @param int $id
     */
    public function delete($id)
    {
        Posto::findOrFail($id)->delete();
    }
}
