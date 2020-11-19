<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    public function equipes1() {
        return $this->belongsToMany(Equipe::class ,'matches', 'equipe_locaux_id','equipe_visiteurs_id');

    }
    public function equipes2() {
        return $this->belongsToMany(Equipe::class ,'matches', 'equipe_visiteurs_id','equipe_locaux_id');

    }
}
