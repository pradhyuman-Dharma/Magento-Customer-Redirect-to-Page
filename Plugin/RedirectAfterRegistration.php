<?php

namespace Conceptive\Commerce\Plugin;

use Magento\Framework\Session\SessionManagerInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;

class RedirectAfterRegistration
{
    protected $session;
    protected $url;
    protected $resultFactory;

    public function __construct(
        SessionManagerInterface $session,
        UrlInterface $url,
        ResultFactory $resultFactory
    )
    {
        $this->session = $session;
        $this->url = $url;
        $this->resultFactory = $resultFactory;
    }

    public function aroundGetRedirect($subject, \Closure $proceed)
    {
        if ($this->session->getIsNewAccount()) {
            /** @var \Magento\Framework\Controller\Result\Redirect $result */
            $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            // Set the redirect URL to the registrationsuccesss page
            $result->setUrl($this->url->getUrl('registrationsuccess'));
            return $result;
        }

        return $proceed();
    }
}
