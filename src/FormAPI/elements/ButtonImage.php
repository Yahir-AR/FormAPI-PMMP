<?php

namespace NarutoKits\form\elements;

class ButtonImage
{

    const PATH = "path";
    const URL = "url";

    /** @var String */
    private $type = "";

    /** @var String */
    private $location = "";

    public function __construct(String $type, String $location)
    {
        if(!($type === self::PATH || $type === self::URL))
            throw new \Exception("the inserted image type is not correct");

        $this->type = $type;
        $this->location = $location;
    }

    /**
     * @return String
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return String
     */
    public function getLocation(): string
    {
        return $this->location;
    }
}