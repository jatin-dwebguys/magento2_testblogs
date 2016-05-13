<?php
 
 
namespace Excellence\Hello\Observer;
 
use \Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
 
 
class ToOrder implements ObserverInterface
{
    
    protected $logger;
 
   
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
 
    public function execute(Observer $observer)
    {
        $order = $observer->getOrder();
        $quote = $observer->getQuote();
        if($quote->isVirtual()){
            $order->setEtechAmount($quote->getBillingAddress()->getEtechAmount());
            $order->setEtechBaseAmount($quote->getBillingAddress()->getEtechBaseAmount());
        }else{  
            $order->setEtechAmount($quote->getShippingAddress()->getEtechAmount());
            $order->setEtechBaseAmount($quote->getShippingAddress()->getEtechBaseAmount());
        }
        //might fail in multi address checkout need to test
        
    }
}