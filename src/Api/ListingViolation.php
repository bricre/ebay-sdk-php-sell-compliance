<?php

namespace Ebay\Sell\Compliance\Api;

use Ebay\Sell\Compliance\Model\SuppressViolationRequest as SuppressViolationRequest;
use OpenAPI\Runtime\AbstractAPI as AbstractAPI;

class ListingViolation extends AbstractAPI
{
    /**
     * This call returns specific listing violations for the supported listing
     * compliance types. Only one compliance type can be passed in per call, and the
     * response will include all the listing violations for this compliance type, and
     * listing violations are grouped together by eBay listing ID. See
     * ComplianceTypeEnum for more information on the supported listing compliance
     * types. This method also has pagination control. Note: A maximum of 2000 listing
     * violations will be returned in a result set. If the seller has more than 2000
     * listing violations, some/all of those listing violations must be corrected
     * before additional listing violations will be retrieved. The user should pay
     * attention to the total value in the response. If this value is '2000', it is
     * possible that the seller has more than 2000 listing violations, but this field
     * maxes out at 2000. Note: In a future release of this API, the seller will be
     * able to pass in a specific eBay listing ID as a query parameter to see if this
     * specific listing has any violations. Note: Only mocked non-compliant listing
     * data will be returned for this call in the Sandbox environment, and not specific
     * to the seller. However, the user can still use this mock data to experiment with
     * the compliance type filters and pagination control.
     *
     * @param array $queries options:
     *                       'compliance_type'	string	A seller uses this query parameter to retrieve listing
     *                       violations of a specific compliance type. Only one compliance type value should
     *                       be passed in here. See ComplianceTypeEnum for more information on the compliance
     *                       types that can be passed in here. If the listing_id query parameter is used, the
     *                       compliance_type query parameter {if passed in) will be ignored. This is because
     *                       all of a listing's policy violations {each compliance type) will be returned if
     *                       a listing_id is provided. Either the listing_id or a compliance_type query
     *                       parameter must be used, and if the seller only wants to view listing violations
     *                       of a specific compliance type, both of these parameters can be used. Note: The
     *                       listing_id query parameter is not yet available for use, so the seller does not
     *                       have the ability to retrieve listing violations for one or more specific
     *                       listings. Until the listing_id query parameter becomes available, the
     *                       compliance_type query parameter is required with each getListingViolations call.
     *                       'offset'	string	The integer value input into this field controls the first
     *                       listing violation in the result set that will be displayed at the top of the
     *                       response. The offset and limit query parameters are used to control the
     *                       pagination of the output. For example, if offset is set to 10 and limit is set
     *                       to 10, the call retrieves listing violations 11 thru 20 from the resulting set
     *                       of violations. Note: This feature employs a zero-based index, where the first
     *                       item in the list has an offset of 0. If the listing_id parameter is included in
     *                       the request, this parameter will be ignored. Default: 0 {zero)
     *                       'listing_id'	string	Note: This query parameter is not yet supported for the
     *                       Compliance API. Please note that until this query parameter becomes available,
     *                       the compliance_type query parameter is required with each getListingViolations
     *                       call. This query parameter is used if the user wants to view all listing
     *                       violations for one or more eBay listings. The string value passed into this
     *                       field is the unique identifier of the listing, sometimes referred to as the Item
     *                       ID. Either the listing_id or a compliance_type query parameter must be used, and
     *                       if the seller only wants to view listing violations of a specific compliance
     *                       type, both of these parameters can be used. Up to 50 listing IDs can be
     *                       specified with this query parameter, and each unique listing ID is separated
     *                       with a comma.
     *                       'limit'	string	This query parameter is used if the user wants to set a limit on
     *                       the number of listing violations that are returned on one page of the result
     *                       set. This parameter is used in conjunction with the offset parameter to control
     *                       the pagination of the output. For example, if offset is set to 10 and limit is
     *                       set to 10, the call retrieves listing violations 11 thru 20 from the collection
     *                       of listing violations that match the value set in the compliance_type parameter.
     *                       Note: This feature employs a zero-based index, where the first item in the list
     *                       has an offset of 0. If the listing_id parameter is included in the request, this
     *                       parameter will be ignored. Default: 100 Maximum: 200
     *                       'filter'	string	This filter allows a user to retrieve only listings that are
     *                       currently out of compliance, or only listings that are at risk of becoming out
     *                       of compliance. Although other filters may be added in the future,
     *                       complianceState is the only supported filter type at this time. The two
     *                       compliance 'states' are OUT_OF_COMPLIANCE and AT_RISK. Below is an example of
     *                       how to set up this compliance state filter. Notice that the filter type and
     *                       filter value are separated with a colon (:) character, and the filter value is
     *                       wrapped with curly brackets. filter=complianceState:{OUT_OF_COMPLIANCE}
     *
     * @return mixed
     */
    public function gets(array $queries = [])
    {
        return $this->client->request('getListingViolations', 'GET', 'listing_violation',
            [
                'query' => $queries,
            ]
        );
    }

    /**
     * This call suppresses a listing violation for a specific listing. Only listing
     * violations in the AT_RISK state (returned in the violations.complianceState
     * field of the getListingViolations call) can be suppressed. Note: At this time,
     * the suppressViolation call only supports the suppressing of ASPECTS_ADOPTION
     * listing violations in the AT_RISK state. In the future, it is possible that this
     * method can be used to suppress other listing violation types. A successful call
     * returns a http status code of 204 Success. There is no response payload. If the
     * call is not successful, an error code will be returned stating the issue.
     *
     * @param SuppressViolationRequest $Model this type is the base request type of the
     *                                        SuppressViolation method
     *
     * @return mixed
     */
    public function suppressViolation(SuppressViolationRequest $Model)
    {
        return $this->client->request('suppressViolation', 'POST', 'suppress_listing_violation',
            [
                'json' => $Model->getArrayCopy(),
            ]
        );
    }
}
