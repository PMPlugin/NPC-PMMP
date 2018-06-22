<?php

namespace AVENDA;

class Main extends \pocketmine\plugin\PluginBase implements \pocketmine\event\Listener {
	public $setting;
	public $sdb;
	public $npc;
	public $npcdb;
	public function onEnable() {
		@mkdir ( $this->getDataFolder () );
		$this->setting = new \pocketmine\utils\Config ( $this->getDataFolder () . "setting.yml", Config::YAML );
		$this->sdb = $this->setting->getAll ();
		$this->npc = new \pocketmine\utils\Config ( $this->getDataFolder () . "npc.yml", Config::YAML );
		$this->npcdb = $this->npc->getAll ();
		$this->getServer ()->getPluginManager ()->registerEvents ( $this, $this );
	}
	public function open(\pocketmine\event\player\PlayerInteractEvent $event) {
		$player = $event->getPlayer ();
		$item = $event->getItem ();
		if ($item->getId () == 0000000) {
			$pk = new \AVENDA\UI\MainUI ( $this );
			$pk->sendUI ( $player );
		}
	}
	public function sendUI(\pocketmine\event\server\DataPacketReceiveEvent $event) {
		$pk = $event->getPacket ();
		if (! $pk instanceof \pocketmine\network\mcpe\protocol\ModalFormResponsePacket)
			return;
		$p = $event->getPlayer ();
		if ($pk->formData === null or $pk->formId !== 1410303)
			return;
		$res = json_decode ( $pk->formData, true );
		switch ($res) {
			case 0 :
				break;
			case 1 :
				break;
			case 2 :
				break;
		}
	}
	public function save() {
		$this->setting->setAll ( $this->sdb );
		$this->setting->save ();
		$this->npc->getAll ( $this->npcdb );
		$this->npc->save ();
	}
}