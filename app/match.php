<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class match extends Model
{
    protected $fillable = ['teamblauw_player1', 'teamblauw_player2', 'teamrood_player1', 'teamrood_player2', 'score_blauw', 'score_rood'];
}
