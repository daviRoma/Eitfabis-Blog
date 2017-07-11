<?php

define('SMARTY_DIR', $_SERVER['DOCUMENT_ROOT'] . '/admin/libs/');
// load Smarty library
require_once(SMARTY_DIR . 'Smarty.class.php');

/*
The setup.php file is a good place to load required application library files,
and you can do that right here. An example: require('blog/blog.lib.php');
*/

class Admin_Item extends Smarty {

    function __construct(){
        // Class Constructor.
        // These automatically get set with each new instance.

        parent::__construct();

        $this->setTemplateDir('templates/');
        $this->setCompileDir('templates_c/');
        $this->setConfigDir('configs/');
        //$this->setCacheDir('cache/');
        //$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
        $this->assign('app_name', 'Blog');
    }
}
?>
