<?php

namespace AVENDA\UI;

use AVENDA\Main;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\RemoveEntityPacket;

class DeleteNPC {
	private $owner;
	public function __construct(Main $owner) {
		$this->owner = $owner;
	}
	public function rnpc(Player $player) {
		$pk = new RemoveEntityPacket ();
		$pk->entityUniqueId = $this->eid;
		$player->dataPacket ( $pk );
	}
}
