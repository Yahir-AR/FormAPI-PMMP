<?php

namespace NarutoKits\form\elements;

use NarutoKits\form\WindowForm;

interface Element
{

    public function getName(): String;

    public function getForm(): WindowForm;
}