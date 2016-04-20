<?php

namespace Excellence\Hello\Controller\Adminhtml\World;

class Save extends \Magento\Backend\App\Action
{
   
    
    protected $resultPageFactory = false;
    protected $resultRedirectFactory = false;
    protected $_testFactory = false;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Excellence\Hello\Model\TestFactory $testFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirectFactory = $context->getResultRedirectFactory();
        $this->_testFactory = $testFactory;
    }
    public function execute()
    {
        
        $post = $this->getRequest()->getPostValue();

        $test = $this->_testFactory->create();
        if($post['excellence_hello_test_id']){
            $test->load($post['excellence_hello_test_id']);
        }
        $test->setTitle($post['title']);
        $test->save();

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('hello/world/index');
        return $resultRedirect;

    }
}
