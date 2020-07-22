<?php
//grid container
class Speroteck_Request_Block_Adminhtml_Request extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_request';
        $this->_blockGroup = 'request';
        $this->_headerText = Mage::helper('Speroteck_Request')->__('Catalog Requests');
        $this->_addButtonLabel = Mage::helper('Speroteck_Request')->__('Add Request');
        parent::__construct();
    }
}
