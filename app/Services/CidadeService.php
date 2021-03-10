<?php


namespace App\Services;

use App\Models\Cidade;
use App\Repositories\CidadeRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use App\Rules\CidadeUnique;

class CidadeService
{
    /**
     * @var $cidadeRepository
     */
    protected $cidadeRepository;

    /**
     * Construtor CidadeService.
     *
     * @param CidadeRepository $cidadeRepository
     */
    public function __construct(CidadeRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }

    /**
     * Deletar cidade por id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->cidadeRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Não foi possível deletar esta cidade');
        }

        DB::commit();

        return $result;

    }

    /**
     * Listar todas as cidades.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->cidadeRepository->getAll();
    }

    /**
     * Listar cidade por id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->cidadeRepository->getById($id);
    }

    /**
     * Editar dados da cidade
     * Gravar na base se não retornar erros
     *
     * @param array $data
     * @return String
     */
    public function updateCidade($data, $id)
    {
        $validator = Validator::make($data, [
            'nome_da_cidade' => [
                'required',
                'min:3',
                'string',
                new CidadeUnique('cidades', $id),
            ],
            'latitude' => [
                'required',
                'numeric',
                new CidadeUnique('cidades', $id),
            ],
            'longitude' => [
                'required',
                'numeric',
                new CidadeUnique('cidades', $id),
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $result = $this->cidadeRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Não foi possível atualizar os dados da cidade');
        }

        DB::commit();

        return $result;

    }

    /**
     * Validar dados da cidade.
     * Gravar na base se não retornar erros
     *
     * @param array $data
     * @return String
     */
    public function saveCidade($data)
    {
        $validator = Validator::make($data, [
            'nome_da_cidade' => [
                'required',
                'min:3',
                'string',
                new CidadeUnique('cidades'),
            ],
            'latitude' => [
                'required',
                'numeric',
                new CidadeUnique('cidades'),
            ],
            'longitude' => [
                'required',
                'numeric',
                new CidadeUnique('cidades'),
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->cidadeRepository->save($data);

        return $result;
    }
}
