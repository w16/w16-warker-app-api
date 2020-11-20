<?php 

    namespace App\Http\Transformers;

    use App\Models\Cidade;

    class CidadeTransformer
    {
        /**
         * Create or Update uma instancia de Cidade
         * 
         * @param Array $input
         * @param Cidade $cidade (podendo ser nulo)
         * @return Cidade
         */
        public static function toInstance(array $input, $cidade=null)
        {
            if (empty($cidade)) {
                $cidade = new Cidade();
            }
            foreach ($input as $key=>$val) {
                switch ($key){
                    case 'nome_da_cidade':
                        $cidade->nome_da_cidade = $val;
                    break;
                    case 'longitude':
                        $cidade->longitude = $val;
                    break;
                    case 'latitude':
                        $cidade->latitude = $val;
                    break;
                }
            }
            return $cidade;
        }
    }


?>