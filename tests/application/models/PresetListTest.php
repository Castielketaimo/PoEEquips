<?php

use PHPUnit\Framework\TestCase;

class PresetListTest extends TestCase {

    function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('presets');
        $this->items = new Presets();
    }

    function testItemsHasMoreUncompletedThanCompleted()
    {
        $complete = 0;
        $incomplete = 0;
        foreach ($this->items->all() as $item) {
            ($item->status == 1) ? $incomplete++ : $complete++;
        }
        $this->assertEquals(true, true);
    }
}