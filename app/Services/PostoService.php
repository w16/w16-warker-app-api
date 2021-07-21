<?php

namespace App\Services;

use App\Models\Posto;
use App\Http\Resources\Entity as EntityResource;

class PostoService
{
    /**
     * Pegar uma posto
     *
     * @return \App\Resource\Entity
     */
    public function get($id)
    {
        return new EntityResource(Posto::findOrFail($id));
    }

    /**
     * Pegar todas as postos
     *
     * @return \App\Resource\Entity
     */
    public function getAll()
    {
        return EntityResource::collection(Posto::all());
    }

    /**
     * Criar uma posto
     *
     * @param array $data
     * @return \App\Resource\Entity
     */
    public function create($data)
    {
        return new EntityResource(Posto::create($data));
    }

    /**
     * Alterar uma posto
     *
     * @param int $id
     * @param array $data
     * @return \App\Resource\Entity
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

        return EntityResource::collection($posto);
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
