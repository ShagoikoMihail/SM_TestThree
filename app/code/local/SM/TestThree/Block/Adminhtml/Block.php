<?php

class SM_TestThree_Block_Adminhtml_Block extends Mage_Catalog_Block_Product
{
    public function getCountProductLessThree()
    {
        $_productCollection = Mage::getModel('catalog/category')
            ->getCollection()
            ->addFieldToFilter('entity_id', array('from' => 2))
            ->addAttributeToSelect("*");

        return $_productCollection;
    }

    public function getProductsCollectionByPrice($id)
    {
        $catagory_model = Mage::getModel('catalog/category')->load($id);
        $collection = Mage::getResourceModel('catalog/product_collection');
        $collection->addCategoryFilter($catagory_model);
        $collection->addAttributeToFilter('price', array('gt' => 10));
        $collection->addAttributeToSelect("*");
        $collection->addStoreFilter();

        return $collection;
    }

    public function getProductsCollectionByQty($id)
    {
        $catagory_model = Mage::getModel('catalog/category')->load($id);
        $_products = Mage::getModel('catalog/product')
            ->getCollection()
            ->addCategoryFilter($catagory_model)
            ->addAttributeToSelect('*')
            ->joinField('qty',
                'cataloginventory/stock_item',
                'qty',
                'product_id=entity_id',
                '{{table}}.stock_id=1',
                'left')
            ->addAttributeToFilter('qty', array('ln' => 3));

        return $_products;
    }

    public function getProductsCollectionByName($id)
    {
        $catagory_model = Mage::getModel('catalog/category')->load($id);
        $_products = Mage::getModel('catalog/product')
            ->getCollection()
            ->addCategoryFilter($catagory_model)
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('name', array('like' => '%'."a".'%'));

        return $_products;
    }

}