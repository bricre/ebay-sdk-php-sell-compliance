<?php

namespace Ebay\Sell\Compliance\Model;

use OpenAPI\Runtime\AbstractModel as AbstractModel;

/**
 * This type is the base type for the getListingViolationsSummary response. The
 * violationSummaries container contains an array of policy violation counts for
 * each unique eBay marketplace and compliance type violation.
 */
class ComplianceSummary extends AbstractModel
{
    /**
     * This container is an array of one or more policy violation counts. A policy
     * violation count is returned for each unique eBay marketplace and compliance type
     * violation. As long as there is at least one non-compliant listing for the
     * specified compliance type(s), this container will be returned. If no
     * non-compliant listings are found for the specified compliance type(s), an HTTP
     * status code of 204 No Content is returned, and there is no response body.
     *
     * @var \Ebay\Sell\Compliance\Model\ComplianceSummaryInfo[]
     */
    public $violationSummaries = null;
}
