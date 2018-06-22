<?php

namespace AVENDA\UI;

use AVENDA\Main;
use pocketmine\Player;

class DeleteNPCUI {
	private $owner;
	private $player;
	public function __construct(Main $owner, Player $player) {
		$this->owner = $owner;
		$this->player = $player;
	}
	public function lnpc() {
		$array = [ ];
		foreach ( $this->owner->npcdb ["npc"] as $npc => $xyz ) {
			array_push ( $array, [ 
					"text" => "$npc" 
			] );
		}
		$encode = [ 
				"type" => "form",
				"title" => "NPC List",
				"content" => "Check NPC List",
				"buttons" => $array 
		];
		return json_encode ( $encode );
	}
	public function handle($value) {
		$npc = $this->owner->npcdb ["npcdb"];
		foreach ( $npc as $n => $xyz ) {
			$n = explode ( ":", $n );
			$x = $ex [1];
			$y = $ex [2];
			$z = $ex [3];
			$this->player->sendMessage ( $ex [0] . " npc의 위치 " . $x . ":" . $y . ":" . $z );
		}
	}
}
