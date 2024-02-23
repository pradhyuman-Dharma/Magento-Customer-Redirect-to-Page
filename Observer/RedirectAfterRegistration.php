<?php
namespace Conceptive\Commerce\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Session\SessionManagerInterface;

class RedirectAfterRegistration implements ObserverInterface
{
    protected $session;

    public function __construct(
        SessionManagerInterface $session
    ) {
        $this->session = $session;
    }

    public function execute(Observer $observer)
    {
        $this->session->setIsNewAccount(true);
    }
}
