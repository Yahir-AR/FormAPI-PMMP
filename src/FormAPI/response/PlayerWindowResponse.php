<?php

namespace FormAPI\response;

use FormAPI\window\ModalWindowResponse;
use FormAPI\window\SimpleWindowForm;
use FormAPI\window\WindowForm;
use pocketmine\event\plugin\PluginEvent;
use pocketmine\Player;

class PlayerWindowResponse extends PluginEvent
{

    /** @var Player */
    private $player;

    /** @var WindowForm */
    private $form;

    public function __construct(Player $player, $data, WindowForm $form)
    {
        $this->player = $player;
        $this->form = $form;

        if($form instanceof SimpleWindowForm || $form instanceof ModalWindowResponse)
            $form->response = $data;

    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }

    /**
     * @return WindowForm
     */
    public function getForm(): WindowForm
    {
        return $this->form;
    }
}