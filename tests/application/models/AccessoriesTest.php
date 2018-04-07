<?php
use PHPUnit\Framework\TestCase;

class AccessoriesTest extends TestCase {

    private $CI;
    private $accessories;

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('accessories');
        $this->item = new Accessories();
    }
}