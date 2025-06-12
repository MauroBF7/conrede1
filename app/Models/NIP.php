<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NIP extends Model
{
    use HasFactory;
    protected $fillable= ['ip','pathpanel','porta','psw','ponto','patrimonio','responsa','divisas_id','secao'];
}
