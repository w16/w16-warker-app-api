<?php


namespace App\Repositories;

use App\Models\Posto;
use App\Http\Resources\PostoCollection;

class PostoRepository
{
    /**
     * @var Posto
     */
    protected $posto;

    /**
     * Construtor PostoRepository.
     *
     * @param Posto $posto
     */
    public function __construct(Posto $posto)
    {
        $this->posto = $posto;
    }

    /**
     * Listar todos os postos.
     *
     * @return Posto $posto
     */
    public function getAll()
    {
        return PostoCollection::collection($this->posto->all());
    }

    /**
     * Listar posto por id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return new PostoCollection($this->posto->find($id));
    }

    /**
     * Salvar Posto
     *
     * @param $data
     * @return Posto
     */
    public function save($data)
    {
        $posto = new $this->posto;

        $posto->cidade_id = $data['cidade_id'];
        $posto->reservatorio = $data['reservatorio'];
        $posto->latitude = $data['latitude'];
        $posto->longitude = $data['longitude'];

        $posto->save();

        return new PostoCollection($posto->fresh());
    }

    /**
     * Editar Posto
     *
     * @param $data
     * @return Posto
     */
    public function update($data, $id)
    {

        $posto = $this->posto->find($id);

        $posto->cidade_id = $data['cidade_id'];
        $posto->reservatorio = $data['reservatorio'];
        $posto->latitude = $data['latitude'];
        $posto->longitude = $data['longitude'];

        $posto->update();

        return new PostoCollection($posto->fresh());
    }

    /**
     * Deletar Posto
     *
     * @param $data
     * @return Posto
     */
    public function delete($id)
    {

        $posto = $this->posto->findOrFail($id);
        $posto->delete();

        return new PostoCollection($posto);
    }
}
