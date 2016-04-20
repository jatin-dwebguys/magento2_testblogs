<?php

namespace Excellence\Hello\Controller\Adminhtml\World;

class Validate extends \Magento\Backend\App\Action
{
   
    protected $resultJsonFactory = false;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
    }
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        

        $response = new \Magento\Framework\DataObject();
        $response->setError(0);

        $resultJson = $this->resultJsonFactory->create();
        if (strlen($post['hello_world']['title']) === 0) {
            $response->setError(true);
            $messages = [];
            $messages[] = __('Title cannot be empty');
            $response->setMessages($messages);
        }

        $resultJson->setData($response);
        return $resultJson;
    }
}
