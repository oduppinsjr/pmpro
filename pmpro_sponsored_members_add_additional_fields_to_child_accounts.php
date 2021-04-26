/*
	Code demo on using pmprosm_children_fields() and pmprosm_after_child_created() hooks to add additional fields to checkout child account creation.
	Adds shipping fields to child accounts at checkout. Use PMPro Shipping Address on Membership Checkout to view
*/

function pmprosm_additional_child_fields($i, $seats)
{?><br><label>First Name</label><input type="text" name="add_sub_accounts_first_name" value="" size="20" /><br><label>Last Name</label><input type="text" name="add_sub_accounts_last_name" value="" size="20" /><br><label>Birth Date</label><input type="date" name="add_child_birth_date" value="" size="20" /><br><label>Shirt Size</label><select name="add_child_shirt_size" style="width:100%!important;" value="" size="20"><option value="Youth S">Youth S</option><option value="Youth M">Youth M</option><option value="Youth L">Youth L</option><option value="Youth XL">Youth XL</option><option value="Adult XS">Adult XS</option><option value="Adult S">Adult S</option><option value="Adult M">Adult M</option><option value="Adult L">Adult L</option><option value="Adult XL">Adult XL</option></select><br><br><label>AAU Membership #</label><input type="text" name="add_aau_membership" value="" size="20" /><br><label>Physical Limitations (if none state N/A)</label><input type="text" name="add_child_physical_limitations" value="" size="20" /><br><label>Allergies (if none state N/A)</label><input type="text" name="add_child_allergies" value="" size="20" /><?php
}

add_action('pmprosm_children_fields', 'pmprosm_additional_child_fields', 10, 2);

function pmprosm_save_additional_child_fields($child_user_id, $user_id, $i)
{
	
	if(!empty($_REQUEST['add_sub_accounts_first_name']))
		$child_first_name =	$_REQUEST['add_sub_accounts_first_name'];
	else
		$child_first_name =	'';
	
	if(!empty($_REQUEST['add_sub_accounts_last_name']))
		$child_last_name =	$_REQUEST['add_sub_accounts_last_name'];
	else
		$child_last_name =	'';
	
	if(!empty($_REQUEST['add_child_birth_date']))
		$child_birth_date =	$_REQUEST['add_child_birth_date'];
	else 
		$child_birth_date = '';
	
	if(!empty($_REQUEST['add_child_shirt_size']))
		$child_shirt_size =	$_REQUEST['add_child_shirt_size'];
	else 
		$child_shirt_size = '';
	
	if(!empty($_REQUEST['add_child_aau_membership']))
		$child_aau_membership =	$_REQUEST['add_child_aau_membership'];
	else 
		$child_aau_membership = '';
	
	if(!empty($_REQUEST['add_child_physical_limitations']))
		$child_physical_limitations =	$_REQUEST['add_child_physical_limitations'];
	else
		$child_physical_limitations = '';
	
	if(!empty($_REQUEST['add_child_allergies']))
		$child_allergies 	=	$_REQUEST['add_child_allergies'];
	else
		$child_allergies   = '';
	
	if(!empty($child_first_name))
	{
		update_user_meta($child_user_id, "pmpro_sfirstname", $child_first_name[$i]);
		update_user_meta($child_user_id, "pmpro_slastname", $child_last_name[$i]);
		update_user_meta($child_user_id, "pmpro_sbirthdate", $child_birth_date[$i]);
		update_user_meta($child_user_id, "pmpro_sshirtsize", $child_shirt_size[$i]);
		update_user_meta($child_user_id, "pmpro_saaumembership", $child_aau_membership[$i]);
		update_user_meta($child_user_id, "pmpro_sphysicallimitations", $child_physical_limitations[$i]);
		update_user_meta($child_user_id, "pmpro_sallergies", $child_allergies[$i]);
	}	
}

add_action('pmprosm_after_child_created', 'pmprosm_save_additional_child_fields', 10, 3);
