<?php
 
namespace App\Traits;
 
trait CalculatesDistance
{ 
    /**
     * Calcula a distance euclidiana 
     * entre dois pontos unidimensionais
     */
    public function simpleDistance($lat1, $lat2) 
    {
        return $lat1 - $lat2;
    }

    /**
     * Calcula a distance euclidiana 
     * entre dois pontos bidimensionais
     */
    public function simple2dDistance($lat1, $lng1, $lat2, $lng2) 
    {
        return sqrt(($lat1 - $lat2)^2 - ($lng1 - $lng2)^2)
    }
}