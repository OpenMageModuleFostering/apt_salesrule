<?php
/**
 * Magento
 *
 * @category    Apt
 * @package     Apt_SalesRule
*/

class Apt_SalesRule_Model_Observer_Customer
{
    public function saveCustomer(Varien_Event_Observer $observer)
    {
        $rule = $observer->getEvent()->getRule();
        $customerId = $rule->getCustomerId();
        if(is_array($customerId))
        {
            $rule->setCustomerId(implode(',',$customerId));
        }
        return $this;
    }   
    
}