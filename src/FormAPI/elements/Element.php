<?php

namespace FormAPI\elements;

use FormAPI\window\WindowForm;

interface Element
{

    public function getName(): String;

    public function getForm(): WindowForm;
}