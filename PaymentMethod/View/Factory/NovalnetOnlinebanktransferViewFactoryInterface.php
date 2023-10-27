<?php

namespace Novalnet\Bundle\NovalnetBundle\PaymentMethod\View\Factory;

use Novalnet\Bundle\NovalnetBundle\PaymentMethod\Config\NovalnetOnlinebanktransferConfigInterface;
use Oro\Bundle\PaymentBundle\Method\View\PaymentMethodViewInterface;

/**
 * Novalnet payment method view provider factory interface
 */
interface NovalnetOnlinebanktransferViewFactoryInterface
{
    /**
     * @param NovalnetOnlinebanktransferConfigInterface $config
     * @return PaymentMethodViewInterface
     */
    public function create(NovalnetOnlinebanktransferConfigInterface $config);
}
