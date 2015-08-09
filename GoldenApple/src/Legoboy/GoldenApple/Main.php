<?php 

namespace LegoHG;

use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerItemConsumeEvent;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
	
	public function goldenAppleEat(PlayerItemConsumeEvent $event){
	    $player = $event->getPlayer();
	    if($event->getItem() === Item::Apple){
		    $rand = mt_rand(1, 100);
			if($rand > 10 && $rand < 15){
				$effect = Effect::getEffect(10); //Effect ID
				$effect->setVisible(false); //Particles
				$effect->setAmplifier(2);
				$effect->setDuration(60*20); //Ticks
				$player->addEffect($effect);
				$player->sendPopup(TextFormat::BLUE . "Golden Apple");
			}
		}
	}
