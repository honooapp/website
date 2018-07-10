<?php

class Tools{
	public static function doPostRequest($url, $params = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        return $response;
    }

    public static function getRandSeed()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}

    public static function makeRandomString(
    $length,
    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
) {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    if ($max < 1) {
        throw new Exception('$keyspace must be at least two characters long');
    }

    for ($i = 0; $i < $length; ++$i) {
            mt_srand(self::getRandSeed());


        $str .= $keyspace[rand(0, $max)];
    }
    return $str;
}


    public static function issetIntoDb($table,$key,$value){
    	global $_CONFIG;
        $sql = mysqli_query($_CONFIG['db']['connection'],"SELECT * FROM ".$table." WHERE ".$key." = '".addslashes($value)."' LIMIT 1");
        return (mysqli_num_rows($sql) == 0) ? false : true;
    }

    public static function getTimestampFromDate($date)
    {
        $dt = DateTime::createFromFormat('d/m/Y', $date);
        if (!$dt)
            return false;
        return $dt->getTimestamp();
    }
    
    
    public static function getTimestampFromDateTime($date)
    {
        $dt = DateTime::createFromFormat('d/m/Y H:i', $date);
        if (!$dt)
            return false;
        return $dt->getTimestamp();
    }
}

function smarty_function_assignel ($_params, &$_smarty) 
{ 
    if (!isset($_params['var'])) { 
        $_smarty->trigger_error("assignel: missing 'var' parameter", E_USER_ERROR, __FILE__, __LINE__); 
        return; 
    } 
    
   if (!isset($_params['key'])) { 
        $_smarty->trigger_error("assignel: missing 'key' parameter", E_USER_ERROR, __FILE__, __LINE__); 
        return; 
    } 
    
   if (!isset($_params['value'])) { 
        $_smarty->trigger_error("assignel: missing 'value' parameter", E_USER_ERROR, __FILE__, __LINE__); 
        return; 
    } 
    
   if (isset($_smarty->_tpl_vars[$_params['var']]) && is_array($_smarty->_tpl_vars[$_params['var']])) { 
      $var = $_smarty->_tpl_vars[$_params['var']]; 
   } else { 
      $var = array(); 
   } 
    
   $var[$_params['key']] = $_params['value']; 
    
   $_smarty->assign($_params['var'], $var); 
} 