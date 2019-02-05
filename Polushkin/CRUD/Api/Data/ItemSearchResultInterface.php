<?php

namespace Polushkin\CRUD\Api\Data;

interface ItemSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * @return \Polushkin\CRUD\Api\Data\ItemInterface[]
     */
    public function getItems();

    /**
     * @param \Polushkin\CRUD\Api\Data\ItemInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}