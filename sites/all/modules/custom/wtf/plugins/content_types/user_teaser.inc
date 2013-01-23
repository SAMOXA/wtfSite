<?php
/**
 * Callback function to supply a list of content types.
 */
function wtf_user_teaser_ctools_content_types() {
  return array(
    'single'        => TRUE,
    'title'         => t('user_teaser'),
    'description'   => t('user_teaser CTools CT'),
    'category'      => t('wtf'),
    'all contexts'  => TRUE,
    'hook theme'    => 'wtf_user_teaser_theme',
    'icon'          => 'icon_block_custom.png',
    'defaults'      => array('mode' => 'full'),
  );
}

function wtf_user_teaser_content_type_render($subtype, $conf, $panel_args, $contexts) {
  $block = new stdClass();
  $block->content = theme('wtf_user_teaser');
  return $block;
}

function wtf_user_teaser_theme(&$theme, $plugin) {
  $theme['wtf_user_teaser'] = array(
    'path'      => $plugin['path'],
    'template'  => 'wtf-user-teaser',
  );
}

/**
 * Process variables for wtf_user_teaser.tpl.php
 */
function wtf_preprocess_wtf_user_teaser(&$vars) {
  //kpr(drupal_get_form('user_login_block'));
  if($vars['user']->uid != 0){
    $vars['teaser_title'] = 'Приветсвую ' . $vars['user']->name;
    $vars['teaser_links'] = l(t('Список заявок'), 'http://' . $_SERVER['SERVER_NAME'] . '/rl' . '?' . $vars['user']->uid, array('attributes' => array('class' => 'reqest-list-user-link'))) . ' ';
    $vars['teaser_links'] .= l(t('Личные сообщения'), 'example.com', array('attributes' => array('class' => 'pm-list-user')));
    $vars['teaser_links_exit'] = l(t('Выход'), 'http://' . $_SERVER['SERVER_NAME'] . '/user/logout', array('attributes' => array('class' => 'exit')));
  }
  else{
    $vars['teaser_title'] = drupal_render(drupal_get_form('user_login_block'));
    
  }
}