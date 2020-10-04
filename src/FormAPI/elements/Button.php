<?php

namespace FormAPI\elements;

use FormAPI\window\SimpleWindowForm;
use FormAPI\window\WindowForm;

class Button implements Element
{

    /** @var String */
    private $name = "";

    /** @var String */
    private $text = "";

    /** @var WindowForm */
    private $form = null;

    /** @var ButtonImage */
    private $image = null;

    public function __construct(String $name, String $text, WindowForm $form, ButtonImage $image = null)
    {
        $this->name = $name;
        $this->text = $text;
        $this->form = $form;
        $this->image = $image;
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
     * @return ButtonImage
     */
    public function getImage(): ?ButtonImage
    {
        return $this->image;
    }
}