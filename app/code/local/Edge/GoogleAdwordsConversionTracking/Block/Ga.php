<?php
/**
 * Google AdWords Page Block
 *
 * @category   Edge
 * @package    Edge_GoogleAdwordsConversionTracking
 * @author     outer/edge Team <hello@outeredgeuk.com>
 */
class Edge_GoogleAdwordsConversionTracking_Block_Ga extends Mage_Core_Block_Template
{
    /**
     * Is ga available
     *
     * @return bool
     */
    protected function _isAvailable()
    {
        return Mage::helper('googleadwordsconversiontracking')->isGoogleAdwordsAvailable();
    }

    /**
     * Render GA tracking scripts
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->_isAvailable()) {
            return '';
        }
        return parent::_toHtml();
    }
}
