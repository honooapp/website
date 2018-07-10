<?php

class UploadController extends Controller
{
    public function setUp()
    {
        global $_CONFIG;
        $success = false;
        switch ($this->action) {
            case 'send':
                
                //check google captcha
                if (count($_POST) > 0) {
                    
                    $description = (isset($_POST['description']) && !empty($_POST['description'])) ? $_POST['description'] : null;
                    $image       = (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) ? $_FILES['image'] : null;

                    if ($description != null) {
                        if (strlen($description) <= 144) {
                            if ($image != null) {
                                
                                
                                $captchaResponse = Tools::doPostRequest("https://www.google.com/recaptcha/api/siteverify", array(
                                    "secret" => $_CONFIG['vendor']['google']['secret'],
                                    "response" => $_POST['g-recaptcha-response'],
                                    "remoteip" => $_SERVER['REMOTE_ADDR']
                                ));
                                
                                if ($gResponse = json_decode($captchaResponse, 1)) {
                                    if (isset($gResponse['success']) && $gResponse['success'] == true) {
                                        //check image
                                        
                                        do {
                                            $imageName = strtolower(Tools::makeRandomString(60)) . ".jpg";
                                            
                                        } while (Tools::issetIntoDb("posts", "image", $imageName) && !file_exists(HONOO_IMAGE_PATH . $imageName));
                                        
                                        $uploadHandle = new Upload($_FILES['image']);
                                        
                                        
                                        if ($uploadHandle->uploaded) {
                                            
                                            
                                            $uploadHandle->Process(HONOO_IMAGE_PATH);
                                            $info = getimagesize($uploadHandle->file_dst_pathname);
                                            if (in_array($info['mime'], $_CONFIG['system']['allowedMimes'])) {
                                                if ($uploadHandle->processed) {
                                                    rename(HONOO_IMAGE_PATH . $uploadHandle->file_dst_name, HONOO_IMAGE_PATH . $imageName);
                                                    $uploadHandle->Clean();
                                                    //insert into db
                                                    $newHonooQuery = "INSERT INTO posts (description,image,ip_address,active,language,date_creation) 
                                                    VALUES ('" . mysqli_real_escape_string($_CONFIG['db']['connection'], $_POST['description']) . "',
                                                    '" . $imageName . "',
                                                    '" . $_SERVER['REMOTE_ADDR'] . "',
                                                    '1',
                                                    '" . $this->lang . "',
                                                    '" . date("Y-m-d H:i:s", time()) . "'
                                                    )";
                                                    
                                                    $insertHonoo = mysqli_query($_CONFIG['db']['connection'], $newHonooQuery);
                                                    if ($insertHonoo) {
                                                        $success = true;
                                                    } else {
                                                        $this->errorHandle->setError("error-saving-db");
                                                    }
                                                } else {
                                                    $this->errorHandle->setError("error-saving-image");
                                                    
                                                }
                                            } else {
                                                $this->errorHandle->setError("error-image-mime");
                                            }

                                           
                                        } else {
                                            $this->errorHandle->setError("error-uploading-image");
                                        }
                                    } else {
                                        $this->errorHandle->setError("invalid-captcha");
                                    }
                                } else {
                                    $this->errorHandle->setError("invalid-captcha");
                                }
                            } else {
                                $this->errorHandle->setError("image-missing");
                            }
                        } else {
                            $this->errorHandle->setError("description-too-long");
                        }
                    } else {
                        $this->errorHandle->setError("description-missing");
                    }
                    $this->smarty->assign("post", "");
                }
                break;
        }

        if(isset($uploadHandle->file_dst_name) && !empty($uploadHandle->file_dst_name) && !$success) unlink(HONOO_IMAGE_PATH . $uploadHandle->file_dst_name);
        $this->smarty->assign("success", $success);
        $this->smarty->assign("errors", $this->errorHandle->getErrors());
        $this->smarty->assign("showBottle",false);
        if(!file_exists(HONOO_ROOT . 'inc/template/' . $this->lang. '/upload.tpl')){
            $this->lang = $_CONFIG['system']['default_lang'];
        }
        $this->smarty->display(HONOO_ROOT . 'inc/template/' . $this->lang . '/upload.tpl');
    }
}