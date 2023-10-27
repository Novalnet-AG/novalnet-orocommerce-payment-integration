<?php

namespace Novalnet\Bundle\NovalnetBundle\PaymentMethod\View;

use Oro\Bundle\PaymentBundle\Context\PaymentContextInterface;
use Novalnet\Bundle\NovalnetBundle\Form\Type\SepaFormType;

/**
 * SEPA payment method view
 */
class NovalnetSepaView extends NovalnetView
{
    /**
     * {@inheritdoc}
     */
    public function getBlock()
    {
        return '_payment_methods_novalnet_sepa_widget';
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions(PaymentContextInterface $context)
    {
        $maskedData = [];
        $saveAccountDetails = false;

        if ($this->config->getOneclick()) {
            $maskedData = $this->novalnetHelper->getSavedAccountDetails(
                $this->doctrine,
                'DIRECT_DEBIT_SEPA',
                $context->getCustomerUser()->getId()
            );
            $saveAccountDetails = true;
        }

        $formOptions = [
            'masked_data' => $maskedData,
        ];

        $form = $this->formFactory->create(SepaFormType::class, null, $formOptions);

        return [
            'testMode' => $this->config->getTestMode(),
            'notification' => $this->config->getBuyerNotification(),
            'formView' => $form->createView(),
            'paymentMethod' => $this->config->getPaymentMethodIdentifier(),
            'saveAccountDetails' => $saveAccountDetails,
            'maskedData' => $maskedData,
            'displayLogo' => $this->config->getDisplayPaymentLogo()
        ];
    }
}
