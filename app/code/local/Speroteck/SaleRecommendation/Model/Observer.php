<?php
class Speroteck_SaleRecommendation_Model_Observer
{
    /**
     * Listen "checkout_type_onepage_save_order" event
     *
     * @param Varien_Event_Observer $observer
     * @return Speroteck_SaleRecommendation_Model_Observer
     */
    public function addSaleRecommendation(Varien_Event_Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $request = Mage::app()->getRequest();
        $comments = strip_tags($request->getParam('sale_recommendation'));
        if(!empty($comments)){
            $order->setData('sale_recommendation', $comments)->save();
        }
        return $this;
    }
}