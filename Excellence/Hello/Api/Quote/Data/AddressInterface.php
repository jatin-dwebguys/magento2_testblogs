<?php

namespace Excellence\Hello\Api\Quote\Data;

interface AddressInterface
{
	/**#@-*/

	/**
     * Returns shipping address
     *
     * @return \Excellence\Hello\Api\Quote\Data\AddressInterface
     */
    public function getShipping();

    public function setShipping($data);

}
