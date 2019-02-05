<?php

namespace Polushkin\CRUD\Api;

interface ItemRepositoryInterface
{

    /**
     * @param Data\ItemInterface $item
     * @return mixed
     */
    public function save(Data\ItemInterface $item);

    /**
     * @param $itemId
     * @return mixed
     */
    public function getById($itemId);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param Data\ItemInterface $item
     * @return mixed
     */
    public function delete(Data\ItemInterface $item);

    /**
     * @param $itemId
     * @return mixed
     */
    public function deleteById($itemId);
}