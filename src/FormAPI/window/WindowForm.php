<?php

namespace FormAPI\window;

use Closure;
use FormAPI\event\PlayerWindowResponseEvent;
use pocketmine\form\Form;
use pocketmine\Player;

abstract class WindowForm implements Form {

    /** @var String */
    public $name = "";

    /** @var String */
    public $title = "";

    /** @var array */
    public $content = [];

    /** @var array */
    public $viewers = [];

    public $response;

    public $callable = null;

    /**
     * WindowForm constructor.
     * @param Closure|null $response
     */
    public function __construct(Closure $response = null)
    {
        if ($response !== null) {
            $this->onResponse($response);
        }
    }

    /**
     * @param Player $player
     * @param mixed $data
     */
    public function handleResponse(Player $player, $data): void {
        if (isset($this->viewers[$player->getName()])) {
            unset($this->viewers[$player->getName()]);
        }

        $this->setResponse($data);

        $event = new PlayerWindowResponseEvent($player, $this);
        $event->call();
    }

    /*** @return array */
    public function jsonSerialize(): array {
        return $this->getContent();
    }

    /*** @return String */
    public function getName(): String {
        return $this->name;
    }

    /*** @return array */
    public function getContent(): array {
        return $this->content;
    }

    /*** @param mixed $response */
    public function setResponse($response): void {
        $this->response = $response;
    }

    /*** @return mixed */
    public function getResponse() {
        return $this->response;
    }

    /*** @return bool */
    public function isClosed(): bool {
        return $this->response === null;
    }

    /*** @param Player $player */
    public function showTo(Player $player): void {
        if (isset($this->viewers[$player->getName()])) {
            return;
        }

        $this->viewers[$player->getName()] = $this;
        $player->sendForm($this);
    }

    /**
     * @param Closure $closure
     * @return $this
     */
    public function onResponse(Closure $closure): self {
        $this->callable = $closure;
        return $this;
    }
}
