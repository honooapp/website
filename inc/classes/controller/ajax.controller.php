<?php

class AjaxController extends Controller
{
    public function setUp()
    {
        global $_CONFIG;
        $this->setJsonContentType();
        $result = array();
        switch ($this->action) {
            case 'getPosts':

                if ($this->page != null) {
                    $numRowsQuery = mysqli_query($_CONFIG['db']['connection'], "SELECT COUNT(id) AS post_count FROM posts WHERE active = '1'");
                    if ($numRowsQuery) {
                        $numRows  = mysqli_fetch_array($numRowsQuery);
                        $numRows  = (int) $numRows['post_count'];
                        $numPages = floor($numRows / $_CONFIG['system']['max_num_posts']);
                        if ($this->page <= $numPages) {
                            $fromIndex = ($this->page - 1) * $_CONFIG['system']['max_num_posts'];
                            
                            $getPostsQuery = mysqli_query($_CONFIG['db']['connection'], "SELECT * FROM posts WHERE active = '1' ORDER BY id DESC LIMIT " . $fromIndex . "," . $_CONFIG['system']['max_num_posts']);
                            if($getPostsQuery && mysqli_num_rows($getPostsQuery) > 0){
                                while($post = mysqli_fetch_array($getPostsQuery)){
                                    $result['posts'][] = array("id" => $post['id'], "description" => $post['description'],"image" => $post['image']);
                                }
                            }else{
                                $this->errorHandle->setError("error-reading-db");
                            }
                        }else{
                            $this->errorHandle->setError("limit-reached");
                        }
                    }else{
                        $this->errorHandle->setError("error-reading-num");
                    }
                }else{
                    $this->errorHandle->setError("page-not-valid");
                }
                break;

                default:
                    $this->errorHandle->setError("action-not-valid");
                break;
        }
        $result['errors'] = $this->errorHandle->getErrors();
        $result['currentPage'] = $this->page;
        $this->output = json_encode($result);
    }
    
    function setJsonContentType()
    {
        header('Content-Type: application/json');
    }
}