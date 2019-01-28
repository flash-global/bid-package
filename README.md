# Bid Package

This package provide Bidder Client integration for Objective PHP applications.

## Installation

Bid Package needs **PHP 7.0** or up to run correctly.

You will have to integrate it to your Objective PHP project with `composer require fei/bid-package`.


## Integration

As shown below, the Bid Package must be plugged in the application initialization method.

The Bid Package create a Bidder Client service that will be consumed by the application's middlewares.

```php
<?php

use ObjectivePHP\Application\AbstractApplication;
use Fei\Service\Bid\Package\BidPackage;

class Application extends AbstractApplication
{
    public function init()
    {
        /** @var AbstractApplication $this */

        // Define some application steps
        $this->addSteps('bootstrap', 'init', 'auth', 'route', 'rendering');
        
        // Initializations...

        // Plugging the Bid Package in the bootstrap step
        $this->getStep('bootstrap')
        ->plug(BidPackage::class);

        // Another initializations...
    }
}
```
### Application configuration

Create a file in your configuration directory and put your Bidder configuration as below:

```php
<?php
use Fei\Service\Bid\Package\Config\BidBaseUrl;
use Fei\Service\Bid\Package\Config\BidAuthorization;

return [
    (new BidBaseUrl())->setBaseUrl('http://bid.dev:8181'),
    (new BidAuthorization())->setAuthorization('authorizationKey')
];
```

In the previous example you need to set this configuration:

* `BidBaseUrl` : represent the URL where the API can be contacted in order to send the bids
* `BidAuthorization` : represent the Authorization Key to access on Bid Api server

Please check out `bid-client` documentation for more information about how to use this client.
