<?php

namespace Driesboy\PKits;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;

class Task extends PluginTask{
	public function __construct($plugin){
		$this->plugin = $plugin;
		parent::__construct($plugin);
	}

	public function onRun(int $tick){
		$pl = $this->plugin->getServer()->getOnlinePlayers();
		foreach($pl as $p){
			if(!$p->getInventory()->getItemInHand()->hasEnchantments()){
				$p->sendPopup(TF::GRAY."You are playing on ".TF::BOLD.TF::BLUE."GameCraft PE PvP".TF::RESET."\n".TF::DARK_GRAY."[".TF::LIGHT_PURPLE.count($this->plugin->getServer()->getOnlinePlayers()).TF::DARK_GRAY."/".TF::LIGHT_PURPLE.$this->plugin->getServer()->getMaxPlayers().TF::DARK_GRAY."] | ".TF::YELLOW."$".$this->plugin->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($p).TF::DARK_GRAY." | ".TF::BOLD.TF::AQUA."Vote: ".TF::RESET.TF::GREEN."vote.gamecraftpe.tk");
			}
		}
	}
}
