<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtmModel extends Model
{
    use HasFactory;
    protected $table = 'tb_atm';
    protected $fillable = [
        'id',
        "no_rek",
    ];
    public $timestamps = false;
}
