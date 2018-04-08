<?php
use PHPUnit\Framework\TestCase;

class PresetTest extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('preset');
        $this->item = new Preset();
    }

    function testSetHelmet()
    {
        $this->item->setHelmet("King Helmet");
        $this->assertEquals("King Helmet", $this->item->getHelmet());
        $this->expectException(Exception::class);
        $this->item->setHelmet("DSAFdsfswderegeggtrhrthwefregrthththtrhtrht");
    }

    function testSetChest()
    {
        $this->item->setChest("King Chest");
        $this->assertEquals("King Chest", $this->item->getChest());
        $this->expectException(Exception::class);
        $this->item->setChest("DSAFdsfswderegeggtrhrthsdadadsadsdasdasadewrr");
    }

    function testSetShields()
    {
        $this->item->setShields("King Shields");
        $this->assertEquals("King Shields", $this->item->getShields());
        $this->expectException(Exception::class);
        $this->item->setShields("DSAFdsfswderegeggtrhrthdsadsdedwfergregerger");
    }

    function testSetWeapons()
    {
        $this->item->setWeapons("King Weapons");
        $this->assertEquals("King Weapons", $this->item->getWeapons());
        $this->expectException(Exception::class);
        $this->item->setWeapons("DSAFdsfswderegeggtrhrthdsadsdedwfergregerger");
    }

    function testSetBoots()
    {
        $this->item->setBoots("King Boots");
        $this->assertEquals("King Boots", $this->item->getBoots());
        $this->expectException(Exception::class);
        $this->item->setBoots("DSAFdsfswderegeggtrhrthdsadsdedwfergregerger");
    }

    function testSetGloves()
    {
        $this->item->setGloves("King Gloves");
        $this->assertEquals("King Gloves", $this->item->getGloves());
        $this->expectException(Exception::class);
        $this->item->setGloves("DSAFdsfswderegeggtrhrthdsadsdedwfergregerger");
    }
}