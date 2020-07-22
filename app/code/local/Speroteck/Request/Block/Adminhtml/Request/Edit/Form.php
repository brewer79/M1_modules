<?php
class Speroteck_Request_Block_Adminhtml_Request_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('requestForm');
        $this->setTitle(Mage::helper('Speroteck_Request')->__('Request Catalog Settings'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('request_request');

        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save',array('request_id'=>$this->getRequest()->getParam('request_id'))),
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );

        $form->setHtmlIdPrefix('request_');

        /**
         * fieldset General
         */
        $fieldsetGeneral = $form->addFieldset('general_fieldset', array('legend'=>Mage::helper('Speroteck_Request')->__('Request Information'), 'class' => 'fieldset-wide'));

        $fieldsetGeneral->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('Speroteck_Request')->__('Name'),
            'title'     => Mage::helper('Speroteck_Request')->__('Name'),
            'required'  => true,
        ));

        $fieldsetGeneral->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('Speroteck_Request')->__('Email'),
            'title'     => Mage::helper('Speroteck_Request')->__('Email'),
            'required'  => true,
        ));

        $fieldsetGeneral->addField('address_line_1', 'text', array(
            'name'      => 'address_line_1',
            'label'     => Mage::helper('Speroteck_Request')->__('Address 1'),
            'title'     => Mage::helper('Speroteck_Request')->__('Address 1'),
            'required'  => true,
        ));

        $fieldsetGeneral->addField('address_line_2', 'text', array(
            'name'      => 'address_line_2',
            'label'     => Mage::helper('Speroteck_Request')->__('Address 2'),
            'title'     => Mage::helper('Speroteck_Request')->__('Address 2'),
            'required'  => false,
        ));

        $fieldsetGeneral->addField('city', 'text', array(
            'name'      => 'city',
            'label'     => Mage::helper('Speroteck_Request')->__('City'),
            'title'     => Mage::helper('Speroteck_Request')->__('City'),
            'required'  => true,
        ));

        $fieldsetGeneral->addField('region', 'text', array(
            'name' => 'region',
            'label' => Mage::helper('Speroteck_Request')->__('State/Province'),
            'title' => Mage::helper('Speroteck_Request')->__('State/Province'),
            'required' => false,
        ));

        $country = $fieldsetGeneral->addField('country', 'select', array(
            'name'      => 'country',
            'label'     => Mage::helper('Speroteck_Request')->__('Country'),
            'title'     => Mage::helper('Speroteck_Request')->__('Country'),
            'values'	=> Mage::getModel('adminhtml/system_config_source_country')->toOptionArray(),
            'required'  => true,
            'onchange' => 'getstate(this)',
        ));

        $fieldsetGeneral->addField('postcode', 'text', array(
            'name'      => 'postcode',
            'label'     => Mage::helper('Speroteck_Request')->__('Post Code'),
            'title'     => Mage::helper('Speroteck_Request')->__('Post Code'),
            'required'  => true,
        ));

        $fieldsetGeneral->addField('phone', 'text', array(
            'name'      => 'phone',
            'label'     => Mage::helper('Speroteck_Request')->__('Phone'),
            'title'     => Mage::helper('Speroteck_Request')->__('Phone'),
            'class'     => 'validate-phoneStrict',
            'required' => false,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
        /*  add WYSIWYG editor */
//        protected function _prepareLayout()
//        {
//            parent::_prepareLayout();
//            if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
//                $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
//            }
//        }


}
