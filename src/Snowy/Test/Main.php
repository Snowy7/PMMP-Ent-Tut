<?php

declare(strict_types=1);

namespace Snowy\Test;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Entity;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public function onEnable()
    {
        $this->getLogger()->alert("test is now enabled!");
        Entity::registerEntity(Zombie::class, true);
        Entity::registerEntity(Blaze::class, true);
        parent::onEnable(); // TODO: Change the autogenerated stub
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if (!$sender instanceof Player)
            return false;

        if ($command->getName() == "spawnz") {
            if (isset($args[0])) {
                switch ($args[0]) {
                    case "zombie":
                    case "z":

                        //Spawning thr zombie
                        $e = new Zombie($sender->getLevel(),
                            Entity::createBaseNBT($sender->add(0, 10, 0)), $sender);
                        $e->setNameTag("Snowy's Property");
                        $e->setNameTagAlwaysVisible(true);
                        $e->spawnToAll();

                        break;

                    case "blaze":
                    case "b":

                        //Spawning thr Blaze
                        $e = new Blaze($sender->getLevel(),
                            Entity::createBaseNBT($sender->add(0, 10, 0)), $sender);
                        $e->setNameTag("Snowy's Property");
                        $e->setNameTagAlwaysVisible(true);
                        $e->spawnToAll();

                        break;
                }
            } else {
                $sender->sendMessage("Dummy define the eneity type");
            }
        }
        return true;
    }
}