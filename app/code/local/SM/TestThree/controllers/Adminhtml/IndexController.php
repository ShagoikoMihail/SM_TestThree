<?php


class SM_TestThree_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_title($this->__("Test Three"));
        $this->renderLayout();
    }

}