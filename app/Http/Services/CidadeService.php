<?php

namespace App\Http\Services;

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
     * Pegar um objeto registrado
     *
     * @param int $id número de identificação do objeto
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException quando não encontrar objeto
     * @return \App\Http\Resources\Cidade
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
     * Pegar todos os objetos de registrados
     *
     * @return \App\Http\Resources\Cidade
     */
    public function getAll()
    {
        return CidadeResource::collection(Cidade::all());
    }

    /**
     * Criar um objeto
     *
     * @param array $input lista de pares chave/valor para criar novo objeto
     * @return \App\Http\Resources\Cidade
     */
    public function create($input)
    {
        return new CidadeResource(Cidade::create($input));
    }

    /**
     * Atualizar um objeto
     *
     * @param int $id número de identificação do objeto
     * @param array $input lista de pares chave/valor para atualizar objeto existente
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException quando não encontrar objeto
     * @return \App\Http\Resources\Cidade
     */
    public function update($id, $input)
    {
        try {
            $cidade = Cidade::findOrFail($id);

            foreach ($cidade->getFillable() as $field) {
                if (isset($input[$field])) {
                    $cidade[$field] = $input[$field];
                }
            }

            $cidade->save();

            return new CidadeResource($cidade);
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }

    /**
     * Remover um objeto
     *
     * @param int $id número de identificação do objeto
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException quando não encontrar objeto
     * @return void
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
