<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

class Input extends ElementCustom
{

    /** @var String */
    private $placeholder = "";

    /** @var String */
    private $value = "";


    public function __construct(WindowForm $form, String $name, String $text, String $placeholder = "", String $value = "")
    {
        parent::__construct($form, $name, $text);
        $this->placeholder = $placeholder;
        $this->value = $value;

        $this->content = [
            "type" => "input",
            "text" => $this->text,
            "placeholder" => $this->placeholder,
            "default" => $this->value
        ];
    }

    /**
     * @return String
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    /**
     * @return String
     */
    public function getValue(): string
    {
        return $this->value;
    }

}