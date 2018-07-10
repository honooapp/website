<?php
class Controller
{
    
    protected $page;
    protected $controller;
    protected $action;
    protected $lang;
    protected $output;
    protected $currentURLQuery = "";
    protected $smarty;
    protected $errorHandle;
    
    public function __construct($params)
    {
    	global $_CONFIG;
        $this->smarty = new Smarty;
        
        
        $this->page       = (isset($params['page']) && !empty($params['page']) && $params['page'] > 0) ? ((int) $params['page']) : 1;
        $this->controller = (isset($params['controller']) && !empty($params['controller'])) ? $params['controller'] : "home";
        $this->action     = (isset($params['action']) && !empty($params['action'])) ? $params['action'] : null;
        $this->lang       = (isset($params['lang']) && !empty($params['lang']) && in_array($params['lang'], $_CONFIG['system']['langs'])) ? $params['lang'] : null;
        
        if (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = ($this->lang != null) ? $this->lang : $_CONFIG['system']['default_lang'];
        } else {
            $_SESSION['lang'] = ($this->lang != null) ? $this->lang : $_SESSION['lang'];
        }

        $this->lang = $_SESSION['lang'];
        
        $this->errorHandle = new SysError();
        
        
        $this->setCurrentUrlQuery();
        $this->smarty->assign("honoo_url_root", HONOO_URL);
        $this->smarty->assign("page", $this->page);
        $this->smarty->assign("controller", $this->controller);
        $this->smarty->assign("action", $this->action);
        $this->smarty->assign("lang", $this->lang);
        $this->smarty->assign("current_url_query", $this->currentURLQuery);

        $this->setUp();
    }
    
    public function setUp()
    {
        $this->output = "";
    }
    
    public function getOutput()
    {
        return $this->output;
    }

    public function setCurrentUrlQuery(){
        $this->currentURLQuery .= ($this->controller != null) ? $this->controller.'/' : '';
        $this->currentURLQuery .= ($this->action != null) ? $this->action.'/' : '';
        $this->currentURLQuery .= ($this->page != null && $this->page > 1) ? $this->page.'/' : '';
    }
}
