<?php
/*
License Text
*/
namespace Driesboy\PKits;

use pocketmine\command\Command;
use pocketmine\command\Commandplayer;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase implements Listener{

	public function onEnable() {
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new Task($this), 20);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new ParticleTask($this), 0.001);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new ClearLagg($this), 1000);
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/**
	* @param PlayerRespawnEvent $event
	* @priority MONITOR
	*/
	public function onRespawn(PlayerRespawnEvent $event) {
		$player = $event->getPlayer();
		if ($event->getPlayer()->hasPermission("rank.diamond")){
			$player->getInventory()->setHelmet(Item::get(Item::DIAMOND_HELMET));
			$player->getInventory()->setChestplate(Item::get(Item::DIAMOND_CHESTPLATE));
			$player->getInventory()->setLeggings(Item::get(Item::DIAMOND_LEGGINGS));
			$player->getInventory()->setBoots(Item::get(Item::DIAMOND_BOOTS));
			$player->getInventory()->sendArmorContents($player);
			$player->getInventory()->addItem(Item::get(Item::DIAMOND_SWORD));
			$player->getInventory()->addItem(Item::get(Item::BREAD, 0, 5));
			$player->getInventory()->sendContents($player);
		}elseif ($event->getPlayer()->hasPermission("rank.gold")){
			$player->getInventory()->setHelmet(Item::get(Item::IRON_HELMET));
			$player->getInventory()->setChestplate(Item::get(Item::IRON_CHESTPLATE));
			$player->getInventory()->setLeggings(Item::get(Item::IRON_LEGGINGS));
			$player->getInventory()->setBoots(Item::get(Item::IRON_BOOTS));
			$player->getInventory()->sendArmorContents($player);
			$player->getInventory()->addItem(Item::get(Item::IRON_SWORD));
			$player->getInventory()->addItem(Item::get(Item::BREAD, 0, 5));
			$player->getInventory()->sendContents($player);
		}elseif ($event->getPlayer()->hasPermission("rank.lapis")){
			$player->getInventory()->setHelmet(Item::get(Item::CHAIN_HELMET));
			$player->getInventory()->setChestplate(Item::get(Item::CHAIN_CHESTPLATE));
			$player->getInventory()->setLeggings(Item::get(Item::CHAIN_LEGGINGS));
			$player->getInventory()->setBoots(Item::get(Item::CHAIN_BOOTS));
		  $player->getInventory()->sendArmorContents($player);
			$player->getInventory()->addItem(Item::get(Item::STONE_SWORD));
			$player->getInventory()->addItem(Item::get(Item::BREAD, 0, 5));
			$player->getInventory()->sendContents($player);
		}else{
			$player->getInventory()->setHelmet(Item::get(Item::LEATHER_CAP));
			$player->getInventory()->setChestplate(Item::get(Item::LEATHER_TUNIC));
			$player->getInventory()->setLeggings(Item::get(Item::LEATHER_PANTS));
			$player->getInventory()->setBoots(Item::get(Item::LEATHER_BOOTS));
			$player->getInventory()->sendArmorContents($player);
			$player->getInventory()->addItem(Item::get(Item::WOODEN_SWORD));
			$player->getInventory()->addItem(Item::get(Item::BREAD, 0, 5));
			$player->getInventory()->sendContents($player);
		}
	}
}
