<?php

namespace Excellence\Hello\Block\Adminhtml\Invoice;

class Totals extends \Magento\Sales\Block\Order\Invoice\Totals
{
    public function initTotals()
    {
        $total = new \Magento\Framework\DataObject(
            [
                'code' => 'etech',
                'strong' => false,
                'value' => $this->getSource()->getEtechAmount(),
                'base_value' => $this->getSource()->getEtechBaseAmount(),
                'label' => __('Etech Fee')
            ]
        );

        $this->getParentBlock()->addTotal($total,'subtotal');
        //add after subtotal
        return $this;
    }
}
