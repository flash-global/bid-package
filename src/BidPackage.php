<?php

namespace Fei\Service\Bid\Package;

use Fei\ApiClient\AbstractApiClient;
use Fei\ApiClient\Transport\BasicTransport;
use Fei\Service\Bid\Client\Bidder;
use Fei\Service\Bid\Package\Config\BidBaseUrl;
use ObjectivePHP\Application\ApplicationInterface;
use ObjectivePHP\ServicesFactory\ServiceReference;

/**
 * Class BidPackage
 * @package Fei\Service\Bid\Package
 */
class BidPackage
{
    const DEFAULT_IDENTIFIER = 'bid.client';

    /** @var string */
    protected $identifier;

    /**
     * BidPackage constructor.
     * @param string $serviceIdentifier
     */
    public function __construct(string $serviceIdentifier = self::DEFAULT_IDENTIFIER)
    {
        $this->identifier = $serviceIdentifier;
    }

    /**
     * @param ApplicationInterface $app
     * @throws \Exception
     */
    public function __invoke(ApplicationInterface $app)
    {
        $config = $app->getConfig();

        if (!$config->has(BidBaseUrl::class)) {
            throw new \Exception('Parameter Base URL for Bid Package does not exist');
        }

        $baseUrl = $config->get(BidBaseUrl::class);

        $app->getServicesFactory()->registerService([
            'id' => 'bid.transport.basic',
            'class' => BasicTransport::class,
            'params' => [['base_uri' => $baseUrl]],
        ]);

        $setters = [
            'setTransport' => [new ServiceReference('bid.transport.basic')],
        ];

        $app->getServicesFactory()->registerService(
            [
                'id' => $this->identifier,
                'class' => Bidder::class,
                'params' => [[AbstractApiClient::OPTION_BASEURL => $baseUrl]],
                'setters' => $setters
            ]
        );
    }
}
