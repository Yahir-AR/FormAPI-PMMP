<?php

namespace FormAPI\window;

use FormAPI\response\PlayerWindowResponse;
use pocketmine\form\Form;
use pocketmine\Player;

abstract class WindowForm implements Form
{

    /** @var String */
    public $name = "";

    /** @var String */
    public $title = "";

    /** @var array */
    public $content = [];

    /** @var array */
    public $viewers = [];

    public $response;

    /**
     * @param Player $player
     * @param mixed $data
     */
    public function handleResponse(Player $player, $data): void
    {
        if(isset($this->viewers[$player->getName()]))
            unset($this->viewers[$player->getName()]);

        $this->setResponse($data);
        (new PlayerWindowResponse($player, $this))->call();
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return $this->getContent();
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return bool
     */
    public function isClosed(): bool
    {
        return $this->response === null;
    }
    /**
     * @param Player $player
     */
    public function showTo(Player $player): void
    {
        if(isset($this->viewers[$player->getName()])) return;

        $this->viewers[$player->getName()] = $this;
        $player->sendForm($this);
    }
}
