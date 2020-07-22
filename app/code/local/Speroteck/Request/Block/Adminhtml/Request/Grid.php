<?php
class Speroteck_Request_Block_Adminhtml_Request_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('requestGrid');
        $this->setDefaultSort('request_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('request/request')->getCollection();
        /* @var $collection Mage_Cms_Model_Mysql4_Block_Collection */
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('Speroteck_Request');

        $this->addColumn('request_id', array(
            'header'    => $helper->__('ID'),
            'align'     => 'center',
            'width'     => '10px',
            'index'     => 'request_id',
        ));

        $this->addColumn('date', array(
            'header'    => $helper->__('Date'),
            //'align'     =>'center',
            'width'     => '200px',
            'index'     => 'date',
        ));

        $this->addColumn('name', array(
            'header'    => $helper->__('Name'),
            //'align'     =>'center',
            'width'     => '300px',
            'index'     => 'name',
        ));

        $this->addColumn('email', array(
            'header'    => $helper->__('Email'),
            //'align'     =>'center',
            'width'     => '200px',
            'index'     => 'email',
        ));

        $this->addColumn('address_line_1', array(
            'header'    => $helper->__('Address 1'),
            //'align'     =>'center',
            'width'     => '300px',
            'index'     => 'address_line_1',
        ));

        $this->addColumn('address_line_2', array(
            'header'    => $helper->__('Address 2'),
            //'align'     =>'center',
            'width'     => '300px',
            'index'     => 'address_line_2',
        ));

        $this->addColumn('city', array(
            'header'    => $helper->__('City'),
            //'align'     =>'center',
            'width'     => '100px',
            'index'     => 'city',
        ));

        $this->addColumn('region', array(
            'header'    => $helper->__('State/Province'),
            //'align'     =>'center',
            'width'     => '150px',
            'index'     => 'region',
        ));

        $this->addColumn('country', array(
            'header'    => $helper->__('Country'),
            'index'     => 'country',
            'width'     => '150px',
            'renderer' => 'adminhtml/widget_grid_column_renderer_country',
        ));

        $this->addColumn('postcode', array(
            'header'    => $helper->__('Post code'),
            'index'     => 'postcode',
            'width'     => '50px',
        ));

        $this->addColumn('phone', array(
            'header'    => $helper->__('Phone'),
            'index'     => 'phone',
            'width'     => '150px',
        ));


        return parent::_prepareColumns();
    }


    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('request_id' => $row->getId()));
    }
}
