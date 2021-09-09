<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

class StepSlider extends ElementCustom {

    /** @var array */
    private $steps;

    /** @var int */
    private $index = -1;

    /**
     * StepSlider constructor.
     * @param WindowForm $form
     * @param String $name
     * @param String $text
     * @param array $steps
     * @param int $index
     */
    public function __construct(WindowForm $form, String $name, String $text, array $steps, int $index = -1) {
        parent::__construct($form, $name, $text);

        $this->steps = $steps;
        $this->index = $index;

        $this->content = [
            "type" => "step_slider",
            "text" => $this->text,
            "steps" => $steps
        ];

        if ($index !== -1) {
            $this->content["default"] = $index;
        }
    }

    /*** @return int */
    public function getIndex(): int {
        return $this->index;
    }

    /*** @return array */
    public function getSteps(): array {
        return $this->steps;
    }
}