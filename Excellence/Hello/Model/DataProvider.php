<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Excellence\Hello\Model;


use Excellence\Hello\Model\ResourceModel\Test\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    /**
     * @var \Excellence\Hello\Model\ResourceModel\Test\Collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;


    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $testCollectionFactory,
        // DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $testCollectionFactory->create();
        // $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        foreach ($this->collection->getAllIds() as $pageId) {
            $page = $this->collection->getNewEmptyItem();
            /** Load every record separately to make sure the list of associated stores is available */
            $this->loadedData[$pageId]['test'] = $page->load($pageId)->getData();
        }

        // $data = $this->dataPersistor->get('hello_world');
        // if (!empty($data)) {
        //     $page = $this->collection->getNewEmptyItem();
        //     $page->setData($data);
        //     $this->loadedData[$page->getId()] = $page->getData();
        //     $this->dataPersistor->clear('hello_world');
        // }
        return $this->loadedData;
    }

}
