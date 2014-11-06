<?php

$link = mysql_connect('localhost', 'f13g10', 'teamten123');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('student_f13g10');
?>