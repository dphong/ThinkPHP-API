<?php
namespace app\api\controller;
use app\index\controller\BaseController;

/**
 * Description of index
 *
 * @author HDP
 */
class Index extends BaseController {
    //put your code here
    
    function __construct() 
    {
        $this->white_rule = false;
        parent::__construct();
    }
    
    // sa
    public function sample() {
        return $this->fetch();
    }
}