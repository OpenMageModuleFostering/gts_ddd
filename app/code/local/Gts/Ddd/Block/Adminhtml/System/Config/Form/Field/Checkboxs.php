<?php

class Gts_Ddd_Block_Adminhtml_System_Config_Form_Field_Checkboxs extends Mage_Adminhtml_Block_System_Config_Form_Field {

    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {

        $output = '<script>            
                    function gtsDeleteData(){
                    var result = confirm("'.$this->__("Make sure, you want to delete dummy data..").'");
                    if (result==true) {
                    var delOrd = "delOrd/0/";
                    var delPro = "delPro/0/";
                    var delCus = "delCus/0/";
                    var delCat = "delCat/0/";
                    var delUrl = "delUrl/0/";
                    var delLog = "delLog/0/";

                     if(document.getElementById("gts-delete-product").checked){
                         delPro = "delPro/1/";
                     }

                    if(document.getElementById("gts-delete-order").checked){
                         delOrd = "delOrd/1/";
                     }
                     
                    if(document.getElementById("gts-delete-customer").checked){
                         delCus = "delCus/1/";
                     }
                     
                    if(document.getElementById("gts-delete-category").checked){
                         delCat = "delCat/1/";
                     }
                     
                     if(document.getElementById("gts-delete-url").checked){
                         delUrl = "delUrl/1/";
                     }
                     
                      if(document.getElementById("gts-delete-log").checked){
                         delLog = "delLog/1/";
                     }

                    var xmlhttp;
                    if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }


                    document.getElementById("gts_delete").style = "none";
                    document.getElementById("gts_msg1").style = "block";
                    document.getElementById("gts_msg").innerHTML = "'.$this->__("Please be patient! your dummy data is deleting...").'";
                        
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("gts_msg").innerHTML = "";
                            document.getElementById("gts_delete").style = "block";
                            document.getElementById("gts_msg").innerHTML = xmlhttp.responseText;
                        }
                    }
                    
                    xmlhttp.open("GET","' . Mage::helper("adminhtml")->getUrl("ddd/adminhtml_delete/delete/") . '" + delPro + delOrd + delCus + delCat + delUrl + delLog, true);
                    xmlhttp.send();
                } 
            }
                </script>
                           

                <div id="gts_msg1" style="display:none;">
                    <ul class="messages">
                        <li class="success-msg" id="gts_msg"> </li>
                    </ul>
                </div> 

                            
               
           <div><b> <input type="checkbox" name="gts-delete-product" id="gts-delete-product" /> All Product</b> </div>
           <div><b> <input type="checkbox" name="gts-delete-order" id="gts-delete-order" /> All Order</b> </div>
           <div><b> <input type="checkbox" name="gts-delete-customer" id="gts-delete-customer" /> All Customer</b> </div>
           <div><b> <input type="checkbox" name="gts-delete-category" id="gts-delete-category" /> All Category</b> </div>
           <div><b> <input type="checkbox" name="gts-delete-url" id="gts-delete-url" /> Empty Url Rewrite Table</b> </div>
           <div><b> <input type="checkbox" name="gts-delete-log" id="gts-delete-log" /> Empty Log Tables</b> </div>
           <br />
           <br />
           <div id="gts_delete">
            <button name="gts_delete" onclick="gtsDeleteData()" class="scalable" type="button" title="Delete"><span><span><span>Remove</span></span></span></button>
           </div>'; 

        return $output . '<div class="clear"></div>';
    }

}
