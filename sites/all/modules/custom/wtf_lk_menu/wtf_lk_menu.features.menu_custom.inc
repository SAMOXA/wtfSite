<?php
/**
 * @file
 * wtf_lk_menu.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function wtf_lk_menu_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: menu-lk.
  $menus['menu-lk'] = array(
    'menu_name' => 'menu-lk',
    'title' => 'Меню личного кабинета',
    'description' => '',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Меню личного кабинета');


  return $menus;
}
