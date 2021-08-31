# FormAPI-PMMP
Plugin to create easy forms for PocketMine-MP.
<br>
🎉 New update:
- Now you can choose between getting the response via callback, or an event.
<br>

# Example Simple Form
For create a simple form

```php
use FormAPI\window\SimpleWindowForm;
use FormAPI\elements\ButtonImage;
use FormAPI\elements\Button;
use pocketmine\Player;

$window = new SimpleWindowForm("name", "Select game", "Choose the game"); //without callback
$window = new SimpleWindowForm("name", "Select game", "Choose the game", function (Player $player, Button $button) {
    $player->sendMessage("Hello, you select " . $button->getText());
}); //with callback

$window->addButton("name", "SkyWars"); //without image
$window->addButton("name1", "BedWars", new ButtonImage("path", "textures/items/bed_blue.png")); //with image
$window->showTo($player);
```
<img src="https://i.imgur.com/xlEFsmc.jpeg" width="430" height="354"></img>

<br>
If your decision was not to use callback, you can get the response through this event

```php
use FormAPI\event\PlayerWindowResponseEvent;
use FormAPI\window\SimpleWindowForm;

public function onResponse(PlayerWindowResponseEvent $event):void {
    $player = $event->getPlayer();
    $form = $event->getForm();

    if (!$form instanceof SimpleWindowForm) {
        return;
    }

    if ($form->getName() !== "name") {
        return;
    }

    if ($form->isClosed()) {
        $player->sendMessage("The form has been closed");

        return;
    }

    $player->sendMessage($form->getClickedButton()->getText());
}
```
# Example Modal Form
For create a modal form

```php
use FormAPI\window\ModalWindowForm;
use pocketmine\Player;

$window = new ModalWindowForm("name", "A little question", "The plugin is good?", "Yes", "No, sorry"); //without callback
$window = new ModalWindowForm("name", "A little question", "The plugin is good?", "Yes", "No, sorry", function (Player $player, bool $accept) {
    if ($accept) {
        $player->sendMessage("User accept");
    } else {
        $player->sendMessage("User cancel");
    }
}); //with callback

$window->showTo($player);
```

<img src="https://i.imgur.com/jJMD99j.jpeg" width="430" height="354"></img>

<br>
If your decision was not to use callback, you can get the response through this event

```php
use FormAPI\event\PlayerWindowResponseEvent;
use FormAPI\window\ModalWindowForm;

public function onResponse(PlayerWindowResponseEvent $event):void {
    $player = $event->getPlayer();
    $form = $event->getForm();

    if (!$form instanceof ModalWindowForm) {
        return;
    }
    
    if ($form->getName() !== "name") {
        return;
    }

    if ($form->isClosed()) {
        $player->sendMessage("The form has been closed");
        
        return;
    }

    if ($form->isAccept()) { //response
        $player->sendMessage("User accept");
    } else {
        $player->sendMessage("User cancel");
    }
}
```

# Example Custom Form
For create a custom form

```php
use FormAPI\window\CustomWindowForm;
use pocketmine\Player;

$window = new CustomWindowForm("window_test", "Test", "This is a test"); //without callback
$window = new CustomWindowForm("window_test", "Test", "This is a test", function (Player $player, CustomWindowForm $form) {
    $user = $form->getElement("users");
    $password = $form->getElement("password");

    $player->sendMessage($user->getName() . ": " . $user->getFinalValue());
    $player->sendMessage($password->getName() . ": " . $password->getFinalValue());
}); //with callback

$window->addDropdown("users", "Select the users", ["ClembArcade", "RomnSD"]);
$window->addInput("password", "Insert your password");
$window->addSlider("age", "Select your age", 6, 20);
$window->addToggle("notifications", "You want receive notifications?");
$window->showTo($player);
```

<img src="https://i.imgur.com/EOoiG31.jpg" width="250" height="200"></img>

<br>
If your decision was not to use callback, you can get the response through this event

```php
use FormAPI\event\PlayerWindowResponseEvent;
use FormAPI\window\CustomWindowForm;

public function onResponse(PlayerWindowResponseEvent $event): void {
    $player = $event->getPlayer();
    $form = $event->getForm();

    if (!$form instanceof CustomWindowForm) {
        return;
    }

    if ($form->getName() !== "window_test") {
        return;
    }

    if ($form->isClosed()) {
        $player->sendMessage("The form has been closed");
        
        return;
    }

    $user = $form->getElement("users");
    $password = $form->getElement("password");
    $age = $form->getElement("age");
    $noti = $form->getElement("notifications");

    $player->sendMessage($user->getName() . ": " . $user->getFinalValue());
    $player->sendMessage($password->getName() . ": " . $password->getFinalValue());
    $player->sendMessage($age->getName() . ": " . $age->getFinalValue());
    $player->sendMessage($noti->getName() . ": " . $noti->getFinalValue());

}

```

<img src="https://i.imgur.com/AJUL8gg.jpg" width="250" height="75"></img>