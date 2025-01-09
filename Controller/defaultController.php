<?php
class defaultController {
    public function __construct() {}

    public function display() {
        $page = 'home';
        require('./View/default.php');
    }
}