<?php

namespace Excellence\Hello\Model\Quote\Address\Total;

use Magento\Quote\Model\Quote\Address;
use Magento\Quote\Model\Quote\Address\Item as AddressItem;
use Magento\Quote\Model\Quote\Item;

class Etech extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

    protected $_request = false;
    public function __construct(
        \Magento\Framework\App\Request\Http $request)
    {
        $this->_request = $request;        
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);

        $address = $shippingAssignment->getShipping()->getAddress();
        $method = $shippingAssignment->getShipping()->getMethod();

       
        $total->setTotalAmount($this->getCode(), 0);
        $total->setBaseTotalAmount($this->getCode(), 0);

        if (!count($shippingAssignment->getItems())) {
            return $this;
        }

        //only from admin create order page
        $post = $this->_request->getPostValue();

        $amountPrice = 10;

        $var = $this->getCode()."_fee";
        if(isset($post[$var])){
            $amountPrice = $post[$var] * 1;
        }

        $total->setTotalAmount($this->getCode(), $amountPrice);
        $total->setBaseTotalAmount($this->getCode(), $amountPrice);
        $total->setEtechAmount($amountPrice);
        $total->setEtechBaseAmount($amountPrice);
        return $this;
    }

    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        $amount = $total->getEtechAmount();
        $title = __('Etech Fee');

        return [
            'code' => $this->getCode(),
            'title' => $title,
            'value' => $amount
        ];
    }

    public function getLabel()
    {
        return __('Etech');
    }
}
