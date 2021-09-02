<?php

namespace Ebay\Sell\Compliance\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * This type is used to provide a name-value pair, including the identifying
 * aspects of a product variation through the variationAspects container.
 */
class NameValueList extends AbstractModel
{
    /**
     * This is the name of the variation aspect, or the name of the category of
     * information that is returned through the name-value pair. The type of
     * information that appears here will vary based on the compliance type and type of
     * violation.
     *
     * @var string
     */
    public $name = null;

    /**
     * This is the value of the variation aspect (in name field), or the value of the
     * category of information that is returned through the name-value pair. The type
     * of information that appears here will vary based on the compliance type and type
     * of violation.
     *
     * @var string
     */
    public $value = null;
}
