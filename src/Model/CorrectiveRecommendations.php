<?php

namespace Ebay\Sell\Compliance\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * This type is used by the correctiveRecommendations container, which is returned
 * if eBay has suggestions for how to correct the given violation.
 */
class CorrectiveRecommendations extends AbstractModel
{
    /**
     * This container is only applicable (and possibly returned) for the
     * PRODUCT_ADOPTION and PRODUCT_ADOPTION_CONFORMANCE compliance types, and since
     * eBay catalog product adoption is not enforced for any eBay category at this
     * time, the productRecommendation container will not be returned at this time.
     *
     * @var \Ebay\Sell\Compliance\Model\ProductRecommendation
     */
    public $productRecommendation = null;

    /**
     * This container is returned for ASPECTS_ADOPTION violations if eBay has found one
     * or more item aspect name-value pairs that may be appropriate for the seller's
     * product. In many cases, the missing or invalid item aspect(s) shown under the
     * corresponding violationData array, will also show up under this array with
     * suggested value(s).
     *
     * @var \Ebay\Sell\Compliance\Model\AspectRecommendations[]
     */
    public $aspectRecommendations = null;
}
