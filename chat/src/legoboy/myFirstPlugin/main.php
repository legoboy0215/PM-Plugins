<?php

namespace legoboy\myFirstPlugin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;

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
                case "hey":
                   //What you want, like:
                   $sender->sendMessage("- " . $this->getConfig()->get("hey"));
                   return true;
                case "bye":
                   //What you want, like:
                   $sender->sendMessage("- " . $this->getConfig()->get("bye"));
                   return true;
                case "hello":
                   //What you want, like:
                   $sender->sendMessage("- " . $this->getConfig()->get("hello"));
                   return true;
            }
}
}
?>
