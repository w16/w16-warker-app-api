<?php


namespace App\Services;

use App\Repositories\PostoRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use App\Rules\PostoUnique;

class PostoService
{
    /**
     * @var $postoRepository
     */
    protected $postoRepository;

    /**
     * Construtor PostoService.
     *
     * @param PostoRepository $postoRepository
     */
    public function __construct(PostoRepository $postoRepository)
    {
        $this->postoRepository = $postoRepository;
    }

    /**
     * Deletar posto por id.
     *
     * @param $id
     * @return String
     */
    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->postoRepository->delete($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Não foi possível deletar este posto');
        }

        DB::commit();

        return $result;

    }

    /**
     * Listar todas os postos.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->postoRepository->getAll();
    }

    /**
     * Listar posto por id.
     *
     * @param $id
     * @return String
     */
    public function getById($id)
    {
        return $this->postoRepository->getById($id);
    }

    /**
     * Editar dados do posto
     * Gravar na base se não retornar erros
     *
     * @param array $data
     * @return String
     */
    public function updatePosto($data, $id)
    {
        $validator = Validator::make($data, [
            'cidade_id' => [
                'required',
                'integer'
            ],
            'reservatorio' => [
                'required',
                'integer',
                'min:0',
                'max:100',
                new PostoUnique('postos', $id),
            ],
            'latitude' => [
                'required',
                'numeric',
                new PostoUnique('postos', $id),
            ],
            'longitude' => [
                'required',
                'numeric',
                new PostoUnique('postos', $id),
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $result = $this->postoRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Não foi possível atualizar os dados do posto');
        }

        DB::commit();

        return $result;

    }

    /**
     * Validar dados do posto.
     * Gravar na base se não retornar erros
     *
     * @param array $data
     * @return String
     */
    public function savePosto($data)
    {
        $validator = Validator::make($data, [
            'cidade_id' => [
                'required',
                'integer'
            ],
            'reservatorio' => [
                'required',
                'integer',
                'min:0',
                'max:100',
                new PostoUnique('postos'),
            ],
            'latitude' => [
                'required',
                'numeric',
                new PostoUnique('postos'),
            ],
            'longitude' => [
                'required',
                'numeric',
                new PostoUnique('postos'),
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->postoRepository->save($data);

        return $result;
    }
}
