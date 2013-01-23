<?php
/**
 * @file
 * wtf_content_types_core.features.inc
 */

/**
 * Implements hook_node_info().
 */
function wtf_content_types_core_node_info() {
  $items = array(
    'page' => array(
      'name' => t('Basic page'),
      'base' => 'node_content',
      'description' => t('Use <em>basic pages</em> for your static content, such as an \'About us\' page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'request_amv' => array(
      'name' => t('Заявка на конкурс AMV'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на конкурс AMV'),
      'help' => '',
    ),
    'request_dance' => array(
      'name' => t('Заявка на танцевальный конкурс'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на танцевальный конкурс'),
      'help' => '',
    ),
    'request_defile' => array(
      'name' => t('Заявка на дефиле'),
      'base' => 'node_content',
      'description' => t('Заявка на конкурс дефиле'),
      'has_title' => '1',
      'title_label' => t('Заявка на дефиле'),
      'help' => '',
    ),
    'request_foto' => array(
      'name' => t('Заявка на фотокосплей'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на фотокосплей'),
      'help' => '',
    ),
    'request_game' => array(
      'name' => t('Заявка на гейм-чемпионат'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на гейм-чемпионат'),
      'help' => '',
    ),
    'request_handmade' => array(
      'name' => t('Заявка на творческий конкурс'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на творческий конкурс'),
      'help' => '',
    ),
    'request_karaoke' => array(
      'name' => t('Заявка на караоке'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на караоке'),
      'help' => '',
    ),
    'request_market' => array(
      'name' => t('Заявка на ярмарку'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на ярмарку'),
      'help' => '',
    ),
    'request_master' => array(
      'name' => t('Заявка на мастеркласс'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на мастеркласс'),
      'help' => '',
    ),
    'request_music' => array(
      'name' => t('Заявка на музыкальный конкурс'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на музыкальный конкурс'),
      'help' => '',
    ),
    'request_scene' => array(
      'name' => t('Заявка на сценический косплей'),
      'base' => 'node_content',
      'description' => t('Заявка на сценический косплей'),
      'has_title' => '1',
      'title_label' => t('Заявка на сценический косплей'),
      'help' => '',
    ),
    'request_volonteer' => array(
      'name' => t('Заявка на волонтёрство'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на волонтёрство'),
      'help' => '',
    ),
    'request_write' => array(
      'name' => t('Заявка на литературный конкурс'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Заявка на литературный конкурс'),
      'help' => '',
    ),
  );
  return $items;
}
