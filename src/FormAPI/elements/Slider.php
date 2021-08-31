<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

class Slider extends ElementCustom {

    /** @var int */
    private $min;

    /** @var int */
    private $max;

    /** @var int */
    private $step = -1;

    /** @var int */
    private $default = -1;

    /**
     * Slider constructor.
     * @param WindowForm $form
     * @param String $name
     * @param String $text
     * @param int $min
     * @param int $max
     * @param int $step
     * @param int $default
     */
    public function __construct(WindowForm $form, String $name, String $text, int $min, int $max, int $step = -1, int $default = -1) {
        parent::__construct($form, $name, $text);

        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        $this->default = $default;

        $this->content = [
            "type" => "slider",
            "text" => $this->text,
            "min" => $this->min,
            "max" => $this->max
        ];

        if ($this->step !== -1) {
            $this->content["step"] = $this->step;
        }

        if ($this->default !== -1) {
            $this->content["default"] = $this->default;
        }
    }

    /*** @return int */
    public function getMin(): int {
        return $this->min;
    }

    /*** @return int */
    public function getMax(): int {
        return $this->max;
    }

    /*** @return int */
    public function getStep(): int {
        return $this->step;
    }

    /*** @return int */
    public function getDefault(): int {
        return $this->default;
    }
}