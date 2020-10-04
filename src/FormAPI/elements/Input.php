<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

class Input implements Element
{

    /** @var String */
    private $name = "";

    /** @var String */
    private $text = "";

    /** @var String */
    private $placeholder = "";

    /** @var String */
    private $value = "";

    /** @var WindowForm */
    private $form = null;

    private $content = [];


    public function __construct(WindowForm $form, String $name, String $text, String $placeholder = "", String $value = "")
    {
        $this->form = $form;
        $this->name = $name;
        $this->text = $text;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return String
     */
    public function getText(): string
    {
        return $this->text;
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

    /**
     * @return WindowForm
     */
    public function getForm(): WindowForm
    {
        return $this->form;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }
}