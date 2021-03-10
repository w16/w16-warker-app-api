<?php


namespace App\Repositories;

use App\Models\Cidade;
use App\Http\Resources\CidadeCollection;

class CidadeRepository
{
    /**
     * @var Cidade
     */
    protected $cidade;

    /**
     * Construtor CidadeRepository.
     *
     * @param Cidade $cidade
     */
    public function __construct(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * Listar todas as cidades.
     *
     * @return Cidade $cidade
     */
    public function getAll()
    {
        return CidadeCollection::collection($this->cidade->all());
    }

    /**
     * Listar cidade por id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return new CidadeCollection($this->cidade->find($id));
    }

    /**
     * Salvar Cidade
     *
     * @param $data
     * @return Cidade
     */
    public function save($data)
    {
        $cidade = new $this->cidade;

        $cidade->nome_da_cidade = $data['nome_da_cidade'];
        $cidade->latitude = $data['latitude'];
        $cidade->longitude = $data['longitude'];

        $cidade->save();

        return new CidadeCollection($cidade->fresh());
    }

    /**
     * Editar Cidade
     *
     * @param $data
     * @return Cidade
     */
    public function update($data, $id)
    {

        $cidade = $this->cidade->find($id);

        $cidade->nome_da_cidade = $data['nome_da_cidade'];
        $cidade->latitude = $data['latitude'];
        $cidade->longitude = $data['longitude'];

        $cidade->update();

        return new CidadeCollection($cidade->fresh());
    }

    /**
     * Deletar Cidade
     *
     * @param $data
     * @return Cidade
     */
    public function delete($id)
    {

        $cidade = $this->cidade->findOrFail($id);
        $cidade->delete();

        return new CidadeCollection($cidade);
    }
}
