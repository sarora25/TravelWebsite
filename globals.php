<?php
    $db = mysql_connect('localhost', 'f13g10', 'teamten123');
 
    if (!$db) {
        echo "Unable to establish connection to database server";
        exit;
    }
 
    if (!mysql_select_db('student_f13g10', $db)) {
        echo "Unable to connect to database";
        exit;
    }
?>