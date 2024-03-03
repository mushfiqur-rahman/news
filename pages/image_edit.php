<?php
/**
 * Created by PhpStorm.
 * User: mushf
 * Date: 10-Feb-18
 * Time: 10:51 AM
 */

$sql = mysql_query("UPDATE images SET source ='".mysql_real_escape_string( $output )."' WHERE id = X");