<?php

require_once APPPATH . 'core/Entity.php';

class Preset extends Entity
{
    private $helmet;
    private $chest;
    private $shields;
    private $weapons;
    private $boots;
    private $gloves;

    public function setHelmet($helmet)
    {
        if (strlen($helmet) >= 30) {
            throw new Exception("Helmet name must not exceed 30 characters");
        }
        $this->helmet = $helmet;
    }

    public function getHelmet()
    {
        return $this->helmet;
    }

    public function setChest($chest)
    {
        if (strlen($chest) >= 30) {
            throw new Exception("Chest name must not exceed 30 characters");
        }
        $this->chest = $chest;
    }

    public function getChest()
    {
        return $this->chest;
    }

    public function setShields($shields)
    {
        if (strlen($shields) >= 30) {
            throw new Exception("Shield name must not exceed 30 characters");
        }
        $this->shields = $shields;
    }

    public function getShields()
    {
        return $this->shields;
    }

    public function setWeapons($weapons)
    {
        if (strlen($weapons) >= 30) {
            throw new Exception("Weapon name must not exceed 30 characters");
        }
        $this->weapons = $weapons;
    }

    public function getWeapons()
    {
        return $this->weapons;
    }

    public function setBoots($boots)
    {
        if (strlen($boots) >= 30) {
            throw new Exception("Boots name must not exceed 30 characters");
        }
        $this->boots = $boots;
    }

    public function getBoots()
    {
        return $this->boots;
    }

    public function setGloves($gloves)
    {
        if (strlen($gloves) >= 30) {
            throw new Exception("Gloves name must not exceed 30 characters");
        }
        $this->gloves = $gloves;
    }

    public function getGloves()
    {
        return $this->gloves;
    }
}