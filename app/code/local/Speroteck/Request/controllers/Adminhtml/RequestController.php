<?php

class Speroteck_Request_Adminhtml_RequestController extends Mage_Adminhtml_Controller_Action {

    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('request/adminhtml_request'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = (int)$this->getRequest()->getParam('request_id');
        Mage::register('request_request',Mage::getModel('request/request')->load($id));
        $blockObject = (array)Mage::getSingleton('adminhtml/session')->getBlockObject(true);
        if(count($blockObject)) {
            Mage::registry('request_request')->setData($blockObject);
        }
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('request/adminhtml_request_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('request_id');
            $request = Mage::getModel('request/request')->load($id);
            $request
                ->setData($this->getRequest()->getParams())
                ->setDate(Mage::app()->getLocale()->date())
                ->save();

            if(!$request->getId()) {
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the request');
            }
        } catch(Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($request->getData());
            return  $this->_redirect('*/*/edit',array('request_id'=>$this->getRequest()->getParam('request_id')));
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Request was saved successfully!');

        $this->_redirect('*/*/'.$this->getRequest()->getParam('back','index'),array('request_id'=>$request->getId()));
    }


    public function deleteAction()
    {
        $request = Mage::getModel('request/request')
            ->setId($this->getRequest()->getParam('request_id'))
            ->delete();
        if($request->getId()) {
            Mage::getSingleton('adminhtml/session')->addSuccess('Request was deleted successfully!');
        }
        $this->_redirect('*/*/');

    }

    public function settingsAction()
    {
        Mage::app()->getResponse()->setRedirect(Mage::helper('adminhtml')->getUrl('*/system_config/index/'));
    }

    public function stateAction() {
        $countrycode = $this->getRequest()->getParam('country');
        $state = "<option value=''>Please Select</option>";
        if ($countrycode != '') {
            $statearray = Mage::getModel('directory/region')->getResourceCollection() ->addCountryFilter($countrycode)->load();
            foreach ($statearray as $_state) {
                $state .= "<option value='" . $_state->getCode() . "'>" .  $_state->getDefaultName() . "</option>";
            }
        }
        echo $state;
    }
}