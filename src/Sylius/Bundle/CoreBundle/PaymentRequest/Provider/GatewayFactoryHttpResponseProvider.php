<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\PaymentRequest\Provider;

use Sylius\Component\Payment\Model\PaymentRequestInterface;
use Symfony\Contracts\Service\ServiceProviderInterface;

final class GatewayFactoryHttpResponseProvider extends AbstractServiceProvider
{
    /**
     * @param ServiceProviderInterface<HttpResponseProviderInterface> $locator
     */
    public function __construct(
        private GatewayFactoryNameProviderInterface $gatewayFactoryNameProvider,
        protected ServiceProviderInterface $locator,
    ) {
    }

    protected function getHttpResponseProviderIndex(PaymentRequestInterface $paymentRequest): string {
        return $this->gatewayFactoryNameProvider->provideFromPaymentRequest($paymentRequest);
    }
}
