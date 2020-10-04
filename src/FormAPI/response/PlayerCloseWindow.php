<?php

namespace FormAPI\response;

use FormAPI\window\ModalWindowForm;
use FormAPI\window\SimpleWindowForm;
use FormAPI\window\WindowForm;
use pocketmine\event\plugin\PluginEvent;
use pocketmine\Player;

class PlayerCloseWindow extends PluginEvent
{

    /** @var Player */
    private $player;
    
    /** @var String||null */
    private $name = null;

    public function __construct(Player $player, WindowForm $form)
    {
        $this->player = $player;
        if($form instanceof SimpleWindowForm || $form instanceof ModalWindowForm)
        $this->name = $form->getName();
    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }
    
    /**
     * @return String||null
     */
    public function getFormName():? String
    {
        return $this->name;
    }

}