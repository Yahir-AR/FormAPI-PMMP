<?php

namespace FormAPI\window;

use Closure;
use FormAPI\elements\Button;
use FormAPI\elements\ButtonImage;
use pocketmine\Player;

class SimpleWindowForm extends WindowForm {

    /** @var String */
    public $description = "";

    /** @var Button[] */
    public $elements = [];

    /**
     * SimpleWindowForm constructor.
     * @param String $name
     * @param String $title
     * @param String $description
     * @param Closure|null $response
     */
    public function __construct(String $name, String $title, String $description = "", Closure $response = null) {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;

        $this->content = [
            "type" => "form",
            "title" => $this->title,
            "content" => $this->description,
            "buttons" => []
        ];

        parent::__construct($response);
    }

    /**
     * @param String $name
     * @param String $text
     * @param ButtonImage|null $image
     */
    public function addButton(String $name, String $text, ButtonImage $image = null): void {
        if (isset($this->elements[$name])) {
            return;
        }

        $this->elements[$name] = new Button($name, $text, $this, $image);
        $this->content["buttons"][] = $this->elements[$name]->getContent();
    }

    /**
     * @param String $name
     * @return Button
     */
    public function getButton(String $name): ?Button {
        if (empty($this->elements[$name])) {
            return null;
        }

        return $this->elements[$name];
    }

    /*** @return Button|null */
    public function getClickedButton(): ?Button
    {
        if ($this->response === null) {
            return null;
        }

        return $this->elements[array_keys($this->elements)[$this->response]];
    }

    /**
     * @param Player $player
     * @param mixed $data
     */
    public function handleResponse(Player $player, $data): void {
        parent::handleResponse($player, $data);

        if ($this->callable !== null) {
            if ($this->getClickedButton() !== null) {
                ($this->callable)($player, $this->getClickedButton());
            }
        }
    }
}