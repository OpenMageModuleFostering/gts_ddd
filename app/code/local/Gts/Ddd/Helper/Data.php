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

class Gts_Ddd_Helper_Data extends Mage_Core_Helper_Abstract {
    
    
    /**
     * Function Delete Product
     * @author GTS
     * @return String delete success or error message
     */
    
    public function delPro() {
        try{
            $table_prifix = $this->getTablePrifix();
            $dbObj = $this->getConnectionObj();
            $dbObj->query('SET FOREIGN_KEY_CHECKS = 0');
            
            $table_names = array('catalog_product_bundle_option',
                                'catalog_product_bundle_option_value',
                                'catalog_product_bundle_selection',
                                'catalog_product_entity_datetime',
                                'catalog_product_entity_decimal',
                                'catalog_product_entity_gallery',
                                'catalog_product_entity_int',
                'catalog_product_entity_media_gallery',
                'catalog_product_entity_media_gallery_value',
                'catalog_product_entity_text',
                'catalog_product_entity_tier_price',
                'catalog_product_entity_varchar',
                'catalog_product_flat_1',
                'catalog_product_link',
                'catalog_product_link_attribute',
                'catalog_product_link_attribute_decimal',
                'catalog_product_link_attribute_int',
                'catalog_product_link_attribute_varchar',
                'catalog_product_link_type',
                'catalog_product_option',
                'catalog_product_option_price',
                'catalog_product_option_title',
                'catalog_product_option_type_price',
                'catalog_product_option_type_title',
                'catalog_product_option_type_value',
                'catalog_product_super_attribute_label',
                'catalog_product_super_attribute_pricing',
                'catalog_product_super_attribute',
                'catalog_product_super_link',
                'catalog_product_enabled_index',
                'catalog_product_website',
                'catalog_product_relation',
                'catalog_category_product_index',
                'catalog_category_product',
                'cataloginventory_stock_item',
                'cataloginventory_stock_status',
                'cataloginventory_stock_status_idx',
                'cataloginventory_stock',
                'core_url_rewrite');
      
            foreach($table_names as $table_name){
                $dbObj->query('TRUNCATE TABLE `'.$table_prifix.$table_name.'`');
            }
            
            
            $dbObj->query("INSERT  INTO `".$table_prifix."catalog_product_link_type`(`link_type_id`,`code`) VALUES (1,'relation'),(2,'bundle'),(3,'super'),(4,'up_sell'),(5,'cross_sell')");
            $dbObj->query("INSERT  INTO `".$table_prifix."catalog_product_link_attribute`(`product_link_attribute_id`,`link_type_id`,`product_link_attribute_code`,`data_type`) VALUES (1,2,'qty','decimal'),(2,1,'position','int'),(3,4,'position','int'),(4,5,'position','int'),(6,1,'qty','decimal'),(7,3,'position','int'),(8,3,'qty','decimal')");
            $dbObj->query("INSERT  INTO `".$table_prifix."cataloginventory_stock`(`stock_id`,`stock_name`) VALUES (1,'Default')");
            $dbObj->query("TRUNCATE TABLE `".$table_prifix."catalog_product_entity`");
                
            $dbObj->query('SET FOREIGN_KEY_CHECKS = 1');
            
            
            return $this->__('Product has been deleted successfully !!');
            
        }  catch (Exception $e){
            Mage::log($e->getMessage(), null, 'gts.log', true);              
            return $e->getMessage();            
        }
        
    }
    
    
    /**
     * Function Delete Order
     * @author GTS
     * @return String delete success or error message
     */
    
    public function delOrd() {
        try{
            
            $tablePrefix = $this->getTablePrifix();
            $dbObj = $this->getConnectionObj();
                        
            $orderTableName = array (
                'sales_flat_order',
                'sales_flat_order_address',
                'sales_flat_order_grid',
                'sales_flat_order_item',
                'sales_flat_order_status_history',
                'sales_flat_quote',
                'sales_flat_quote_address',
                'sales_flat_quote_address_item',
                'sales_flat_quote_item',
                'sales_flat_quote_item_option',
                'sales_flat_order_payment',
                'sales_flat_quote_payment',
                'sales_flat_shipment',
                'sales_flat_shipment_item',
                'sales_flat_shipment_grid',
                'sales_flat_invoice',
                'sales_flat_invoice_grid',
                'sales_flat_invoice_item',
                'sendfriend_log',
                'tag',
                'tag_relation',
                'tag_summary',
                'wishlist',
                'log_quote',
                'report_event'
                );
             $dbObj->query('SET FOREIGN_KEY_CHECKS=0');
            
                for($ga=0;$ga<=(count($orderTableName)-1);$ga++){
                  $dbObj->query('TRUNCATE  `'.$tablePrefix.$orderTableName[$ga].'`');
                  $dbObj->query('ALTER TABLE  `'.$tablePrefix.$orderTableName[$ga].'` AUTO_INCREMENT=1');

                }
             $dbObj->query('SET FOREIGN_KEY_CHECKS = 1');
            
            return $this->__('Order has been deleted successfully !!');
            
        }  catch (Exception $e){
            Mage::log($e->getMessage(), null, 'gts.log', true);              
            return $e->getMessage();            
        }
        
    }
    
    
    
    /**
     * Function Delete Customer
     * @author GTS
     * @return String delete success or error message
     */
    
    public function delCus() {
        try{
            
            $tablePrefix = $this->getTablePrifix();
            $dbObj = $this->getConnectionObj();
                        
            $customerTableName = array (
                'customer_address_entity',
                'customer_address_entity_datetime',
                'customer_address_entity_decimal',
                'customer_address_entity_int',
                'customer_address_entity_text',
                'customer_address_entity_text',
                'customer_address_entity_varchar',
                'customer_entity',
                'customer_entity_datetime',
                'customer_entity_decimal',
                'customer_entity_int',
                'customer_entity_text',
                'customer_entity_varchar',
                'log_customer',
                'log_visitor',
                'log_visitor_info',
                'log_visitor_info',
                'eav_entity_store');
             $dbObj->query('SET FOREIGN_KEY_CHECKS=0');
            
                for($gau=0;$gau<=(count($customerTableName)-1);$gau++){ 
                    $dbObj->query('TRUNCATE  `'.$tablePrefix.$customerTableName[$gau].'`');
                    $dbObj->query('ALTER TABLE  `'.$tablePrefix.$customerTableName[$gau].'` AUTO_INCREMENT=1 ');
 
                }
                
             $dbObj->query('SET FOREIGN_KEY_CHECKS = 1');
            
            return $this->__('Customer has been deleted successfully !!');
            
        }  catch (Exception $e){
            Mage::log($e->getMessage(), null, 'gts.log', true);              
            return $e->getMessage();            
        }
        
    }
    
     /**
     * Function Delete Category
     * @author GTS
     * @return String delete success or error message
     */
    
    public function delCat() {
        
        try{  
            $categoryCollection = Mage::getModel('catalog/category')->getCollection()
                ->addFieldToFilter('level', array('gteq' => 2));

            foreach($categoryCollection as $category) {
               $category->delete();
             
            }

    
       
            return $this->__('Cateory has been deleted successfully !!');
            
        }  catch (Exception $e){
            Mage::log($e->getMessage(), null, 'gts.log', true);              
            return $e->getMessage();            
        }
        
    }
    
    /**
     * Function Empty Log Tables
     * @author GTS
     * @return String delete success or error message
     */
    
    public function delLog() {
        
        try{
             $table_prifix = $this->getTablePrifix();
             $dbObj = $this->getConnectionObj();
             $dbObj->query('SET FOREIGN_KEY_CHECKS = 0');
            
             $table_names = array('log_customer',
                                'log_quote',
                                'log_summary',
                                'log_summary_type',
                                'log_url',
                                'log_url_info',
                                'log_visitor',
                                'log_visitor_info',
                                'log_visitor_online');
           
      
                foreach($table_names as $table_name){
                    $dbObj->query('TRUNCATE TABLE `'.$table_prifix.$table_name.'`');
                }
            
             $dbObj->query('SET FOREIGN_KEY_CHECKS = 1');
            
           return $this->__('Log tables has been empty successfully !!');
            
        }  catch (Exception $e){
            Mage::log($e->getMessage(), null, 'gts.log', true);              
            return $e->getMessage();            
        }
        
    }
    
    
    /**
     * Function Empty Url Rewrite Table
     * @author GTS
     * @return String delete success or error message
     */
    
    public function delUrl() {
        
        try{  
            $table_prifix = $this->getTablePrifix();
            $dbObj = $this->getConnectionObj();
            $dbObj->query("TRUNCATE TABLE `".$table_prifix."core_url_rewrite`");
            return $this->__('Url rewrite table has been empty successfully !!');
            
        }  catch (Exception $e){
            Mage::log($e->getMessage(), null, 'gts.log', true);              
            return $e->getMessage();            
        }
        
    }
    
    
    /**
     * Function get Table Prifix
     * @author GTS
     * @return String Table Prifix
     */
    
    
    private function getTablePrifix() {
        return (string) Mage::getConfig()->getTablePrefix();
        
    }
    
    
    /**
     * Function get Database Connection
     * @author GTS
     * @return String Database Connection
     */
    
    
     private function getConnectionObj() {          
        return Mage::getSingleton('core/resource')->getConnection('core_write');
        
    }

}
