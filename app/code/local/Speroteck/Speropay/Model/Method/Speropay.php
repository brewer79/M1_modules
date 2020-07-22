<?php
class Speroteck_Speropay_Model_Method_Speropay extends Mage_Payment_Model_Method_Abstract {

    protected $_code = 'speroteck_speropay';

    protected $_formBlockType = 'speroteck_speropay/form';
    protected $_infoBlockType = 'speroteck_speropay/info';

    public function getInstructions()
    {
        return trim($this->getConfigData('instructions'));
    }
}