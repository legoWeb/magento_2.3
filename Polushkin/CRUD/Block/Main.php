<?php

namespace Polushkin\CRUD\Block;


class Main extends \Magento\Framework\View\Element\Template
{
    protected $itemFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Polushkin\CRUD\Model\ItemFactory $itemFactory
    )
    {
        $this->itemFactory = $itemFactory;
        parent::__construct($context);
    }

    function _prepareLayout()
    {
        var_dump(
             'hello world'
//            get_class($this->itemFactory)
        );
        exit;
    }
}