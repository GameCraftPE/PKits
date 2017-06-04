<?php
/*
License Text
*/
namespace Driesboy\FKits;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase {

	public function onEnable() {
		//codes
	}

	public function onCommand(CommandSender $sender, Command $command, $lable, array $args) {
		$ce = $this->getServer()->getPluginManager()->getPlugin("PiggyCustomEnchants");
		switch(strtolower($command->getName())){
			case "blind":
			if ($r = EconomyAPI::getInstance()->reduceMoney($sender, 150)) {
				$item = Item::get(Item::DIAMOND_SWORD);
				$enchant = $ce->addEnchantment($item, "blind", 1, $sender, null, null, true, false);
				$sender->getInventory()->addItem($enchant);
			}else{
				switch ($r) {
					case EconomyAPI::RET_INVALID:
					# Invalid $amount
					break;
					case EconomyAPI::RET_CANCELLED:
					# Transaction was cancelled for some reason :/
					break;
					case EconomyAPI::RET_NO_ACCOUNT:
					# Player wasn't recognised by EconomyAPI aka. not registered
					break;
				}
			}
			break;
			case "deathbringer":
			if ($r = EconomyAPI::getInstance()->reduceMoney($sender, 150)) {
				$item = Item::get(Item::DIAMOND_SWORD);
				$enchant = $ce->addEnchantment($item, "deathbringer", 1, $sender, null, null, true, false);
				$sender->getInventory()->addItem($enchant);
			}else{
				switch ($r) {
					case EconomyAPI::RET_INVALID:
					# Invalid $amount
					break;
					case EconomyAPI::RET_CANCELLED:
					# Transaction was cancelled for some reason :/
					break;
					case EconomyAPI::RET_NO_ACCOUNT:
					# Player wasn't recognised by EconomyAPI aka. not registered
					break;
				}
			}
			break;
			case "lifesteal":
				if ($r = EconomyAPI::getInstance()->reduceMoney($sender, 150)) {
					$item = Item::get(Item::DIAMOND_SWORD);
					$enchant = $ce->addEnchantment($item, "lifesteal", 1, $sender, null, null, true, false);
					$sender->getInventory()->addItem($enchant);
				}else{
					switch ($r) {
						case EconomyAPI::RET_INVALID:
						# Invalid $amount
						break;
						case EconomyAPI::RET_CANCELLED:
						# Transaction was cancelled for some reason :/
						break;
						case EconomyAPI::RET_NO_ACCOUNT:
						# Player wasn't recognised by EconomyAPI aka. not registered
						break;
					}
				}
				break;
			case "frozen":
				if ($r = EconomyAPI::getInstance()->reduceMoney($sender, 150)) {
					$item = Item::get(Item::DIAMOND_CHESTPLATE);
					$enchant = $ce->addEnchantment($item, "frozen", 1, $sender, null, null, true, false);
					$sender->getInventory()->addItem($enchant);
				}else{
					switch ($r) {
						case EconomyAPI::RET_INVALID:
						# Invalid $amount
						break;
						case EconomyAPI::RET_CANCELLED:
						# Transaction was cancelled for some reason :/
						break;
						case EconomyAPI::RET_NO_ACCOUNT:
						# Player wasn't recognised by EconomyAPI aka. not registered
						break;
					}
				}
				break;
				case "gears":
				if ($r = EconomyAPI::getInstance()->reduceMoney($sender, 150)) {
					$item = Item::get(Item::DIAMOND_BOOTS);
					$enchant = $ce->addEnchantment($item, "gears", 1, $sender, null, null, true, false);
					$sender->getInventory()->addItem($enchant);
				}else{
					switch ($r) {
						case EconomyAPI::RET_INVALID:
						# Invalid $amount
						break;
						case EconomyAPI::RET_CANCELLED:
						# Transaction was cancelled for some reason :/
						break;
						case EconomyAPI::RET_NO_ACCOUNT:
						# Player wasn't recognised by EconomyAPI aka. not registered
						break;
					}
				}
				break;
				case "springs":
				if ($r = EconomyAPI::getInstance()->reduceMoney($sender, 150)) {
					$item = Item::get(Item::DIAMOND_BOOTS);
					$enchant = $ce->addEnchantment($item, "springs", 1, $sender, null, null, true, false);
					$sender->getInventory()->addItem($enchant);
				}else{
					switch ($r) {
						case EconomyAPI::RET_INVALID:
						# Invalid $amount
						break;
						case EconomyAPI::RET_CANCELLED:
						# Transaction was cancelled for some reason :/
						break;
						case EconomyAPI::RET_NO_ACCOUNT:
						# Player wasn't recognised by EconomyAPI aka. not registered
						break;
					}
				}
				break;
				case "DiamondKit":
				if ($sender->hasPermission("rank.diamond")) {
					$item = Item::get(Item::DIAMOND_HELMET);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::DIAMOND_CHESTPLATE);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::DIAMOND_LEGGINGS);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::DIAMOND_BOOTS);
					$sender->getInventory()->addItem($item);
				}else{
					$sender->sendMessage("This kit is only for players with Diamond Rank!");
				}
				break;
				case "GoldKit":
				if ($sender->hasPermission("rank.gold")) {
					$item = Item::get(Item::IRON_HELMET);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::IRON_CHESTPLATE);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::IRON_LEGGINGS);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::IRON_BOOTS);
					$sender->getInventory()->addItem($item);
				}else{
					$sender->sendMessage("This kit is only for players with Gold Rank!");
				}
				break;
				case "LapisKit":
				if ($sender->hasPermission("rank.lapis")) {
					$item = Item::get(Item::CHAIN_HELMET);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::CHAIN_CHESTPLATE);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::CHAIN_LEGGINGS);
					$sender->getInventory()->addItem($item);
					$item = Item::get(Item::CHAIN_BOOTS);
					$sender->getInventory()->addItem($item);
				}else{
					$sender->sendMessage("This kit is only for players with Lapis Rank!");
				}
				break;
			}
		}
	}
