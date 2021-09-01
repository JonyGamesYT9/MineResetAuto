<?php

namespace JonyGamesYT9\MineResetAuto;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

/**
 * Class MineResetAuto
 * @package JonyGamesYT9\MineResetAuto
 */
class MineResetAuto extends PluginBase 
{
  
  /** @trait SingletonTrait */
  use SingletonTrait;
  
  /** @var Config $config */
  public Config $config;
  
  /**
   * @return void 
   */
  public function onLoad(): void 
  {
    self::setInstance($this);
    $this->saveResource("config.yml");
    $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
  }
  
  /**
   * @return void 
   */
  public function onEnable(): void 
  {
    $this->getScheduler()->scheduleRepeatingTask(new ResetScheduler(), $this->getIntervalTime() * 20);
  }
  
  /**
   * @return int
   */
  public function getIntervalTime(): int 
  {
    return $this->config->get("time-interval");
  }
  
  /**
   * @return string 
   */
  public function getResetMessage(): string 
  {
    return $this->config->get("message-reset-all");
  }
}