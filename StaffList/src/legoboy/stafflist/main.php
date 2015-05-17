<?php

namespace legoboy\stafflist;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{

        public function onLoad(){
                $this->getLogger()->info("onLoad() has been called!");
        }

        public function onEnable(){
                $this->getLogger()->info("onEnable() has been called!");
		$this->saveDefaultConfig();
        }

        public function onDisable(){
                $this->getLogger()->info("onDisable() has been called!");
        }
		public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
            switch($cmd->getName()){
                case "owner":
                   //What you want, like:
                   $sender->sendMessage(TextFormat::RED . $this->getConfig()->get("owner"));
                   return true;
                case "admin":
                   //What you want, like:
                   $sender->sendMessage(TextFormat::GREEN . $this->getConfig()->get("admin"));
                   return true;
                case "builder":
                   //What you want, like:
                   $sender->sendMessage(TextFormat::BLUE . $this->getConfig()->get("builder"));
                   return true;
            }
}
}
?>
