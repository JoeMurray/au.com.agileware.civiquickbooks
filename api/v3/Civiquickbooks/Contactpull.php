<?php

/**
 * Civiquickbooks.Contactpull API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_civiquickbooks_Contactpull_spec(&$spec) {
  $spec['start_date'] = array(
    'api.default' => 'yesterday',
    'type' => CRM_Utils_Type::T_DATE,
    'name' => 'start_date',
    'title' => 'Sync Start Date',
    'description' => 'date to start pulling from',
  );
}

/**
 * Civiquickbooks.Contactpull API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_civiquickbooks_Contactpull($params) {
  $quickbooks = new CRM_Civiquickbooks_Contact();
  $result = $quickbooks->pull($params);

  // ALTERNATIVE: $returnValues = array(); // OK, success
  // ALTERNATIVE: $returnValues = array("Some value"); // OK, return a single value

  // Spec: civicrm_api3_create_success($values = 1, $params = array(), $entity = NULL, $action = NULL)

  return civicrm_api3_create_success($result, $params,'Civiquickbooks', 'Contactpull');
}
