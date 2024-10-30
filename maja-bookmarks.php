<?php
/*
Plugin Name: MAJA Bookmarks
Plugin URI: http://www.majakovskij.info/maja-bookmarks-plugin/
Description: The Maja Bookmarks plug-in is a widget as well as a shortcode to display a list of bookmarks (links) through several options.
Author: Majakovskij
Version: 1.1.5.1
Author: Majakovskij
Author URI: http://www.majakovskij.info/
Tags: bookmark, widget, link, sidebar, shortcode
*/
if(!class_exists('Maja_Core')) require_once('maja-core.php');
require_once('maja-bookmarks-default.php');
require_once('maja-bookmarks-output.php');
require_once('maja-bookmarks-form.php');
require_once('maja-bookmarks-widget.php');
require_once('maja-bookmarks-shortcode.php');
?>