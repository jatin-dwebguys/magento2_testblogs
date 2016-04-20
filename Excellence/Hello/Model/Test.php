<?php
namespace Excellence\Hello\Model;
class Test extends \Magento\Framework\Model\AbstractModel implements TestInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'excellence_hello_test';
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Excellence\Hello\Model\ResourceModel\Test $resource,
        \Excellence\Hello\Model\ResourceModel\Test\Collection $resourceCollection,
        \Magento\Config\Model\ResourceModel\Config $resourceConfig,
        array $data = []
    ) {
        parent::__construct($context,$registry,$resource,$resourceCollection,$data);
    }
    protected function _construct()
    {
        $this->_init('Excellence\Hello\Model\ResourceModel\Test');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    public function loadByTitle($title){
    	if(!$title){
    		$title = $this->getTitle();
    		//random data logic. can be much more complex.
    		//this is just example
    	}
    	$id = $this->getResource()->loadByTitle($title);
    	return $this->load($id);
    }
}
