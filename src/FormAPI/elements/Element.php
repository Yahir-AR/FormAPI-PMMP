<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

abstract class Element
{

    /** @var String */
    public $name = "";

    /** @var String */
    public $text = "";

    /** @var WindowForm */
    public $form = null;

    /** @var array */
    public $content = [];

    public function __construct(WindowForm $form, String $name, String $text)
    {
        $this->form = $form;
        $this->name = $name;
        $this->text = $text;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @return String
     */
    public function getText(): String
    {
        return $this->text;
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