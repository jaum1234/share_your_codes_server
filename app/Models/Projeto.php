<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projeto extends Model
{
    protected $table = 'projetos';
    
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'descricao',
        'cor',
        'linguagem',
        'codigo',
        'curtida',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
