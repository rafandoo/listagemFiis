<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fiis extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'codigo', 'v_atual', 'v_min', 'v_max', 'valorizacao'];
}
