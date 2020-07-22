<?php
class Speroteck_Tabulator_Block_Tabulator extends Mage_Catalog_Block_Product_Abstract
{
    const ATTRIBUTE_NAME = 'color';

    public function getGreenToysCollection()
    {
        $attributeValue = 'green';

        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addFieldToFilter(
                self::ATTRIBUTE_NAME,
                array(
                    'eq' => Mage::getResourceModel('catalog/product')
                        ->getAttribute(self::ATTRIBUTE_NAME)
                        ->getSource()
                        ->getOptionId($attributeValue)
                )
            );
        return $collection;
    }

    public function getRedToysCollection()
    {
        $attributeValue = 'red';

        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addFieldToFilter(
                self::ATTRIBUTE_NAME,
                array(
                    'eq' => Mage::getResourceModel('catalog/product')
                        ->getAttribute(self::ATTRIBUTE_NAME)
                        ->getSource()
                        ->getOptionId($attributeValue)
                )
            );
        return $collection;
    }

    public function getBlackToysCollection()
    {
        $attributeValue = 'black';

        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addFieldToFilter(
                self::ATTRIBUTE_NAME,
                array(
                    'eq' => Mage::getResourceModel('catalog/product')
                        ->getAttribute(self::ATTRIBUTE_NAME)
                        ->getSource()
                        ->getOptionId($attributeValue)
                )
            );
        return $collection;
    }

    public function getMagentaToysCollection()
    {
        $attributeValue = 'magenta';

        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addFieldToFilter(
                self::ATTRIBUTE_NAME,
                array(
                    'eq' => Mage::getResourceModel('catalog/product')
                        ->getAttribute(self::ATTRIBUTE_NAME)
                        ->getSource()
                        ->getOptionId($attributeValue)
                )
            );
        return $collection;
    }
}