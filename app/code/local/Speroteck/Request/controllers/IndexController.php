<?php
class Speroteck_Request_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function sendAction()
    {
        if ( $this->getRequest()->getPost() ) {
            //$postData = $this->getRequest()->getPost();
            $requestModel = Mage::getModel('request/request');
            $requestModel->setId($this->getRequest()->getParam('request_id'))
                ->setData($this->getRequest()->getParams())
                ->setDate(Mage::app()->getLocale()->date())
                ->save();
            Mage::getSingleton('core/session')->addSuccess($this->__('Your message was sent'));
            $this->_redirect('*/*');
        }
    }
}
