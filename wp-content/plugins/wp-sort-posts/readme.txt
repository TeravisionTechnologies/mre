=== WP Sort Posts ===
Contributors: TrueFalse
Donate link: http://red-book-cms.ru
Tags: posts, sort, sorting, order
Requires at least: 3.5.1
Tested up to: 3.5.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add the ability to sort the posts in the archives of your blog!

== Description ==

This plugin adds a drop-down list with the ability to sort your blog posts:
*   sort by title;
*   sort by date (newest first);
*   sort by date (oldest first);
*   sort by date last modified.

Paste the following code in the templates 'index.php', 'archive.php', 'category.php' or/and 'author.php'  etc.:
`<?php
if (function_exists('wpsp_orderby_posts_form')):
  wpsp_orderby_posts_form();
endif;
?>`
This tag must be before The Loop. For more information go to the "Installation".

== Installation ==

1. Unzip files.
2. Upload 'wp-sort-posts' to the '/wp-content/plugins/' directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Paste the following code in the templates 'index.php', 'archive.php', 'category.php' or/and 'author.php' etc.:
`<?php
if (function_exists('wpsp_orderby_posts_form')):
  wpsp_orderby_posts_form();
endif;
?>`
This tag must be before The Loop.

== Frequently Asked Questions ==

-

== Screenshots ==

1. On the home page.

== Changelog ==

= 1.0 =
*   The first version of the plugin.

== Upgrade Notice ==

= 1.0 =
Tested in WordPress 3.5.2