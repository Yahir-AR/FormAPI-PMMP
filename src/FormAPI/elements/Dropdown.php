<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

class Dropdown implements Element
{

    /** @var String */
    private $name = "";

    /** @var String */
    private $text = "";

    /** @var array */
    private $options = [];

    /** @var int */
    private $default = 0;

    /** @var WindowForm */
    private $form = null;

    private $content = [];


    public function __construct(WindowForm $form, String $name, String $text, array $options, int $default = 0)
    {
        $this->form = $form;
        $this->name = $name;
        $this->text = $text;
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