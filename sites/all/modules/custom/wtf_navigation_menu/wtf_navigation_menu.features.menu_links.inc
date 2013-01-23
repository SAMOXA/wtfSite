<?php
/**
 * @file
 * wtf_navigation_menu.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function wtf_navigation_menu_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: navigation:<front>
  $menu_links['navigation:<front>'] = array(
    'menu_name' => 'navigation',
    'link_path' => '<front>',
    'router_path' => '',
    'link_title' => 'История',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '1',
    'has_children' => '1',
    'expanded' => '1',
    'weight' => '-48',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:lk
  $menu_links['navigation:lk'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'lk',
    'router_path' => 'lk',
    'link_title' => 'Личный кабинет',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'menu',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '1',
    'weight' => '-37',
  );
  // Exported menu link: navigation:node/1
  $menu_links['navigation:node/1'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/1',
    'router_path' => 'node/%',
    'link_title' => 'Положение',
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
    'weight' => '-49',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/10
  $menu_links['navigation:node/10'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/10',
    'router_path' => 'node/%',
    'link_title' => 'Билеты',
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
    'weight' => '-48',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/11
  $menu_links['navigation:node/11'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/11',
    'router_path' => 'node/%',
    'link_title' => 'Иногородним',
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
    'weight' => '-47',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/12
  $menu_links['navigation:node/12'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/12',
    'router_path' => 'node/%',
    'link_title' => 'Спонсоры',
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
    'weight' => '-43',
  );
  // Exported menu link: navigation:node/13
  $menu_links['navigation:node/13'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/13',
    'router_path' => 'node/%',
    'link_title' => 'Конкурсы',
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
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/14
  $menu_links['navigation:node/14'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/14',
    'router_path' => 'node/%',
    'link_title' => 'Волонтерство',
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
    'weight' => '-49',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/15
  $menu_links['navigation:node/15'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/15',
    'router_path' => 'node/%',
    'link_title' => 'Аккредитация',
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
    'weight' => '-48',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/16
  $menu_links['navigation:node/16'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/16',
    'router_path' => 'node/%',
    'link_title' => 'Ярмарка',
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
    'weight' => '-46',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/33
  $menu_links['navigation:node/33'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/33',
    'router_path' => 'node/%',
    'link_title' => 'WTFest2012',
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
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/34
  $menu_links['navigation:node/34'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/34',
    'router_path' => 'node/%',
    'link_title' => 'Мастер-класс',
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
    'weight' => '-47',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/8
  $menu_links['navigation:node/8'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/8',
    'router_path' => 'node/%',
    'link_title' => 'Программа',
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
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/9
  $menu_links['navigation:node/9'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/9',
    'router_path' => 'node/%',
    'link_title' => 'Как добраться',
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
    'weight' => '-49',
    'parent_path' => '<front>',
  );
  // Exported menu link: navigation:node/add
  $menu_links['navigation:node/add'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add',
    'router_path' => 'node/add',
    'link_title' => 'Форма заявки',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
    ),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '1',
    'expanded' => '1',
    'weight' => '0',
  );
  // Exported menu link: navigation:node/add/request-amv
  $menu_links['navigation:node/add/request-amv'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-amv',
    'router_path' => 'node/add/request-amv',
    'link_title' => 'Заявка на конкурс AMV',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-49',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-dance
  $menu_links['navigation:node/add/request-dance'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-dance',
    'router_path' => 'node/add/request-dance',
    'link_title' => 'Заявка на танцевальный конкурс',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-47',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-defile
  $menu_links['navigation:node/add/request-defile'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-defile',
    'router_path' => 'node/add/request-defile',
    'link_title' => 'Заявка на дефиле',
    'options' => array(
      'attributes' => array(
        'title' => 'Заявка на конкурс дефиле',
      ),
    ),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-50',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-foto
  $menu_links['navigation:node/add/request-foto'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-foto',
    'router_path' => 'node/add/request-foto',
    'link_title' => 'Заявка на фотокосплей',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-45',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-game
  $menu_links['navigation:node/add/request-game'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-game',
    'router_path' => 'node/add/request-game',
    'link_title' => 'Заявка на гейм-чемпионат',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-50',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-groupe-defile
  $menu_links['navigation:node/add/request-groupe-defile'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-groupe-defile',
    'router_path' => 'node/add',
    'link_title' => 'Заявка на гупповое дефиле',
    'options' => array(
      'attributes' => array(
        'title' => 'Заявка на конкурс группового дефиле',
      ),
    ),
    'module' => 'system',
    'hidden' => '1',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-47',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-handmade
  $menu_links['navigation:node/add/request-handmade'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-handmade',
    'router_path' => 'node/add/request-handmade',
    'link_title' => 'Заявка на творческий конкурс',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-46',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-karaoke
  $menu_links['navigation:node/add/request-karaoke'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-karaoke',
    'router_path' => 'node/add/request-karaoke',
    'link_title' => 'Заявка на караоке',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-49',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-market
  $menu_links['navigation:node/add/request-market'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-market',
    'router_path' => 'node/add/request-market',
    'link_title' => 'Заявка на ярмарку',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-44',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-master
  $menu_links['navigation:node/add/request-master'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-master',
    'router_path' => 'node/add/request-master',
    'link_title' => 'Заявка на мастеркласс',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-47',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-music
  $menu_links['navigation:node/add/request-music'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-music',
    'router_path' => 'node/add/request-music',
    'link_title' => 'Заявка на музыкальный конкурс',
    'options' => array(),
    'module' => 'system',
    'hidden' => '1',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-46',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-scene
  $menu_links['navigation:node/add/request-scene'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-scene',
    'router_path' => 'node/add/request-scene',
    'link_title' => 'Заявка на сценический косплей',
    'options' => array(
      'attributes' => array(
        'title' => 'Заявка на сценический косплей',
      ),
    ),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-48',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:node/add/request-write
  $menu_links['navigation:node/add/request-write'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'node/add/request-write',
    'router_path' => 'node/add/request-write',
    'link_title' => 'Заявка на литературный конкурс',
    'options' => array(),
    'module' => 'system',
    'hidden' => '0',
    'external' => '0',
    'has_children' => '0',
    'expanded' => '0',
    'weight' => '-48',
    'parent_path' => 'node/add',
  );
  // Exported menu link: navigation:user
  $menu_links['navigation:user'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'user',
    'router_path' => 'user',
    'link_title' => 'Вход',
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
    'weight' => '-39',
  );
  // Exported menu link: navigation:user/register
  $menu_links['navigation:user/register'] = array(
    'menu_name' => 'navigation',
    'link_path' => 'user/register',
    'router_path' => 'user/register',
    'link_title' => 'Регистрация',
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
    'weight' => '-36',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('WTFest2012');
  t('Аккредитация');
  t('Билеты');
  t('Волонтерство');
  t('Вход');
  t('Заявка на гейм-чемпионат');
  t('Заявка на гупповое дефиле');
  t('Заявка на дефиле');
  t('Заявка на караоке');
  t('Заявка на конкурс AMV');
  t('Заявка на литературный конкурс');
  t('Заявка на мастеркласс');
  t('Заявка на музыкальный конкурс');
  t('Заявка на сценический косплей');
  t('Заявка на танцевальный конкурс');
  t('Заявка на творческий конкурс');
  t('Заявка на фотокосплей');
  t('Заявка на ярмарку');
  t('Иногородним');
  t('История');
  t('Как добраться');
  t('Конкурсы');
  t('Личный кабинет');
  t('Мастер-класс');
  t('Положение');
  t('Программа');
  t('Регистрация');
  t('Спонсоры');
  t('Форма заявки');
  t('Ярмарка');


  return $menu_links;
}
