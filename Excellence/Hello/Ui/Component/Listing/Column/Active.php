<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Excellence\Hello\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Customer\Model\Visitor;

/**
 * Class Type
 */
class Active extends Column
{
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return void
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $col = $this->getData('name');
                
                if($item[$col] == 1){
                    $item[$col] = 'Active'; 
                }else{
                    $item[$col] = 'In-Active'; 
                }
                
            }
        }
        return $dataSource;
    }
}
