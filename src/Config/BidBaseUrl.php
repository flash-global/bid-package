<?php
namespace Fei\Service\Bid\Package\Config;

use ObjectivePHP\Config\SingleValueDirective;

/**
 * Class BidParam
 * @package ObjectivePHP\Package\Bid\Config
 */
class BidBaseUrl extends SingleValueDirective
{
    public function __construct(string $value = '')
    {
        parent::__construct($value);
    }

    /**
     * Set the Base Url used by the client
     *
     * @param string $baseUrl
     *
     * @return BidBaseUrl
     */
    public function setBaseUrl(string $baseUrl) : self
    {
        $this->value = $baseUrl;

        return $this;
    }
}
