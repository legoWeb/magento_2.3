<?php

namespace Polushkin\CRUD\Api;

interface ItemRepositoryInterface
{

    public function save(Data\ItemInterface $item);

    public function getById($itemId);

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    public function delete(Data\ItemInterface $item);

    public function deleteById($itemId);
}