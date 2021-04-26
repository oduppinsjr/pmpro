<?php

/**
 * Add custom fields to Paid Memberships Pro checkout page.
 * Must have PMPro & Register Helper Add On installed and activated to work.
 * Add this code to a PMPro Customizations Plugin or Code Snippets plugin.
 */

function pmpro_add_fields_to_checkout(){
	//don't break if Register Helper is not loaded
	if(!function_exists( 'pmprorh_add_registration_field' )) {
		return false;
	}
	
	$fields = array();
	$fields[] = new PMProRH_Field(
		'insurance_company',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Insurance Company',		// custom field label
			'profile'	=> true,		// show in user profile
			'required'	=> true,		// make this field required
			'showrequired'	=> true,		// show this field required
			'memberslistcsv' => true,   // add to csv export
			'hint'      => 'Enter the name of the insurance company. If none, enter N/A.',
		)
			);
	
	$fields[] = new PMProRH_Field(
		'insurance_policy_holder',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Policy Holder',	// custom field label
			'profile'	=> true,		// show in user profile
			'required'	=> true,		// make this field required
			'showrequired'	=> true,		// show this field required
			'memberslistcsv' => true,   // add to csv export
			'hint'      => 'Enter the name of the policy holder. If none, enter N/A.',
		)
			);
	
	
	$fields[] = new PMProRH_Field(
		'insurance_group_number',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Group #',	// custom field label
			'profile'	=> true,	// show in user profile
			'required'	=> true,	// make this field required
			'showrequired'	=> true,		// show this field required
			'memberslistcsv' => true,   // add to csv export
			'hint'      => 'Enter the group #. If none, enter N/A.',
		)
			);
	
	$fields[] = new PMProRH_Field(
		'insurance_policy_number',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Policy #',	// custom field label
			'profile'	=> true,	// show in user profile
			'required'	=> true,	// make this field required
			'showrequired'	=> true,		// show this field required
			'memberslistcsv' => true,   // add to csv export
			'hint'      => 'Enter the policy #. If none, enter N/A.',
		)
			);
	
	$fields[] = new PMProRH_Field(
		'insurance_company_phone',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Insurance Company Phone #',	// custom field label
			'profile'	=> true,	// show in user profile
			'required'	=> true,	// make this field required
			'showrequired'	=> true,		// show this field required
			'memberslistcsv' => true,   // add to csv export
			'hint'      => 'Enter the telephone #. If none enter N/A.',
		)
			);

	//add the fields to default forms
	foreach($fields as $field){
		pmprorh_add_registration_field(
			'checkout_boxes', // location on checkout page
			$field	// PMProRH_Field object
		);
	}
}
add_action( 'init', 'pmpro_add_fields_to_checkout' );
