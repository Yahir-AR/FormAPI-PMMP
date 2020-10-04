<?php

namespace FormAPI\window;

use FormAPI\elements\Button;
use FormAPI\elements\ButtonImage;
use FormAPI\Main;
use pocketmine\Player;
use pocketmine\scheduler\ClosureTask;
use pocketmine\scheduler\Task;

class SimpleWindowForm extends WindowForm
{

    /** @var String */
    public $name = "";

    /** @var String */
    public $title = "";

    /** @var String */
    public $description = "";

    /** @var Button[] */
    public $elements = [];

    /** @var int */
    public $response;

    public function __construct(String $name, String $title, String $description = "")
    {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;

        $this->content = [
            "type" => "form",
            "title" => $this->title,
            "content" => $this->description,
            "buttons" => []
        ];
    }

    /**
     * @param String $name
     * @param String $text
     */
    public function addButton(String $name, String $text, ButtonImage $image = null): void
    {
        if(isset($this->elements[$name])) return;

        $this->elements[$name] = new Button($name, $text, $this, $image);
    }

    /**
     * @param String $name
     * @return Button
     */
    public function getButton(String $name): ?Button
    {
        if(empty($this->elements[$name])) return null;

        return $this->elements[$name];
    }

    /**
     * @return Button|null
     */
    public function getClickedButton(): ?Button
    {
        if($this->response === null) return null;

        return $this->elements[array_keys($this->elements)[$this->response]];
    }

    /**
     * @param Player $player
     */
    public function showTo(Player $player): void
    {

        foreach($this->elements as $name => $element) {
            $button = [
                "text" => $element->getText()
            ];

            if($element->getImage() !== null) {
                $button["image"] = [
                    "type" => $element->getImage()->getType(),
                    "data" => $element->getImage()->getLocation()
                ];
            }

            $this->content["buttons"][] = $button;
        }

        $player->sendForm($this);

    }


}