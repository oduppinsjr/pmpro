<?php

/*Add CC for PMPro admin emails
*/

function my_pmpro_email_headers_admin_emails($headers, $email) {		
	//cc emails already going to admin_email
        if(strpos($email->template, '_admin') !== false)
	{
		//add cc
		$headers[] = 'cc:' . 'email@outlook.com'; // type in your email address here please.
		// if you want to cc only one email:, replace line 12 with: $headers[] = 'cc:' . 'otheremail@domain.com';
	}
 
	return $headers;
}

add_filter('pmpro_email_headers', 'my_pmpro_email_headers_admin_emails', 10, 2);
