<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidaturas extends Model
{
    use HasFactory;
    protected $table = "candidaturas";

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
















    
    public function canditados(){

        return $this->belongsTo(User::class, 'fk_cliente');
    }
    public function empresas(){

        return $this->belongsTo(Vaga::class, 'fk_vaga');
    }

}
