<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    protected $table = "vagas";

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function categoria(){

        return $this->hasMany(CategoriaVagas::class, 'fk_categoria');
    }

}
