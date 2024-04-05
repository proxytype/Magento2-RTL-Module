<?php
namespace Rudenet\RTL\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Page\Config as PageConfig;

class RTL extends Template
{
    protected $scopeConfig;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        PageConfig $pageConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
        $this->pageConfig = $pageConfig;
    }

    public function isEnabled(): bool
    {
        return (bool)$this->scopeConfig->getValue('general/locale_options/rtl_flag');
    }

    public function addCustomCss()
    {
	 return $this->getViewFileUrl('Rudenet_RTL::css/rtl.css');    
    }
}