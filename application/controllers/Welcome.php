<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->setLayout('layouts/front');
    }

    public function index() {
        $this->render('welcome', ['title' => 'Welcome To CI-Starter']);
    }

}
