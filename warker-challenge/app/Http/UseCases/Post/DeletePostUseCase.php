<?php

namespace App\Http\UseCases\Post;

use Illuminate\Support\Facades\DB;

class DeletePostUseCase
{
    public function execute(int $id)
    {
        DB::table('postos')->where('id', $id)->delete();
    }
}
