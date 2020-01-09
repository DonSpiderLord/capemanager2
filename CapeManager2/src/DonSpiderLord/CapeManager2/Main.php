<?php

#Plugin intended only for use on U-PvP Network Servers.
#Author: DonSpiderLord
#Plugin Use On Other Servers Strictly Prohibited.
#Latest Version: 16/08/2019 21:42AM

declare(strict_types=1);

namespace DonSpiderLord\CapeManager2;

use pocketmine\plugin\PluginBase;
use pocketmine\entity\Skin;
use pocketmine\utils\TextFormat as C;
use pocketmine\command\{
	Command, CommandSender
};
use pocketmine\event\Listener;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\Player;
use DonSpiderLord\CapeManager2\libs\jojoe77777\FormAPI\SimpleForm;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\event\player\{
	PlayerJoinEvent, PlayerQuitEvent, PlayerChangeSkinEvent
};

class Main extends PluginBase implements Listener {

    protected $skin = [];
    public $skins;
    /** @var string */
    public $noperm = C::AQUA . "§f[§bServer§f] §cYou don't have Permissions for this Action!";

    /**
     * @return void
     */

    public function onEnable() {
        $this->saveResource("capes.yml");
        $this->cfg = new Config($this->getDataFolder() . "capes.yml", Config::YAML);
        foreach ($this->cfg->get("capes") as $cape) {
            $this->saveResource("$cape.png");
        }
    }

	public function onJoin(PlayerJoinEvent $eve) {
		$player = $eve->getPlayer();
		$this->skin[$player->getName()] = $player->getSkin();
	}

	public function onChangeSkin(PlayerChangeSkinEvent $eve) {
		$player = $eve->getPlayer();
		$this->skin[$player->getName()] = $player->getSkin();
	}

       public function createCape($capeName) {
            $path = $this->getDataFolder()."{$capeName}.png";

            $img = @imagecreatefrompng($path);

            $bytes = '';

            $l = (int) @getimagesize($path)[1];

            for ($y = 0; $y < $l; $y++) {

                for ($x = 0; $x < 64; $x++) {

                    $rgba = @imagecolorat($img, $x, $y);

                    $a = ((~((int)($rgba >> 24))) << 1) & 0xff;

                    $r = ($rgba >> 16) & 0xff;

                    $g = ($rgba >> 8) & 0xff;

                    $b = $rgba & 0xff;

                    $bytes .= chr($r) . chr($g) . chr($b) . chr($a);

                }

            }

        @imagedestroy($img);
        return $bytes;
    }

    public function onCommand(CommandSender $player, Command $command, string $label, array $args): bool {
        $this->cfg = new Config($this->getDataFolder() . "capes.yml", Config::YAML);
        $cape = $this->cfg->get("capes2");
        switch (strtolower($command->getName())) {
            case "capes2":
                if ($player instanceof Player) {
                    if (!isset($args[0])) {
                        if (!$player->hasPermission("capes2.cmd")) {
                            $player->sendMessage($this->noperm);
                            return true;
                        } else {
            $form = new SimpleForm(function (Player $player, $data) {
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    							 case 0:
                    $command = "capes2 abort";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                    							 case 1:
                    $command = "capes2 remove";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
						break;
						           						 case 2:
                    $command = "capes2 1MCape";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                       						 case 3:
                    $command = "capes2 Bacon";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                       						 case 4:
                    $command = "capes2 BugTracker";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                       						 case 5:
                    $command = "capes2 cheapsh0t";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
						break;
						           						 case 6:
                    $command = "capes2 Cobalt";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                   case 7:
                    $command = "capes2 CrowdinTranslator";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                   case 8:
                    $command = "capes2 CrowdinTranslatorChina";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                  case 9:
                    $command = "capes2 dannyBStyle";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
                                  case 10:
                    $command = "capes2 JulianClark";
								$this->getServer()->getCommandMap()->dispatch($player, $command);
                        break;
																	case 11:
                     $command = "capes2 MapMaker";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 12:
                     $command = "capes2 Minecon2011";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 13:
                     $command = "capes2 Minecon2012";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                    							case 14:
                     $command = "capes2 Minecon2013";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
 												break;
 						           						case 15:
                     $command = "capes2 Minecon2015";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 16:
                     $command = "capes2 Minecon2016";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
												 					case 17:
						         $command = "capes2 Minecon2019";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												 break;
                                  case 18:
                     $command = "capes2 Mojangnew";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                 	case 19:
                     $command = "capes2 Mojangold";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
                                  case 20:
                     $command = "capes2 MrMessiah";
 								$this->getServer()->getCommandMap()->dispatch($player, $command);
                         break;
												 					case 21:
										 $command = "capes2 Newyear2011";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 22:
										$command = "capes2 Prismarine";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 23:
										$command = "capes2 Scrolls";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
												 					case 24:
										$command = "capes2 Turtles";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
							 					break;
												 					case 25:
										$command = "capes2 Xmas";
			 					$this->getServer()->getCommandMap()->dispatch($player, $command);
												break;
             }
             });
        $form->setTitle("§bMojang Capes");
        $form->setContent("§6>>Choose A Mojang Cape<<");
        $form->addButton("§4Abort & Close Menu", 0);
        $form->addButton("§0Remove Cape", 1);
        $form->addButton("§3Millionth Customer Cape", 2);
        $form->addButton("§3Bacon Cape", 3);
        $form->addButton("§3Bug Tracker Cape", 4);
        $form->addButton("§3cheapsh0t Cape", 5);
        $form->addButton("§3Cobalt Cape", 6);
        $form->addButton("§3Crowdin Translator Cape", 7);
        $form->addButton("§3Crowdin Translator China Cape", 8);
        $form->addButton("§3dannyBStyle Cape", 9);
        $form->addButton("§3Julian Clark Cape", 10);
				$form->addButton("§3Map Maker Cape", 11);
        $form->addButton("§3Minecon 2011 Cape", 12);
        $form->addButton("§3Minecon 2012 Cape", 13);
        $form->addButton("§3Minecon 2013 Cape", 14);
        $form->addButton("§3Minecon 2015 Cape", 15);
        $form->addButton("§3Minecon 2016 Cape", 16);
				$form->addButton("§3Minecon 2019 Cape", 17);
        $form->addButton("§3Mojang New Cape", 18);
        $form->addButton("§3Mojang Old Cape", 19);
        $form->addButton("§3MrMessiah Cape", 20);
        $form->addButton("§3New Year 2011 Cape", 21);
				$form->addButton("§3Prismarine Cape", 22);
        $form->addButton("§3Scrolls Cape", 23);
        $form->addButton("§3Turtles Cape", 24);
        $form->addButton("§3X-Mas Cape", 25);
        $form->sendToPlayer($player);
        }
        return true;
                    }
                    $arg = array_shift($args);
                    switch ($arg) {
                        case "abort":
                            return true;
                            break;
                        case "remove":
        $oldSkin = $player->getSkin();
        $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), "", $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
        $player->setSkin($setCape);
        $player->sendSkin();
                            $player->sendMessage("§f[§bServer§f] §aCape Removed!");
                            return true;
//==============================================
case "1MCape":
		if (!$player->hasPermission("1MCape.cape")) {
				$player->sendMessage($this->noperm);
				return true;
		}else{
$oldSkin = $player->getSkin();
$capeData = $this->createCape("1MCape");
$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
$player->setSkin($setCape);
$player->sendSkin();
$player->sendMessage("§f[§bServer§f] §aMillionth Customer Cape activated!");
 }
 return true;
 //==============================================
 case "Bacon":
 		if (!$player->hasPermission("Bacon.cape")) {
 				$player->sendMessage($this->noperm);
 				return true;
 		}else{
 $oldSkin = $player->getSkin();
 $capeData = $this->createCape("Bacon");
 $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
 $player->setSkin($setCape);
 $player->sendSkin();
 $player->sendMessage("§f[§bServer§f] §aBacon Cape activated!");
  }
 	return true;
	//==============================================
	case "BugTracker":
			if (!$player->hasPermission("BugTracker.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("BugTracker");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aBug Tracker Cape activated!");
	 }
	return true;
	//==============================================
	case "cheapsh0t":
			if (!$player->hasPermission("cheapsh0t.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("cheapsh0t");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §acheapsh0t Cape activated!");
	 }
	return true;
	//==============================================
	case "Cobalt":
			if (!$player->hasPermission("Cobalt.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Cobalt");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aCobalt Cape activated!");
	 }
	return true;
	//==============================================
	case "CrowdinTranslator":
			if (!$player->hasPermission("CrowdinTranslator.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("CrowdinTranslator");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aCrowdin Translator Cape activated!");
	 }
	return true;
	//==============================================
	case "CrowdinTranslatorChina":
			if (!$player->hasPermission("CrowdinTranslatorChina.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("CrowdinTranslatorChina");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aCrowdin Translator China Cape activated!");
	 }
	return true;
	//==============================================
	case "dannyBStyle":
			if (!$player->hasPermission("dannyBStyle.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("dannyBStyle");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §adannyBStyle Cape activated!");
	 }
	 return true;
	 //==============================================
	 case "JulianClark":
	 		if (!$player->hasPermission("JulianClark.cape")) {
	 				$player->sendMessage($this->noperm);
	 				return true;
	 		}else{
	 $oldSkin = $player->getSkin();
	 $capeData = $this->createCape("JulianClark");
	 $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	 $player->setSkin($setCape);
	 $player->sendSkin();
	 $player->sendMessage("§f[§bServer§f] §aJulian Clark Cape activated!");
	  }
	return true;
	//==============================================
	case "MapMaker":
			if (!$player->hasPermission("MapMaker.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("MapMaker");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMap Maker Cape activated!");
	 }
	return true;
	//==============================================
	case "Minecon2011":
			if (!$player->hasPermission("Minecon2011.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Minecon2011");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMinecon 2011 Cape activated!");
	 }
	return true;
	//==============================================
	case "Minecon2012":
			if (!$player->hasPermission("Minecon2012.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Minecon2012");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMinecon 2012 Cape activated!");
	 }
	return true;
	//==============================================
	case "Minecon2013":
			if (!$player->hasPermission("Minecon2013.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Minecon2013");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMinecon 2013 Cape activated!");
	 }
	return true;
	//==============================================
	case "Minecon2015":
			if (!$player->hasPermission("Minecon2015.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Minecon2015");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMinecon2015 Cape activated!");
	 }
	return true;
	//==============================================
	case "Minecon2016":
			if (!$player->hasPermission("Minecon2016.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Minecon2016");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMinecon 2016 Cape activated!");
	 }
	return true;
	//==============================================
	case "Minecon2019":
			if (!$player->hasPermission("Minecon2019.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Minecon2019");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMinecon 2019 Cape activated!");
	 }
	return true;
	//==============================================
	case "Mojangnew":
			if (!$player->hasPermission("Mojangnew.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Mojangnew");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMojang New Cape activated!");
	 }
	return true;
	//==============================================
	case "Mojangold":
			if (!$player->hasPermission("Mojangold.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Mojangold");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMojang Old Cape activated!");
	 }
	return true;
	//==============================================
	case "MrMessiah":
			if (!$player->hasPermission("MrMessiah.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("MrMessiah");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aMrMessiah Cape activated!");
	 }
	return true;
	//==============================================
	case "Newyear2011":
			if (!$player->hasPermission("Newyear2011.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Newyear2011");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aNew Year 2011 Cape activated!");
	 }
	return true;
	//==============================================
	case "Prismarine":
			if (!$player->hasPermission("Prismarine.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Prismarine");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aPrismarine Cape activated!");
	 }
	return true;
	//==============================================
	case "Scrolls":
			if (!$player->hasPermission("Scrolls.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Scrolls");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aScrolls Cape activated!");
	 }
	return true;
	//==============================================
	case "Turtles":
			if (!$player->hasPermission("Turtles.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Turtles");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aTurtles Cape activated!");
	 }
	return true;
	//==============================================
	case "Xmas":
			if (!$player->hasPermission("Xmas.cape")) {
					$player->sendMessage($this->noperm);
					return true;
			}else{
	$oldSkin = $player->getSkin();
	$capeData = $this->createCape("Xmas");
	$setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());
	$player->setSkin($setCape);
	$player->sendSkin();
	$player->sendMessage("§f[§bServer§f] §aX-Mas Cape activated!");
	 }
	return true;
	return true;
}}}
  return true;
}
}
