<?php

namespace Polushkin\CRUD\Model;


class ItemRepository implements \Polushkin\CRUD\Api\ItemRepositoryInterface
{
    /**
     * @var \Polushkin\CRUD\Model\ResourceModel\Item
     */
    protected $resource;

    protected $itemFactory;

    protected $itemCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $dataObjectProcessor;

    protected $dataItemFactory;

    private $storeManager;

    private $collectionProcessor;


    /**
     * ItemRepository constructor.
     * @param ResourceModel\Item $resource
     * @param ItemFactory $itemFactory
     * @param \Polushkin\CRUD\Api\Data\ItemInterfaceFactory $dataItemFactory
     * @param ResourceModel\Item\CollectionFactory $itemCollectionFactory
     * @param \Polushkin\CRUD\Api\Data\ItemSearchResultInterfaceFactory $searchResultsFactory
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     * @param \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        \Polushkin\CRUD\Model\ResourceModel\Item $resource,
        \Polushkin\CRUD\Model\ItemFactory $itemFactory,
        \Polushkin\CRUD\Api\Data\ItemInterfaceFactory $dataItemFactory,
        \Polushkin\CRUD\Model\ResourceModel\Item\CollectionFactory $itemCollectionFactory,
        \Polushkin\CRUD\Api\Data\ItemSearchResultInterfaceFactory $searchResultsFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->itemFactory = $itemFactory;
        $this->itemCollectionFactory = $itemCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataItemFactory = $dataItemFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param \Polushkin\CRUD\Api\Data\ItemInterface $item
     * @return mixed|\Polushkin\CRUD\Api\Data\ItemInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function save(\Polushkin\CRUD\Api\Data\ItemInterface $item)
    {
        if (empty($item->getStoreId())) {
            $item->setStoreId($this->storeManager->getStore()->getId());
        }

        try {
            $this->resource->save($item);
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotSaveException(__($exception->getMessage()));
        }
        return $item;
    }


    public function getById($itemId)
    {
        $item = $this->itemFactory->create();
        $this->resource->load($item, $itemId);
        if (!$item->getId()) {
            throw new
            \Magento\Framework\Exception\NoSuchEntityException(__('Item with id "%1" does not exist.', $itemId));
        }
        return $item;
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $collection = $this->itemCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(\Polushkin\CRUD\Api\Data\ItemInterface $item)
    {
        try {
            $this->resource->delete($item);
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotDeleteException(__($exception->getMessage()));
        }
    }

    public function deleteById($itemId)
    {
        return $this->delete($this->getById($itemId));
    }

}