<?php
/**
 * Magento
 *
 * @category    Apt
 * @package     Apt_SalesRule
*/

class Apt_SalesRule_Model_Observer 
{
    public function addCustomerField(Varien_Event_Observer $observer)
    {
        $model = Mage::registry('current_promo_quote_rule');
        $form = $observer->getEvent()->getForm();
        $fieldset = $form->getElement('base_fieldset');
        $fieldset->addField('customer_id', 'multiselect', array(
            'name'      => 'customer_id',
            'label'     => Mage::helper('salesrule')->__('Assign Customer'),
            'title'     => Mage::helper('salesrule')->__('Assign Customer'),
            'required'  => true,
            'values'    => $this->getCustomerOption(),
        ),'customer_group_ids');
        $form->setValues($model->getData());
        return $this;
    }
    
    protected function getCustomerOption()
    {
        $collection = Mage::getResourceModel('customer/customer_collection')->addAttributeToSelect(array('firstname','lastname'));
        $option = array();
        $option[] = array('value'=> '0', 'label'=>Mage::helper('adminhtml')->__('All Customer'));
        foreach($collection as $_customer) {
            $option[] = array('value'=>$_customer->getId(), 'label'=> $_customer->getName());
        }
        return $option;
    }
}