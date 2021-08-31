<?php

namespace FormAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class FormAPI extends PluginBase {

    public function onEnable()
    {
        $this->getLogger()->info(TextFormat::GREEN . "FormAPI has been loaded successfully!");
    }
}