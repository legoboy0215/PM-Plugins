<?php
namespace legoboy\blockchanger;
use pocketmine\scheduler\PluginTask;
use pocketmine\plugin\PluginBase;
use pocketmine\level\Position;
class ChangeBlockTask extends PluginTask{
  private $pos;
  private $list;
  private $current = 0;
  public function __construct(Main $main, Position $pos, array $list){
    parent::__construct($main);
    $this->pos = $pos;
    $this->list = $list;
    if(count($list) === 0){
      throw new \InvalidArgumentException;
    }
  }
  public function onRun($t){
    $this->pos->getLevel()->setBlock($this->pos, $this->list[$this->next()]);
  }
  private function next(){
    $this->current++;
    if($this->current >= count($this->list)) $this->current = 0; // loop back to the initial item
    return $this->current;
  }
}
