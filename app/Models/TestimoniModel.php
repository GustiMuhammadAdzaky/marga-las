<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimoniModel extends Model
{
    use HasFactory;
    protected $table = 'tb_testimoni';

    protected $fillable = [
        'id', 'user_id', 'name', 'rate', 'deskripsi',
    ];
}
