<?php

namespace AVENDA\UI;

use pocketmine\entity\Entity;

class CreateNPC {
	private $owner;
	private $eid;
	public function __construct(\AVENDA\UI $owner, $x, $y, $z, $lv) {
		$this->owner = $owner;
		$this->x = $x;
		$this->y = $y;
		$this->z = $z;
		$this->eid = Entity::$entityCount ++;
	}
	public function cnpc(\pocketmine\Player $player, $n) {
		$pk = new \pocketmine\network\mcpe\protocol\AddPlayerPacket ();
		$pk->entityRuntimeId = $this->eid;
		$pk->username = $n;
		$name = $pk->username;
		$pk->uuid = \pocketmine\utils\UUID::fromRandom ();
		$pk->item = \pocketmine\item\Item::get ( 0 );
		$pk->position = \pocketmine\math\Vector3;
		$pk->motion = \pocketmine\math\Vector3;
		$pk->metadata = [ 
				Entity::DATA_FLAGS => [ 
						Entity::DATA_TYPE_LONG,
						1 << Entity::DATA_FLAG_ALWAYS_SHOW_NAMETAG ^ 1 << Entity::DATA_FLAG_CAN_SHOW_NAMETAG 
				],
				Entity::DATA_NAMETAG => [ 
						Entity::DATA_TYPE_STRING,
						$name 
				],
				Entity::DATA_LEAD_HOLDER_EID => [ 
						Entity::DATA_TYPE_LONG,
						- 1 
				] 
		];
	}
}