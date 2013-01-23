<?php
/**
 * @file
 * wtf_lk_menu.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function wtf_lk_menu_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: menu-lk:<front>
  $menu_links['menu-lk:<front>'] = array(
    'menu_name' => 'menu-lk',
    'link_path' => '<front>',
    'router_path' => '',
    'link_title' => 'Редактировать профиль',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '1',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-48',
  );
  // Exported menu link: menu-lk:lk
  $menu_links['menu-lk:lk'] = array(
    'menu_name' => 'menu-lk',
    'link_path' => 'lk',
    'router_path' => 'lk',
    'link_title' => 'Список заявок',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-50',
  );
  // Exported menu link: menu-lk:messages
  $menu_links['menu-lk:messages'] = array(
    'menu_name' => 'menu-lk',
    'link_path' => 'messages',
    'router_path' => 'messages',
    'link_title' => 'Личные сообщения',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '1',
    'expanded' => '1',
    'weight' => '-49',
  );
  // Exported menu link: menu-lk:messages/new
  $menu_links['menu-lk:messages/new'] = array(
    'menu_name' => 'menu-lk',
    'link_path' => 'messages/new',
    'router_path' => 'messages/new',
    'link_title' => 'Написать',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-50',
    'parent_path' => 'messages',
  );
  // Exported menu link: menu-lk:user/logout
  $menu_links['menu-lk:user/logout'] = array(
    'menu_name' => 'menu-lk',
    'link_path' => 'user/logout',
    'router_path' => 'user/logout',
    'link_title' => 'Выход',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '0',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Выход');
  t('Личные сообщения');
  t('Написать');
  t('Редактировать профиль');
  t('Список заявок');


  return $menu_links;
}
