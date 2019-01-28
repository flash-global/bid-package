<?php
namespace Fei\Service\Bid\Package\Config;

use ObjectivePHP\Config\SingleValueDirective;

/**
 * Class BidAuthorization
 * @package ObjectivePHP\Package\Bid\Config
 */
class BidAuthorization extends SingleValueDirective
{
    public function __construct(string $value = '')
    {
        parent::__construct($value);
    }

    /**
     * Set theAuthorization used by the client
     *
     * @param string $authorization
     *
     * @return BidAuthorization
     */
    public function setAuthorization(string $authorization) : self
    {
        $this->value = $authorization;

        return $this;
    }
}
