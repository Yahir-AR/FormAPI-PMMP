<?php

namespace FormAPI\window;

use Closure;
use pocketmine\player\Player;

class ModalWindowForm extends WindowForm
{

    /** @var String */
    public $description = "";

    /** @var String */
    public $buttonTrue = "";

    /** @var String */
    public $buttonFalse = "";

    /**
     * ModalWindowForm constructor.
     * @param String $name
     * @param String $title
     * @param String $description
     * @param String $buttonTrue
     * @param String $buttonFalse
     * @param Closure|null $response
     */
    public function __construct(String $name, String $title, String $description, String $buttonTrue, String $buttonFalse, Closure $response = null)
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

        parent::__construct($response);
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
     * @param mixed $data
     */
    public function handleResponse(Player $player, $data): void
    {
        parent::handleResponse($player, $data);

        if ($this->callable !== null) {
            if (!$this->isClosed()) ($this->callable)($player, $this->isAccept());
        }
    }

}