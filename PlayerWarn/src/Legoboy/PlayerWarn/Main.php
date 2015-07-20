<?php

namespace Legoboy\PlayerWarn;

use pocketmine\plugin\PluginBase; //Whatever you use in the plugin, you need to have it here.
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

        public function onEnable(){
            @mkdir($this->getDataFolder());
            $this->warnedplayers = new Config($this->getDataFolder()."warnedplayers.txt", Config::ENUM);
			$this->warnedplayers->save();
        }
		
        public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
            switch($cmd->getName()){
                case "warn":
                    if($sender->hasPermission("pw.warn")){
                        if((!isset($args[0])) or (!isset($args[1]))){
						    $sender->sendMessage(TextFormat::GREEN . "Please enter player name and the message correctly.");
							return true;
						}elseif($this->getServer()->getPlayer($args[0]) instanceof Player and $this->getServer()->getPlayer($args[0])->isOnline()){
						    if($args[1] !== null){
							$name = strtolower(array_shift($args));
							$msg = implode(' ', $args);
						    if($this->warnedplayers->exists($name)){
							    $this->getServer()->getPlayer($name)->kick($msg, false);
								return true;
							}elseif($this->getServer()->getPlayer($name)->isOnline()){
		                    $this->getServer()->getPlayer($name)->sendMessage(TextFormat::DARK_RED . "[LegoCraft] Admin Warning: " . $msg);
							$this->warnedplayers->set($name);
							return true;
						}
					}
                    }else{
						    $sender->sendMessage(TextFormat::YELLOW . "Player does not exist or is not online.");
							return true;
                     }
                }else{
                	$sender->sendMessage(TextFormat::RED . "You do not have permission to execute this command.");
					return true;	
                }
                case "forgive":
                    if($sender->hasPermission("pw.forgive")){
                        if($this->warnedplayers->exists($args[0])){
                            $this->warnedplayers->remove($args[0]);
                            $sender->sendMessage(TextFormat::BLUE . $args[0] . " has been forgiven.");
                        }else{
						$sender->sendMessage(TextFormat::RED . "Player has not been warned before.");
						}
                    }else{
                        $sender->sendMessage(TextFormat::RED . "You do not have permission to execute this command.");
                    }						
            }
        }
	
        public function onDisable(){
			$this->warnedplayers->save();
        }
	}
