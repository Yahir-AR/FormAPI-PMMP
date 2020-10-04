<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

class Dropdown extends ElementCustom
{

    /** @var array */
    private $options = [];

    /** @var int */
    private $default = 0;

    public function __construct(WindowForm $form, String $name, String $text, array $options, int $default = 0)
    {
        parent::__construct($form, $name, $text);
        $this->options = $options;
        $this->default = $default;

        $this->content = [
            "type" => "dropdown",
            "text" => $this->text,
            "options" => $this->options,
            "default" => $this->default
        ];
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return int
     */
    public function getDefault(): int
    {
        return $this->default;
    }

    public function getFinalValue()
    {
        return $this->options[parent::getFinalValue()];
    }

}