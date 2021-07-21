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
     * Pegar uma posto
     *
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
        $cidadeService = new CidadeService();

        $cidade = $cidadeService->get($data['cidade_id']);

        return new PostoResource($cidade->posto()->create($data));
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
        try {
            $posto = Posto::findOrFail($id);

            foreach ($posto->getFillable() as $field) {
                if (isset($data[$field])) {
                    $posto[$field] = $data[$field];
                }
            }

            $posto->save();

            return new PostoResource($posto);
        } catch (ModelNotFoundException $e) {
            $this->throwNotFound();
        }
    }

    /**
     * Remover uma posto
     *
     * @param int $id
     */
    public function delete($id)
    {
        try {
            Posto::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            return response(['error' => $e->getMessage()], 404);
        }
    }
}
