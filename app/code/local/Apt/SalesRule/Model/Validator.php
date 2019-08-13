<?php
/**
 * Magento
 *
 * @category    Apt
 * @package     Apt_SalesRule
 */
class Apt_SalesRule_Model_Validator extends Mage_SalesRule_Model_Validator
{
    
    protected function _canProcessRule($rule, $address)
    {
        $customerId = $address->getQuote()->getCustomerId();
        $allowCustomerIds = explode(',',$rule->getCustomerId());
        
        
        
        if(!in_array($customerId, $allowCustomerIds) && !in_array(0, $allowCustomerIds)) {
            $address->getQuote()->setCouponCode(NULL);
            $rule->setIsValidForAddress($address, false);
            return false;
        }
        else{
            return parent::_canProcessRule($rule, $address);
        }

    }
}