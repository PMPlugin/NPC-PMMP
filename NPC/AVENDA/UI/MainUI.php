<?php

namespace AVENDA\UI;

class MainUI {
	private $owner;
	public function __construct(\AVENDA\UI $owner, \pocketmine\Player $player) {
		$this->owner = $owner;
		$this->player = $player;
	}
	public function mui() {
		$encode = [ 
				"type" => "form",
				"title" => "Let's Create NPC",
				"content" => "Choose Botton",
				"buttons" => [ 
						"text" => "Create NPC" 
				],
				[ 
						"text" => "NPC List" 
				],
				[ 
						"text" => "Delete NPC" 
				] 
		];
		return json_encode ( $encode );
	}
	public function handle($value) {
		if ($value == 0) {
		} else if ($value == 1) {
		} else if ($value == 2) {
		}
	}
	public function cnpc(\pocketmine\Player $player) {
		$cn = new \AVENDA\UI\CreateNPC ( $this->owner, $x, $y, $z, $lv );
		$cn->cnpc ( $player, $n ); // $n = npc namae
	}
}