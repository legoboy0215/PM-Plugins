<?php

namespace legoboy\isopornot;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{

        public function onLoad(){
                $this->getLogger()->info("onLoad() has been called!");
        }

        public function onEnable(){
                $this->getLogger()->info("onEnable() has been called!");
        }

        public function onDisable(){
                $this->getLogger()->info("onDisable() has been called!");
        }
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
            switch($cmd->getName()){
                case "isop":
                   $sender->sendMessage("[LegoCraft] " .TextFormat::GREEN . "You ".($sender->isOp() ? "are" : "are not")." op!");
                   return true;
            }
}
}
