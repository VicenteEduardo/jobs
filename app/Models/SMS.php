<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SMS extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    protected $table = "sms";
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

}
