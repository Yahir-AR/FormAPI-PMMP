<?php

namespace FormAPI\event;

use FormAPI\window\WindowForm;
use pocketmine\event\player\PlayerEvent;
use pocketmine\Player;

class PlayerWindowResponseEvent extends PlayerEvent {

    /** @var WindowForm */
    private $form;

    /**
     * PlayerWindowResponseEvent constructor.
     * @param Player $player
     * @param WindowForm $form
     */
    public function __construct(Player $player, WindowForm $form) {
        $this->player = $player;
        $this->form = $form;
    }

    /*** @return WindowForm */
    public function getForm(): WindowForm {
        return $this->form;
    }
}