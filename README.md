# FormAPI-PMMP
Plugin to create easy forms for PocketMine-MP.

<br><br>
**At the moment it only has a simple form and modal form, but with the passage of time I will implement the missing forms.**
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

$player->sendMessage($form->getClickedButton()->getText());
}
```
# Example Modal Form
For create a modal form
```php
use FormAPI\window\ModalWindowForm;

$window = new ModalWindowForm("name", "Title", "Description", "Accept", "Cancel");
$window->showTo($player);
```

For get the response from modal form, this is a event xD
```php
use FormAPI\response\PlayerWindowResponse;
use FormAPI\window\ModalWindowForm;

public function onResponse(PlayerWindowResponse $event){
$player = $event->getPlayer();
$form = $event->getForm();

if(!($form instanceof ModalWindowForm)) return;

if($form->getName() !== "name") return;

if($form->isAccept()) {//responsexD
$player->sendMessage("User accept");
} else {
$player->sendMessage("User cancel");
}
}
```