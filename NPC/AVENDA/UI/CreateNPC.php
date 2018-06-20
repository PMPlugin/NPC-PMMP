<?php

namespace AVENDA\UI;

use pocketmine;

class CreateNPC {
	private $owner;
	public function __construct(\AVENDA\UI $owner, $x, $y, $z, $lv) {
		$this->owner = $owner;
		$this->x = $x;
		$this->y = $y;
		$this->z = $z;
	}
	public function cnpc(\pocketmine\Player $player) {
		$pk = new \pocketmine\network\mcpe\protocol\AddPlayerPacket ();
		$pk->entityRuntimeId = \pocketmine\entity\Entity::$entityCount ++;
		$pk->username = "";
		$pk->uuid = \pocketmine\utils\UUID::fromRandom ();
		$pk->item = \pocketmine\item\Item::get ( 0 );
		$pk->position = \pocketmine;
		$pk->motion = 1; // 벡터3;
		$pk->metadata = [ ];
	}
}