<?php
namespace Excellence\Hello\Block;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class Incr extends \Magento\Ui\Component\Listing\Columns\Column
{    
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $data['disabled'] = true;
        parent::__construct($context, $uiComponentFactory,$components, $data);
    }

    
}