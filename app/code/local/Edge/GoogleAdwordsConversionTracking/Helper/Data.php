<?php
/**
 * Google Adwords data helper
 *
 * @category   Edge
 * @package    Edge_GoogleAdwordsConversionTracking
 */
class Edge_GoogleAdwordsConversionTracking_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Config paths for using throughout the code
     */
    const XML_PATH_ACTIVE = 'google/adwords/active';
    const XML_PATH_ID     = 'google/adwords/id';
    const XML_PATH_LABEL  = 'google/adwords/label';
    
    private $_order = null;

    /**
     * Whether GA is ready to use
     *
     * @param mixed $store
     * @return bool
     */
    public function isGoogleAdwordsAvailable($store = null)
    {
        $conversionId    = $this->getConversionId($store);
        $conversionLabel = $this->getConversionLabel($store);
        
        return $conversionId && $conversionLabel && Mage::getStoreConfigFlag(self::XML_PATH_ACTIVE, $store);
    }

    /**
     * Get AdWords conversion id
     *
     * @param string $store
     * @return string
     */
    public function getConversionId($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_ID, $store);
    }

    /**
     * Get AdWords conversion id
     *
     * @param string $store
     * @return string
     */
    public function getConversionLabel($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_LABEL, $store);
    }

    /**
     * Get last order total value
     *
     * @return string
     */
    public function getOrderGrandTotal()
    {
        $order = $this->_getOrder();
        return $order->getGrandTotal();
    }

    /**
     * Get last order currency
     *
     * @return string
     */
    public function getOrderCurrency()
    {
        $order = $this->_getOrder();
        return $order->getOrderCurrencyCode();
    }

    /**
     * Get last order total value
     *
     * @return Mage_Sales_Model_Order
     */
    private function _getOrder()
    {
        if(!$this->_order) {
            $this->_order = Mage::getSingleton('checkout/session')->getLastRealOrder();
        }
        return $this->_order;
    }
}
