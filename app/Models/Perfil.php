<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    protected $table = "dados_perfil";
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];


}
