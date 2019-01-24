<?php
namespace Fei\Service\Bid\Package;

use Fei\Service\Bid\Client\Bidder;

/**
 * Trait BidAwareTrait
 *
 * @package Fei\Service\Bid\Package
 */
trait BidAwareTrait
{
    /** @var  Bidder */
    protected $bidder;

    /**
     * @return Bidder
     */
    public function getBidder(): Bidder
    {
        return $this->bidder;
    }

    /**
     * @param Bidder $bidder
     * @return BidAwareTrait
     */
    public function setBidder(Bidder $bidder)
    {
        $this->bidder = $bidder;
        return $this;
    }
}
