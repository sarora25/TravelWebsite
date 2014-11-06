<?php

//error_reporting(0);


require 'connect.php';
require 'functions.php';

$url = curPageURL();

$parsed = parse_url($url, PHP_URL_QUERY); // parse url to get query
parse_str($parsed); //parse query to retrieve id of listing

$listing_id = $q;

$listing_data = listing_data($listing_id, 'id', 'type', 'name', 'street_address', 
        'city', 'state', 'zip', 'info', 'rating', 'price', 'hours','contact_phone1','contact_website'); //return info about listing from database

?>