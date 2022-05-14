<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "cidades";
    protected $fillable = [
        'nome_da_cidade',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y',

    ];
    public function post()
    {
        return $this->hasMany(Post::class, 'cidade_id');
    }
}
