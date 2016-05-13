<?php

namespace Excellence\Hello\Model\Order\Invoice\Total;

class Etech extends \Magento\Sales\Model\Order\Invoice\Total\AbstractTotal
{
    public function collect(\Magento\Sales\Model\Order\Invoice $invoice)
    {
        $invoice->setEtechAmount(0);
        $invoice->setEtechBaseAmount(0);

        $totalDiscountAmount = 0;
        $baseTotalDiscountAmount = 0;

        /**
         * Checking if fee was added in previous invoices.
         * So basically if we have invoice with positive discount and it
         * was not canceled we don't add shipping discount to this one.
         */
        $hasFee = false;
        $fee_invoiced = 0;
        foreach ($invoice->getOrder()->getInvoiceCollection() as $previousInvoice) {
            if ($previousInvoice->getEtechAmount() > 0) {
                $hasFee = true;
                $fee_invoiced += $previousInvoice->getEtechAmount() * 1;
            }
        }

        $fee = 10;
        $invoice->setEtechAmount($fee - $fee_invoiced);
        $invoice->setEtechBaseAmount($fee - $fee_invoiced);
        
        $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getEtechAmount());
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getEtechBaseAmount());
        return $this;
    }
}
