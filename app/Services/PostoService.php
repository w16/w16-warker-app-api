<?php

namespace App\Services;

use App\Http\Resources\Posto as PostoResource;
use App\Models\Posto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostoService
{
    private static function throwNotFound()
    {
        throw new NotFoundHttpException('Não foi possível encontrar o posto especificado');
    }
    /**
     * Pegar um objeto registrado
     *
     * @param int $id número de identificação do objeto
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException quando não encontrar objeto
     * @return \App\Resource\Posto
     */
    public function get($id)
    {
        try {
            return new PostoResource(Posto::findOrFail($id));
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }

    /**
     * Pegar todos os objetos registrados
     *
     * @return \App\Resource\Posto
     */
    public function getAll()
    {
        return PostoResource::collection(Posto::all());
    }

    /**
     * Criar um objeto
     *
     * @param array $input lista de pares chave/valor para criar novo objeto
     * @return \App\Resource\Posto
     */
    public function create($input)
    {
        $cidadeService = new CidadeService();

        $cidade = $cidadeService->get($input['cidade_id']);

        return new PostoResource($cidade->posto()->create($input));
    }

    /**
     * Alterar um objeto
     *
     * @param int $id número de identificação do objeto
     * @param array $input lista de pares chave/valor para atualizar objeto existente
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException quando não encontrar objeto
     * @return \App\Resource\Posto
     */
    public function update($id, $input)
    {
        try {
            $posto = Posto::findOrFail($id);

            foreach ($posto->getFillable() as $field) {
                if (isset($input[$field])) {
                    $posto[$field] = $input[$field];
                }
            }

            $posto->save();

            return new PostoResource($posto);
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }

    /**
     * Remover um objeto
     *
     * @param int $id número de identificação do objeto
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException quando não encontrar objeto
     */
    public function delete($id)
    {
        try {
            Posto::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }
}
