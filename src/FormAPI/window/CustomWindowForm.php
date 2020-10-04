<?php

namespace FormAPI\window;

use FormAPI\elements\Dropdown;
use FormAPI\elements\Element;
use FormAPI\elements\Input;
use FormAPI\Main;

use pocketmine\Player;

class CustomWindowForm extends WindowForm
{

    /** @var String */
    public $name = "";

    /** @var String */
    public $title = "";

    /** @var Button[] */
    public $elements = [];

    /** @var int */
    public $response;

    public function __construct(string $name, string $title, string $description = "")
    {
        $this->name = $name;
        $this->title = $title;

        $this->content = [
            "type" => "custom_form",
            "title" => $this->title,
            "content" => []
        ];

        $this->addLabel($description);
    }

    /**
     * @param Element $element
     */
    public function addElement(Element $element): void
    {
        $this->elements[$element->getName()] = $element;
        $this->response["content"][] = $element->getContent();
    }

    /**
     * @param String $name
     * @param String $text
     * @param array $options
     * @param int $default
     */
    public function addDropdown(String $name, String $text, array $options, int $default = 0): void
    {
        $this->addElement(new Dropdown($this, $name, $text, $options, $default));
    }

    /**
     * @param String $name
     * @param String $text
     * @param string $placeholder
     * @param string $value
     */
    public function addInput(String $name, String $text, String $placeholder = "", String $value = ""): void
    {
        $this->addElement(new Input($this, $name, $text, $placeholder, $value));
    }

    /**
     * @param String $text
     */
    public function addLabel(String $text): void
    {
        $this->content["content"][] = [
            "type" => "label",
            "text" => $text
        ];
    }

}