<?php
class Speroteck_Request_Block_Adminhtml_Request_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'request_id';
        $this->_blockGroup = 'request';
        $this->_controller = 'adminhtml_request';

        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('Speroteck_Request')->__('Save'));
        $this->_updateButton('delete', 'label', Mage::helper('Speroteck_Request')->__('Delete'));

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('Speroteck_Request')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('request_request')->getId()) {
            return Mage::helper('Speroteck_Request')->__("Edit Request '%s'", $this->escapeHtml(Mage::registry('request_request')->getTitle()));
        }
        else {
            return Mage::helper('Speroteck_Request')->__('Add Request');
        }
    }

}
