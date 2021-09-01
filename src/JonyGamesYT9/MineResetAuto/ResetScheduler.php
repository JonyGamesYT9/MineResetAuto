<?php

namespace JonyGamesYT9\MineResetAuto;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\scheduler\Task;
use pocketmine\Player;
use pocketmine\Server;
use function str_replace;

/**
* Class ResetScheduler
* @package JonyGamesYT9\MineResetAuto
*/
class ResetScheduler extends Task
{

  /**
  * @param int $tick
  */
  public function onRun(int $tick)
  {
    foreach (Server::getInstance()->getOnlinePlayers() as $players) {
      if ($players instanceof Player) {
        $players->sendMessage(str_replace(["&"], ["§"], MineResetAuto::getInstance()->getResetMessage()));
      }
    }
    Server::getInstance()->dispatchCommand(new ConsoleCommandSender(), "mine reset-all");
  }
}