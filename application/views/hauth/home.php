<?php

$this->load->helper('url');
echo anchor(url('hauth/login/Google'), 'Login With Google.') . '<br />';

echo anchor(url('hauth/login/Twitter'), 'Login With Twitter.') . '<br />';

echo anchor(url('hauth/login/Facebook'), 'Login With Facebook.') . '<br />';

echo anchor(url('hauth/login/LinkedIn'), 'Login With LinkedIn.') . '<br />';
?>
