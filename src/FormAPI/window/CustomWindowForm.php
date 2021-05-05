<?php

namespace FormAPI\window;

use Closure;
use FormAPI\elements\Dropdown;
use FormAPI\elements\ElementCustom;
use FormAPI\elements\Input;
use FormAPI\elements\Slider;
use FormAPI\elements\StepSlider;
use FormAPI\elements\Toggle;
use pocketmine\player\Player;

class CustomWindowForm extends WindowForm
{

    /** @var ElementCustom[] */
    public $elements = [];

    /**
     * CustomWindowForm constructor.
     * @param string $name
     * @param string $title
     * @param string $description
     * @param Closure|null $response
     */
    public function __construct(string $name, string $title, string $description = "", Closure $response = null)
    {
        $this->name = $name;
        $this->title = $title;

        $this->content = [
            "type" => "custom_form",
            "title" => $this->title,
            "content" => []
        ];

        if ($description !== "") $this->addLabel($description);

        parent::__construct($response);
    }

    /**
     * @param mixed $data
     */
    public function setResponse($data): void
    {
        foreach($this->elements as $name => $element) {

            if(isset($data[$element->getArrayIndex()]))
                $element->setFinalData($data[$element->getArrayIndex()]);

        }

        parent::setResponse($data);
    }

    /**
     * @param ElementCustom $element
     */
    private function addElement(ElementCustom $element): void
    {
        $index = count($this->content["content"]);

        $element->setArrayIndex($index);

        $this->elements[$element->getName()] = $element;
        $this->content["content"][$index] = $element->getContent();
    }

    /**
     * @param String $name
     * @return ElementCustom|null
     */
    public function getElement(String $name): ?ElementCustom
    {
        if(empty($this->elements[$name])) return null;

        return $this->elements[$name];
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
     * @param String $name
     * @param String $text
     * @param int $min
     * @param int $max
     * @param int $step
     * @param int $default
     */
    public function addSlider(String $name, String $text, int $min, int $max, int $step = -1, int $default = -1): void
    {
        $this->addElement(new Slider($this, $name, $text, $min, $max, $step, $default));
    }

    /**
     * @param String $name
     * @param String $text
     * @param array $steps
     * @param int $index
     */
    public function addStepSlider(String $name, String $text, array $steps, int $index = -1): void
    {
        $this->addElement(new StepSlider($this, $name, $text, $steps, $index));
    }

    /**
     * @param String $name
     * @param String $text
     * @param bool $default
     */
    public function addToggle(String $name, String $text, bool $default = false): void
    {
        $this->addElement(new Toggle($this, $name, $text, $default));
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

    /**
     * @param Player $player
     * @param mixed $data
     */
    public function handleResponse(Player $player, $data): void
    {
        parent::handleResponse($player, $data);

        if ($this->callable !== null) {
            if (!$this->isClosed()) ($this->callable)($player, $this);
        }
    }


}