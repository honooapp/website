<?php

class HomeController extends Controller
{
    public function setUp()
    {
    	global $_CONFIG;
    	if(!file_exists(HONOO_ROOT . 'inc/template/' . $this->lang. '/home.tpl')){
            $this->lang = $_CONFIG['system']['default_lang'];
        }
        $this->smarty->assign("showBottle",true);
        
        $this->smarty->display(HONOO_ROOT . 'inc/template/' . $this->lang . '/home.tpl');
    }
}