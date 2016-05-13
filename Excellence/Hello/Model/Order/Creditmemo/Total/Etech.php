<?php

namespace Excellence\Hello\Model\Order\Creditmemo\Total;

class Etech extends \Magento\Sales\Model\Order\Creditmemo\Total\AbstractTotal
{
    public function collect(\Magento\Sales\Model\Order\Creditmemo $creditmemo)
    {
        $creditmemo->setEtechAmount(0);
        $creditmemo->setEtechBaseAmount(0);

        $totalDiscountAmount = 0;
        $baseTotalDiscountAmount = 0;

        /**
         * Checking if fee was added in previous invoices.
         * So basically if we have creditmemo with positive discount and it
         * was not canceled we don't add shipping discount to this one.
         */
        $hasFee = false;
        $fee_invoiced = 0;
        foreach ($creditmemo->getOrder()->getCreditmemosCollection() as $previousMemo) {
            if ($previousMemo->getEtechAmount() > 0) {
                $hasFee = true;
                $fee_invoiced += $previousMemo->getEtechAmount() * 1;
            }
        }

        $fee = 10;
        $creditmemo->setEtechAmount($fee - $fee_invoiced);
        $creditmemo->setEtechBaseAmount($fee - $fee_invoiced);

        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $creditmemo->getEtechAmount());
        $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $creditmemo->getEtechBaseAmount());
        return $this;
    }
}
