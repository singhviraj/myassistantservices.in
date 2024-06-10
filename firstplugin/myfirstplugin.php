<?php
/*
Plugin Name: My First Plugin
Description: This is my first plugin! It makes a new admin menu link!
Author: Your Name
*/

add_action( 'admin_menu', 'mfp_Add_My_Admin_Link' );
// Add a new top level menu link to the ACP
function mfp_Add_My_Admin_Link()
{
      echo"<p style='color:white'>hey</p>";
}