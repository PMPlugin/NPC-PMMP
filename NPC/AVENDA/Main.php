<?php

namespace AVENDA;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\server\DataPacketReceiveEven;
use pocketmine\utils\Config;
use AVENDA\UI\MainUI;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
use pocketmine\command\{CommandSender, Command};

class Main extends PluginBase implements Listener {
	public $setting;
	public $sdb;
	public $npc;
	public $npcdb;
	public function onEnable() {
		@mkdir ( $this->getDataFolder () );
		$this->setting = new Config ( $this->getDataFolder () . "setting.yml", Config::YAML );
		$this->sdb = $this->setting->getAll ();
		$this->npc = new Config ( $this->getDataFolder () . "npc.yml", Config::YAML );
		$this->npcdb = $this->npc->getAll ();
		$this->getServer ()->getPluginManager ()->registerEvents ( $this, $this );
	}
	public function open(PlayerInteractEvent $event) {
		$player = $event->getPlayer ();
		$item = $event->getItem ();
		if ($item->getId () == 0000000) {
			$pk = new MainUI ( $this );
			$pk->sendUI ( $player );
		}
	}
	public function cmd(CommandSender $s, Command $c, string $label, array $args): bool{
		if($c->getName() == "npc")
			$pk = new MainUI ( $this, $s );
			$pk->sendUI ( $s );
	}
	public function sendUI(DataPacketReceiveEvent $event) {
		$pk = $event->getPacket ();
		if (! $pk instanceof ModalFormResponsePacket)
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
