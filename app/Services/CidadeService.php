<?php

namespace App\Services;

use App\Http\Resources\Cidade as CidadeResource;
use App\Models\Cidade;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CidadeService
{
    private static function throwNotFound()
    {
        throw new NotFoundHttpException('Não foi possível encontrar a cidade especificada');
    }

    /**
     * Pegar uma cidade
     *
     * @return \App\Resource\Entity
     */
    public function get($id)
    {
        try {
            return new CidadeResource(Cidade::findOrFail($id));
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }

    /**
     * Pegar todas as cidades
     *
     * @return \App\Resource\Entity
     */
    public function getAll()
    {
        return CidadeResource::collection(Cidade::all());
    }

    /**
     * Criar uma cidade
     *
     * @param array $data
     * @return \App\Resource\Entity
     */
    public function create($data)
    {
        return new CidadeResource(Cidade::create($data));
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
        try {
            $cidade = Cidade::findOrFail($id);

            foreach ($cidade->getFillable() as $field) {
                if (isset($data[$field])) {
                    $cidade[$field] = $data[$field];
                }
            }

            $cidade->save();

            return new CidadeResource($cidade);
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }

    /**
     * Remover uma cidade
     *
     * @param int $id
     */
    public function delete($id)
    {
        try {
            Cidade::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }
}
