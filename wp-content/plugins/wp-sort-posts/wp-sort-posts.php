<?php
/*
Plugin Name: WP Sort Posts
Plugin URI: http://sitehint.ru/?p=757
Description: 
Version: 1.0
Author: TrueFalse
Author URI: http://red-book-cms.ru
License: GPLv2 or later
Text Domain: wpsp
Domain Path: /languages
*/
$lang = get_locale();
load_plugin_textdomain('wpsp', false, dirname( plugin_basename( __FILE__ ) ). '/languages/');

function orderby_posts($vars) {  
  $params = wpsp_get_orderby_select();
  $vars->set('orderby', $params['orderby']);
  $vars->set('order', $params['order']);  
  $vars->set('ignore_sticky_posts', 1);  
  return $vars;
}
add_filter('pre_get_posts', 'orderby_posts');

function wpsp_get_orderby_select() {
  $result = array(
      '0' => ' selected="selected"',
    '1' => '',
    '2' => '',
    '3' => '',
    '4' => '',
    'orderby' => 'date',
    'order' => 'DESC'
  );  
  if (intval($_GET['orderby_posts']))
    switch ($_GET['orderby_posts']) {
      case '1': 
        $result['orderby'] = "title";
        $result['order'] = "ASC";
        $result['1'] = ' selected="selected"';
        $result['0'] = '';
        break;
      case '2': 
        $result['orderby'] = "title";
        $result['order'] = "DESC";
        $result['2'] = ' selected="selected"';
        $result['1'] = '';
        break;
      case '3': 
        $result['orderby'] = "date";
        $result['order'] = "DESC";
        $result['3'] = ' selected="selected"';
        $result['1'] = '';
        break;
      case '4': 
        $result['orderby'] = "date";
        $result['order'] = "ASC";
        $result['4'] = ' selected="selected"';
        $result['1'] = '';
        break;
    }  
  return $result;
}
add_filter('wp_head', 'wpsp_get_orderby_select');


function wpsp_orderby_posts_form() {
  $params = wpsp_get_orderby_select();
  echo "
  <form method=\"get\" id=\"order\">
    <select name=\"orderby_posts\" onchange=\"this.form.submit()\" class=\"form-control blog-filter pull-right\">
    <option value=\"0\"{$params['0']}>". 'Ordenar por...' . "</option>
      <option value=\"1\"{$params['1']}>". 'Por nombre &#x25B2;' . "</option>
      <option value=\"2\"{$params['2']}>". 'Por nombre &#x25BC;' . "</option>
      <option value=\"3\"{$params['3']}>". '&Uacute;ltimo agregado &#x25B2;' . "</option>
      <option value=\"4\"{$params['4']}>". '&Uacute;ltimo agregado &#x25BC;' . "</option>
    </select>
  </form>";
}

function wpsp_orderby_posts_form2() {
  $params = wpsp_get_orderby_select();
  echo "
  <form method=\"get\" id=\"order\">
    <select name=\"orderby_posts\" onchange=\"this.form.submit()\" class=\"form-control blog-filter pull-right\">
      <option value=\"0\"{$params['0']}>". 'Sort by...' . "</option>
      <option value=\"1\"{$params['1']}>". 'By name &#x25B2' . "</option>
      <option value=\"2\"{$params['2']}>". 'By name &#x25BC;' . "</option>
      <option value=\"3\"{$params['3']}>". 'Last added &#x25B2;' . "</option>
      <option value=\"4\"{$params['4']}>". 'Last added &#x25BC;' . "</option>
    </select>
  </form>";
}

?>