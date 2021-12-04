<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Resources\Json\JsonResource;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projetos';
    
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'descricao',
        'cor',
        'codigo',
        'curtida',
        'user_id'
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
