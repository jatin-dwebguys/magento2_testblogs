<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Excellence\Hello\Model\Quote;


class Address implements
    \Excellence\Hello\Api\Quote\Data\AddressInterface
{

    
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
    }

    /*
    * @return array
    */
    public function getShipping(){

    }
    public function setShipping($data){

    }

}
