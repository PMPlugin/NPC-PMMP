<?php

namespace AVENDA\UI;

class DeleteNPC {
	private $owner;
	public function __construct(\AVENDA\Main $owner) {
		$this->owner = $owner;
	}
	public function rnpc(\pocketmine\Player $player) {
		$pk = new \pocketmine\network\mcpe\protocol\RemoveEntityPacket ();
		$pk->entityUniqueId = $this->eid;
		$player->dataPacket ( $pk );
	}
}