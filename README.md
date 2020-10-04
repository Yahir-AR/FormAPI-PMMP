# FormAPI-PMMP
Plugin to create easy forms for PocketMine-MP.

# Example
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

if(!($form->getName() !== "name")) return;

$player->sendMessage($form->getClickedButton()->getText());
}
```