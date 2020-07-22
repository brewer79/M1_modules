<?php
class Speroteck_Request_Model_Resource_Request extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct()
    {
        $this->_init('request/request', 'request_id');
    }
}