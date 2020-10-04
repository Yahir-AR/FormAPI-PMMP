# FormAPI-PMMP
Plugin to create easy forms for PocketMine-MP.

<br><br>
**At the moment it only has a simple form and modal form, but with the passage of time I will implement the missing forms.**
# Example Simple Form
For create a simple form
```
use FormAPI\window\SimpleWindowForm;
use FormAPI\elements\ButtonImage;

$window = new SimpleWindowForm("name", "title", "description");
$window->addButton("name", "text");//without image
$window->addButton("name1", "text", new ButtonImage("type", "location"));//with image
$window->showTo($player);
```

For get the response from simple form, this is a event xD
```
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
```
use FormAPI\window\ModalWindowForm;

$window = new ModalWindowForm("name", "Title", "Description", "Accept", "Cancel");
$window->showTo($player);
```

For get the response from modal form, this is a event xD
```
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