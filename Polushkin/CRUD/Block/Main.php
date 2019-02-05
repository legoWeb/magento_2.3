<?php

namespace Polushkin\CRUD\Block;


class Main extends \Magento\Framework\View\Element\Template
{
    protected $itemFactory;
    protected $itemRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Polushkin\CRUD\Model\ItemFactory $itemFactory,
        \Polushkin\CRUD\Model\ItemRepository $itemRepository

    )
    {
        $this->itemRepository = $itemRepository;
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    public function testFunc()
    {
        $b = $this->itemRepository->getById(1);
        echo $b->getTitle() . ' ' . $b->getCreationTime();
    }
}