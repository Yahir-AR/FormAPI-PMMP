# FormAPI-PMMP
Plugin to create easy forms for PocketMine-MP.
<br>

# Example Simple Form
For create a simple form
```php
use FormAPI\window\SimpleWindowForm;
use FormAPI\elements\ButtonImage;

$window = new SimpleWindowForm("name", "Select game", "Choose the game");
$window->addButton("name", "SkyWars");//without image
$window->addButton("name1", "BedWars", new ButtonImage("path", "textures/items/bed_blue.png"));//with image
$window->showTo($player);
```
<img src="https://i.imgur.com/xlEFsmc.jpeg" width="430" height="354"></img>

<br>
For get the response from simple form, this is a event xD

```php
use FormAPI\response\PlayerWindowResponse;
use FormAPI\window\SimpleWindowForm;

public function onResponse(PlayerWindowResponse $event){
$player = $event->getPlayer();
$form = $event->getForm();

if(!($form instanceof SimpleWindowForm)) return;

if($form->getName() !== "name") return;

if($form->isClosed()) {
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

$window = new ModalWindowForm("name", "A little question", "The plugin is good?", "Yes", "No, sorry");
$window->showTo($player);
```

<img src="https://i.imgur.com/jJMD99j.jpeg" width="430" height="354"></img>

<br>
For get the response from modal form, this is a event xD

```php
use FormAPI\response\PlayerWindowResponse;
use FormAPI\window\ModalWindowForm;

public function onResponse(PlayerWindowResponse $event){
$player = $event->getPlayer();
$form = $event->getForm();

if(!($form instanceof ModalWindowForm)) return;

if($form->getName() !== "name") return;

if($form->isClosed()) {
$player->sendMessage("The form has been closed");
return;
}

if($form->isAccept()) {//responsexD
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

$window = new CustomWindowForm("window_test", "Test", "This is a test");
$window->addDropdown("users", "Select the users", ["ClembArcade", "RomnSD"]);
$window->addInput("password", "Insert your password");
$window->addSlider("age", "Select your age", 6, 20);
$window->addToggle("notifications", "You want receive notifications?");
$window->showTo($player);
```

<img src="https://i.imgur.com/EOoiG31.jpg" width="250" height="200"></img>

<br>
For get the response from custom form, this is a event xD

```php
use FormAPI\response\PlayerWindowResponse;
use FormAPI\window\CustomWindowForm;

public function onResponse(PlayerWindowResponse $event){
$player = $event->getPlayer();
$form = $event->getForm();

if(!($form instanceof CustomWindowForm)) return;

if($form->getName() !== "window_test") return;

if($form->isClosed()) {
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