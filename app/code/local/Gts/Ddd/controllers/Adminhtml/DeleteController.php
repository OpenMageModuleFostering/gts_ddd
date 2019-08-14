<?php

/**
 *
 *
 * @category    Gts
 * @package     Gts_Ddd
 * @author      Gotechsolution.com (GTS)
 * @link http://www.gotechsolution.com/ 
 * @copyright   Copyright (c) 2012 (http://www.mgt-commerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Gts_Ddd_Adminhtml_DeleteController extends Mage_Adminhtml_Controller_Action
{
     
    /**
     * Function handled the delete action call & parameter 
     * @author GTS
     * @return String return success or error message
     */
    
    public function deleteAction(){
        
        $fields = $this->getRequest()->getParams();
        $msg = '';
        foreach ($fields as $key => $value) {
            if($value > 0 && $key !='key'){
               $msg .= Mage::helper('ddd')->$key().'<br />';                
            }
        }        
       	echo $msg?$msg:$this->__('Please select checkbox');
		
		}

    
}
