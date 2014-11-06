<?php


function listing_data($listing_id) {
	$data = array();
	$listing_id = (int)$listing_id;

	$func_get_args = func_get_args();

	unset($func_get_args[0]);

	$fields = '`' . implode('`, `', $func_get_args) . '`';
	$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `listings` WHERE `id` = $listing_id"));


return $data;
}

function add_listing ($name, $type, $street_address, $city, $state, $info, $zip, $contact_phone1, $contact_website, $price, $hours, $tag){
    $date = date("Y-m-d h:m:s");
    $name = mysql_real_escape_string($name);
    $type = mysql_real_escape_string($type);
    $street_address = mysql_real_escape_string($street_address);
    $city = mysql_real_escape_string($city);
    $state = mysql_real_escape_string($state);
    $zip = mysql_real_escape_string($zip);
    $info = mysql_real_escape_string($info);
    $contact_website = mysql_real_escape_string($contact_website);
    $contact_phone1 = mysql_real_escape_string($contact_phone1);
    $price = mysql_real_escape_string($price);
    $hours = mysql_real_escape_string($hours);
    $tag = mysql_real_escape_string($tag);
    $query = mysql_query("INSERT INTO listings VALUES ('', '$type', '$name', '$street_address', '$city', '$state', '$info', '$zip', '$contact_phone1', '$contact_website', '$date', '$price', '', '$hours', '$tag')");
}


function curPageURL() {
 	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 	return $url;
}

?>