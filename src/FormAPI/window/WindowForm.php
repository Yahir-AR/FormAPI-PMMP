<?php

namespace FormAPI\window;

use FormAPI\response\PlayerWindowResponse;
use FormAPI\response\PlayerCloseWindow;
use pocketmine\form\Form;
use pocketmine\Player;

abstract class WindowForm implements Form
{
	
	public $content = [];

	public $viewers = [];
	
	public function handleResponse(Player $player, $data): void 
	{
		if(isset($this->viewers[$player->getName()]))
			unset($this->viewers[$player->getName()]);
		if($data === null){
			$ev = new PlayerCloseWindow($player, $this);
			if(!$ev->isCancelled()){
				$ev->call();
			}
		} else {
			$ev = new PlayerWindowResponse($player, $data, $this);
			if(!$ev->isCancelled()){
				$ev->call();
			}
        }
    }

    public function jsonSerialize()
    {
        return $this->getContent();
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function showTo(Player $player): void
    {
        if(isset($this->viewers[$player->getName()])) return;

        $this->viewers[$player->getName()] = $this;
    }
}