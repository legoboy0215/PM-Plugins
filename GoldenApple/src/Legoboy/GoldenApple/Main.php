<?php 

namespace Legoboy\GoldenApple;

use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerItemConsumeEvent;

class Main extends PluginBase implements Listener{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
	
	public function goldenAppleEat(PlayerItemConsumeEvent $event){
	    $player = $event->getPlayer();
	    if($event->getItem()->getId() === Item::Apple){
		    $rand = mt_rand(1, 20);
			if($rand > 5 && $rand < 10){
				$effect = Effect::getEffect(10); //Effect ID
				$effect->setVisible(false); //Particles
				$effect->setAmplifier(2);
				$effect->setDuration(60*20); //Ticks
				$player->addEffect($effect);
				$player->sendPopup(TextFormat::BLUE . "Golden Apple");
			}
		}
	}
