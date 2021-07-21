<?php

namespace App\Services;

use App\Http\Resources\Posto as PostoResource;
use App\Models\Posto;

class PostoService
{
    /**
     * Pegar uma posto
     *
     * @return \App\Resource\Posto
     */
    public function get($id)
    {
        return new PostoResource(Posto::findOrFail($id));
    }

    /**
     * Pegar todas as postos
     *
     * @return \App\Resource\Posto
     */
    public function getAll()
    {
        return PostoResource::collection(Posto::all());
    }

    /**
     * Criar uma posto
     *
     * @param array $data
     * @return \App\Resource\Posto
     */
    public function create($data)
    {
        return new PostoResource(Posto::create($data));
    }

    /**
     * Alterar uma posto
     *
     * @param int $id
     * @param array $data
     * @return \App\Resource\Posto
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

        return PostoResource::collection($posto);
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
