<?php

namespace FormAPI\window;

use FormAPI\response\PlayerWindowResponse;
use pocketmine\form\Form;
use pocketmine\Player;

abstract class WindowForm implements Form
{

    public $content = [];

    public $viewers = [];

    public function handleResponse(Player $player, $data): void
    {
        $player->getServer()->getPluginManager()->callEvent(new PlayerWindowResponse($player, $data, $this));

        if(isset($this->viewers[$player->getName()]))
            unset($this->viewers[$player->getName()]);
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