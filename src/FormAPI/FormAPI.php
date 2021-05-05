<?php

namespace FormAPI;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class FormAPI extends PluginBase
{

    public function onEnable(): void
    {
        $this->getLogger()->notice(TextFormat::GREEN . "formapi has been loaded successfully");
    }

}