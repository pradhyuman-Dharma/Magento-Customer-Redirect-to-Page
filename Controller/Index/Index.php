<?php

namespace Conceptive\Commerce\Controller\Index;

use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Session\SessionManagerInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultRedirectFactory;
    protected $_pageFactory;
    protected $session;

    public function __construct(
        Context $context,
        RedirectFactory $resultRedirectFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        SessionManagerInterface $session
    )
    {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->_pageFactory = $pageFactory;
        $this->session = $session;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->session->getIsNewAccount()) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('/');
            return $resultRedirect;
        }

        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->set('Registration Success');

        if ($this->session->getIsNewAccount()) {
            $this->session->unsIsNewAccount();
        }

        return $resultPage;
    }
}
