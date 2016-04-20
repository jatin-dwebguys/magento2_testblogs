<?php

namespace Excellence\Hello\Controller\Adminhtml\World;

class Edit extends \Magento\Backend\App\Action
{
   
    protected $resultRedirectFactory = false;
    protected $registry = false;
    protected $testFactory = false;
    protected $resultPageFactory = false;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $registry,
        \Excellence\Hello\Model\TestFactory $testFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->resultRedirectFactory = $context->getResultRedirectFactory();
        $this->registry = $registry;
        $this->testFactory = $testFactory;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        
        $model = $this->testFactory->create();
        if ($id) {
            $model->load($id);
        }

        $this->registry->register('hello_edit',$model);
        
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Excellence_hello::hello')
            ->addBreadcrumb(__('Hello'), __('Page'))
            ->addBreadcrumb(__('Manage Pages'), __('Manage Pages'));

        return $resultPage;

    }
}
