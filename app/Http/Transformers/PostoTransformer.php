<?php 

    namespace App\Http\Transformers;

    use App\Models\Posto;

    class PostoTransformer
    {
        /**
         * Create or Update uma instancia de Post
         * 
         * @param Array $input
         * @param Posto $posto (podendo ser nulo)
         * @return Posto
         */
        public static function toInstance(array $input, $posto=null)
        {
            if (empty($posto)) {
                $posto = new Posto();
            }
            foreach ($input as $key=>$val) {
                switch ($key){
                    case 'cidade_id':
                        $posto->cidade_id = $val;
                    break;
                    case 'reservatorio':
                        $posto->reservatorio = $val;
                    break;
                    case 'longitude':
                        $posto->longitude = $val;
                    break;
                    case 'latitude':
                        $posto->latitude = $val;
                    break;
                }
            }
            return $posto;
        }
    }


?>