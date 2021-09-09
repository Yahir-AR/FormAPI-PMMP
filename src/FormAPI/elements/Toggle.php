<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

class Toggle extends ElementCustom {

    /** @var boolean */
    private $default;

    /**
     * Toggle constructor.
     * @param WindowForm $form
     * @param String $name
     * @param String $text
     * @param bool $default
     */
    public function __construct(WindowForm $form, String $name, String $text, bool $default) {
        parent::__construct($form, $name, $text);

        $this->default = $default;

        $this->content = [
            "type" => "toggle",
            "text" => $this->text,
            "default" => $this->default
        ];
    }

    /*** @return bool */
    public function getValue(): bool {
        return $this->default;
    }

    /*** @return bool */
    public function getFinalValue(): bool {
        return parent::getFinalValue();
    }
}