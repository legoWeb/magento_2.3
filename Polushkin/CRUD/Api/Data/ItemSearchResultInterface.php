<?php

namespace Polushkin\CRUD\Api\Data;

interface ItemSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    public function getItems();

    public function setItems(array $items);
}