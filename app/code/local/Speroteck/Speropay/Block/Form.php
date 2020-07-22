<?php

class Speroteck_Speropay_Block_Form extends Mage_Payment_Block_Form
{
    protected $_instructions;

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('speroteck/speropay/form.phtml');
    }
}