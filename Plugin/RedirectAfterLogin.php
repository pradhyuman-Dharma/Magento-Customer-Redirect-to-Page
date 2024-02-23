<?php

namespace Conceptive\Commerce\Plugin;

class RedirectAfterLogin
{
 
    public function afterExecute(
        \Magento\Customer\Controller\Account\LoginPost $subject,
        $result)
    {
        $customUrl = '/';
        $result->setPath($customUrl);
        return $result;
    }
 
}