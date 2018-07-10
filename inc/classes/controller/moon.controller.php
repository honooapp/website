<?php
ini_set("display_errors",1);
class MoonController extends Controller{
	public function setUp(){
		global $_CONFIG;
		if(!file_exists(HONOO_ROOT . 'inc/template/' . $this->lang. '/moon.tpl')){
            $this->lang = $_CONFIG['system']['default_lang'];
        }
        $this->smarty->assign("showBottle",false);

			$this->smarty->display(HONOO_ROOT.'inc/template/'.$this->lang.'/moon.tpl');
		}
}