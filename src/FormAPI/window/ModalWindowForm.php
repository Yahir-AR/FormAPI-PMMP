<?php

namespace FormAPI\window;

use pocketmine\Player;

class ModalWindowForm extends WindowForm
{

    /** @var String */
    public $name = "";

    /** @var String */
    public $title = "";

    /** @var String */
    public $description = "";

    /** @var String */
    public $buttonTrue = "";

    /** @var String */
    public $buttonFalse = "";

    /** @var bool */
    public $response;

    public function __construct(String $name, String $title, String $description, String $buttonTrue, String $buttonFalse)
    {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
        $this->buttonTrue = $buttonTrue;
        $this->buttonFalse = $buttonFalse;

        $this->content = [
            "type" => "modal",
            "title" => $this->title,
            "content" => $this->description,
            "button1" => $this->buttonTrue,
            "button2" => $this->buttonFalse
        ];
    }

    /**
     * @param String $text
     */
    public function setTrueButton(String $text): void
    {
        $this->buttonTrue = $text;
    }

    /**
     * @param String $text
     */
    public function setFalseButton(String $text): void
    {
        $this->buttonFalse = $text;
    }

    /**
     * @return String
     */
    public function getTrueButton(): String
    {
        return $this->buttonTrue;
    }

    /**
     * @return String
     */
    public function getFalseButton(): String
    {
        return $this->buttonFalse;
    }

    /**
     * @return bool
     */
    public function isAccept(): bool
    {
        return $this->response;
    }

    /**
     * @param Player $player
     */
    public function showTo(Player $player): void
    {
        parent::showTo($player);
        $player->sendForm($this);
    }
}