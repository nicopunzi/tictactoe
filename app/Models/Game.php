<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	public $timestamps = false;
	protected $fillable = ['id', 'a1','a2','a3','b1','b2','b3','c1','c2','c3', 'player1', 'player2','name1','name2', 'game_status', 'winner'];
	protected $table = 'game';
}
