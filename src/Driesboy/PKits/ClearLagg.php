<?php

namespace Driesboy\PKits;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\entity\DroppedItem;
use pocketmine\entity\Entity;
use pocketmine\entity\Creature;

class ClearLagg extends PluginTask{

	public function __construct($plugin){
		$this->plugin = $plugin;
		parent::__construct($plugin);
	}

	public function onRun(int $tick){
		foreach($this->plugin->getServer()->getLevels() as $level) {
			foreach($level->getEntities() as $entity) {
				if(!($entity instanceof Creature)) {
					$entity->close();
				}
			}
		}
	}
}
