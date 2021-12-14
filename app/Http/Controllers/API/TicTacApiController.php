<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class TicTacApiController extends Controller
{ 
    /**
    * create a new
    */
	public function new_game( Request $game )
	{
        $validator = Validator::make($game->all(), [
            'namefirst' => 'required',
            'namesecond' => 'required',
        ]);

        /* return response if general validation fails */
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->all() as $key => $value) {
                Arr::set($errors, $key, $value);
            }
            return response()->json([
                "code" => 400,
                "message" => $errors,
            ]);
        }
        $game["name1"] = $game->namefirst;
        $game["name2"] = $game->namesecond;
        $game["player1"] = 1;
		$game["player2"] = 0;
        
		$new_game = Game::create($game->all() );
		return response()->json( $new_game, 201 );
	}
    
   	/**
	 * play to move.
	 */
	public function play_move( Request $request, Game $game )
	{
		$is_finish = $this->is_finish( $game );
		if ( $is_finish == true) {
			return response()->json( "Game already finish", 300 );
		}
        Log::info("ccococ");
       
		$correct_place = $this->check_if_correct( $request, $game );
		if ( $correct_place != true ) {
			return response()->json( "Unknown Request or Wrong Place", 300 );
		} else {
			$request = $this->switch_player( $request, $game );
			$game->update( $request->all() );
			$result = $this->check_win( $request, $game );
       
			if ( $result === false ) {
				return response()->json( $game, 200 );
			} else {
				$request["game_status"] = "finish";
                if($result==='X'){
                    $request['winner'] = $game['name1'];
                }else{
                    $request['winner'] = $game['name2'];
                }
			
				$game->update( $request->all());
				return response()->json( $request['winner'] . " " . "Won the game", 200 );
			}

		}

	}

	/**
	 * check to test if the request is correct
	 */
    public function check_if_correct( Request $request, Game $game ) {
		$places = ['id', 'a1','a2','a3','b1','b2','b3','c1','c2','c3'];
       
		foreach ( $places as $place) {
  
			if ( $game['player1'] == 1 && empty( $game[$place] ) && $request[$place] == "X") {
				return true;
			}
			if ( $game['player2'] == 1 && empty( $game[$place] ) && $request[$place] == "O") {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check turn of player and switch
	 */
    
    public function switch_player( Request $request, Game $game ) {
 
		if ( $game['player1'] == 1 ){
				$game['player1'] = 0;
				$game['player2'] = 1;
			} else {
				$game['player1'] = 1;
				$game['player2'] = 0;
			}

		return $request;
	}
    public function is_finish ( Game $game ) {
		foreach ( $game as $column ) {
			if ( !empty($column) ) {
				$game["game_status"] == "finish";
				$request['winner'] = "draw";
			}
		}
		if ( $game["game_status"] == "finish" ) {
			return true;
		} else {
			return false;
		}
	}

	
    public function check_win( Request $request, Game $game ) {
		// win cases
		// 	[a1, a2, a3], 
		// 	[b1, b2, b3], 
		// 	[c1, c2, c3], 
		// 	[a1, b1, c1], 
		// 	[a2, b2, c2], 
		// 	[a3, b3, c3],  
		// 	[a1, b2, c3], 
		// 	[a3, b2, c1] 

		if ( $game["a1"] == $game["a2"] && $game["a2"] == $game["a3"] &&
		!empty ( $game["a1"] ) && !empty ( $game["a2"] ) && !empty ( $game["a3"] ) ) {
			return  $game["a1"] ;
		} else if ( $game["b1"] == $game["b2"] &&  $game["b2"] == $game["b3"] &&
		!empty ( $game["b1"] ) && !empty ( $game["b2"] ) && !empty ( $game["b3"] )
		) {
			return $game["b1"];
		} else if ( $game["c1"] == $game["c2"] &&  $game["c2"] == $game["c3"] &&
		!empty ( $game["c1"] ) && !empty ( $game["c2"] ) && !empty ( $game["c3"] )
		 ) {
			return $game["c1"];
		} else if ( $game["a1"] == $game["b1"] &&  $game["b1"] == $game["c1"] &&
		!empty ( $game["a1"] ) && !empty ( $game["b1"] ) && !empty ( $game["c1"] )
		) {
			return $game["a1"];
		} else if ( $game["a2"] == $game["b2"] &&  $game["b2"] == $game["c2"] &&
		!empty ( $game["a2"] ) && !empty ( $game["b2"] ) && !empty ( $game["c2"] )
		) {
			return $game["a2"];
		} else if ( $game["a3"] == $game["b3"] &&  $game["b3"] == $game["c3"] &&
		!empty ( $game["a3"] ) && !empty ( $game["b3"] ) && !empty ( $game["c3"] )
		) {
			return $game["a3"];
		} else if ( $game["a1"] == $game["b2"] &&  $game["b2"] == $game["c3"] &&
		!empty ( $game["a1"] ) && !empty ( $game["b2"] ) && !empty ( $game["c3"] )
		) {
			return $game["a1"];
		} else if ( $game["a3"] == $game["b2"] &&  $game["b2"] == $game["c1"] &&
		!empty ( $game["a3"] ) && !empty ( $game["b2"] ) && !empty ( $game["c1"] )
		) {
			return $game["a3"];
		} else {
			return false;
		}
	}

}
