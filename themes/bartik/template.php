<?php

/**
 * Add body classes if certain regions have content.
 */
function bartik_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function bartik_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function bartik_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function bartik_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'bartik') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function bartik_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function bartik_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  if($variables['type']=='blog'){
    $variables['content']['comments']['comment_form']['actions']['submit']['#value'] = 'Отправить';
    $variables['content']['comments']['comment_form']['comment_body']['und'][0]['value']['#title'] = 'Добавить комментарий';
    $variables['comments'] = array();
    for($i=1;$i<=$variables['comment_count'];$i++){
      $variables['comments'][$i]['author'] = $variables['content']['comments']['comments'][$i]['#comment']->name;
      $variables['comments'][$i]['date'] = date('h:m d/m/Y', $variables['content']['comments']['comments'][$i]['#comment']->created);
      $variables['comments'][$i]['body'] = $variables['content']['comments']['comments'][$i]['comment_body'][0]['#markup'];
    }
    $variables['label'] = l($variables['title'], 'http://' . $_SERVER['SERVER_NAME'] . $variables['node_url']);
    $variables['clear_label'] = $variables['title'];
    $temp = user_load($variables['uid']);
    $variables['author'] = t('Добавил ' . $temp->field_account_nick['und'][0]['value']);
  }
  drupal_add_js(array('node_type' => $variables['type']), 'setting');
//////////////////////////////////////////////////////////////////////////////// 
  if($variables['type']=='request_defile'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    if(empty($variables['content']['field_request_pers_image'])){
      drupal_add_js(array('defile_photo_pers_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('defile_photo_pers_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_music'])){
      drupal_add_js(array('defile_music_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('defile_music_none' => FALSE), 'setting');
    }
    $flag = false;
    if(!empty($variables['content']['field_request_foto'])){
      $temp = $variables['content']['field_request_foto'];
      foreach($temp as $key => $photo){
        if($key[0]!='#'){
          $variables['content']['field_request_foto'][$key]['#path']['options'] = array('attributes' => array('rel' => 'photo'));
          $flag = true;
        }
      }
    }
    if($flag == false){
      drupal_add_js(array('defile_photo_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('defile_photo_none' => FALSE), 'setting');
    }
    $flag = false;
    if(!empty($variables['content']['field_request_foto_suit'])){
      $temp = $variables['content']['field_request_foto_suit'];
      foreach($temp as $key => $photo){
        if($key[0]!='#'){
          $variables['content']['field_request_foto_suit'][$key]['#path']['options'] = array('attributes' => array('rel' => 'photo_suit'));
          $flag = true;
        }
      }
    }
    if($flag == false){
      drupal_add_js(array('defile_photo_suit_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('defile_photo_suit_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////  
  if($variables['type']=='request_scene'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    if(empty($variables['content']['field_request_scene_print'])){
      drupal_add_js(array('scene_print_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('scene_print_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_scene_sound'])){
      drupal_add_js(array('scene_sound_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('scene_sound_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_scene_video'])){
      drupal_add_js(array('scene_video_none' => TRUE), 'setting');
      if(!empty($variables['content']['field_request_scene_video_link'])){
        drupal_add_js(array('scene_video_link' => $variables['field_request_scene_video_link'][0]['value']), 'setting');
      }else{
        drupal_add_js(array('scene_video_link' => FALSE), 'setting');
      }
    }else{
      drupal_add_js(array('scene_video_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_scene_rep'])){
      drupal_add_js(array('scene_rep_none' => TRUE), 'setting');
      if(!empty($variables['content']['field_request_scene_rep_link'])){
        drupal_add_js(array('scene_rep_link' => $variables['field_request_scene_rep_link'][0]['value']), 'setting');
      }else{
        drupal_add_js(array('scene_rep_link' => FALSE), 'setting');
      }
    }else{
      drupal_add_js(array('scene_rep_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////  
  if($variables['type']=='request_dance'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    
    if(empty($variables['content']['field_request_dance_video_rep'])){
      drupal_add_js(array('dance_rep_none' => TRUE), 'setting');
      if(!empty($variables['content']['field_request_dance_video_r_link'])){
        drupal_add_js(array('dance_rep_link' => $variables['field_request_dance_video_r_link'][0]['value']), 'setting');
      }else{
        drupal_add_js(array('dance_rep_link' => FALSE), 'setting');
      }
    }else{
      drupal_add_js(array('dance_rep_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_dance_video'])){
      drupal_add_js(array('dance_video_none' => TRUE), 'setting');
      if(!empty($variables['content']['field_request_dance_video_link'])){
        drupal_add_js(array('dance_video_link' => $variables['field_request_dance_video_link'][0]['value']), 'setting');
      }else{
        drupal_add_js(array('dance_video_link' => FALSE), 'setting');
      }
    }else{
      drupal_add_js(array('dance_video_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_dance_music'])){
      drupal_add_js(array('dance_music_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('dance_music_none' => FALSE), 'setting');
    }
    $flag = false;
    if(!empty($variables['content']['field_request_dance_foto'])){
      $temp = $variables['content']['field_request_dance_foto'];
      foreach($temp as $key => $photo){
        if($key[0]!='#'){
          $variables['content']['field_request_dance_foto'][$key]['#path']['options'] = array('attributes' => array('rel' => 'photo'));
          $flag = true;
        }
      }
    }
    if($flag == false){
      drupal_add_js(array('dance_foto_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('dance_foto_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////  
  if($variables['type']=='request_karaoke'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    
    if(empty($variables['content']['field_request_karaoke_demo'])){
      drupal_add_js(array('karaoke_demo_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('karaoke_demo_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_karaoke_text'])){
      drupal_add_js(array('karaoke_text_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('karaoke_text_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_karaoke_minus'])){
      drupal_add_js(array('karaoke_minus_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('karaoke_minus_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_karaoke_doc'])){
      drupal_add_js(array('karaoke_doc_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('karaoke_doc_none' => FALSE), 'setting');
    }
    if(empty($variables['content']['field_request_karaoke_video'])){
      drupal_add_js(array('karaoke_video_none' => TRUE), 'setting');
      if(!empty($variables['content']['field_request_karaoke_video_link'])){
        drupal_add_js(array('karaoke_video_link' => $variables['field_request_karaoke_video_link'][0]['value']), 'setting');
      }else{
        drupal_add_js(array('karaoke_video_link' => FALSE), 'setting');
      }
    }else{
      drupal_add_js(array('karaoke_video_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////
  if($variables['type']=='request_amv'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    if(empty($variables['content']['field_request_amv_video'])){
      drupal_add_js(array('amv_video_none' => TRUE), 'setting');
      if(!empty($variables['content']['field_request_amv_video_link'])){
        drupal_add_js(array('amv_video_link' => $variables['field_request_amv_video_link'][0]['value']), 'setting');
      }else{
        drupal_add_js(array('amv_video_link' => FALSE), 'setting');
      }
    }else{
      drupal_add_js(array('amv_video_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////
  if($variables['type']=='request_write'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    if(empty($variables['content']['field_request_fanfic_text'])){
      drupal_add_js(array('fanfic_text_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('fanfic_text_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////
  if($variables['type']=='request_master'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////
  if($variables['type']=='request_handmade'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    $flag = false;
    if(!empty($variables['content']['field_request_handmade_foto'])){
      $temp = $variables['content']['field_request_handmade_foto'];
      foreach($temp as $key => $photo){
        if($key[0]!='#'){
          $variables['content']['field_request_handmade_foto'][$key]['#path']['options'] = array('attributes' => array('rel' => 'photo'));
          $flag = true;
        }
      }
    }
    if($flag == false){
      drupal_add_js(array('handmade_foto_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('handmade_foto_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////
  if($variables['type']=='request_foto'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
    $flag = false;
    if(!empty($variables['content']['field_request_foto_foto'])){
      $temp = $variables['content']['field_request_foto_foto'];
      foreach($temp as $key => $photo){
        if($key[0]!='#'){
          $variables['content']['field_request_foto_foto'][$key]['#path']['options'] = array('attributes' => array('rel' => 'photo'));
          $flag = true;
        }
      }
    }
    if($flag == false){
      drupal_add_js(array('foto_foto_none' => TRUE), 'setting');
    }else{
      drupal_add_js(array('foto_foto_none' => FALSE), 'setting');
    }
  }
////////////////////////////////////////////////////////////////////////////////
  if($variables['type']=='request_market'){
    if($variables['field_request_state'][0]['value']=="На рассмотрении"){
      drupal_add_js(array('reques_status_color' => '#FADB61'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Отклонена"){
      drupal_add_js(array('reques_status_color' => '#FE4F58'), 'setting');
    }
    if($variables['field_request_state'][0]['value']=="Принята"){
      drupal_add_js(array('reques_status_color' => '#3CEC1B'), 'setting');
    }
  }
}

function bartik__preprocess_comment(&$variables){
  //die('122');
  //kpr($variables);
}

/**
 * Override or insert variables into the block template.
 */
function bartik_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}
///////////////////////////////////////////////////////////////////////////////
/**
 * Implements theme_menu_tree().
 */
function bartik_menu_tree($variables) {
  if (strpos($variables['tree'], 'Личный кабинет') || strpos($variables['tree'], 'Вход') || strpos($variables['tree'], 'Список заявок') || strpos($variables['tree'], 'Редактировать профиль')){
    return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
  }
  else{
    return '<ul class="clearfix">' . $variables['tree'] . '</ul>';;
  }
}

function bartik_menu_link(array $variables) {
  global $user;
  $element = $variables['element'];
  $sub_menu = '';
  $element['#attributes']['class'][] = 'menu-' . $element['#original_link']['mlid'];
  if($element['#title'] == 'Форма заявки'){
    if(variable_get('request_enable', 0) == 0){
      return '<li class="disable_request"><a href="#">Форма заявки</a></li>';
    }
  }
  if($element['#title'] == 'Редактировать профиль'){
    $element['#href'] = 'user/' . $user->uid . '/edit';
  }
  if($element['#title'] == 'Личные сообщения'){
    $element['#title'] .= ' (' . privatemsg_sql_unread_count($user)->execute()->fetchField() . ')';
  }
  if($element['#title'] == 'Вход' || $element['#title'] == 'Регистрация'){
    if(isset($user->uid) && $user->uid != 0){
      return;
    }
    $element['#attributes']['class'][] = "right-button";
    if($element['#title'] == 'Вход'){
      $element['#attributes']['id'] = "login-button";
    }
  }
  if($element['#title'] == 'Личный кабинет'){
    if($user->uid == 0){
      return;
    }
    $element['#attributes']['class'][] = "lk-button";
    $temp = privatemsg_sql_unread_count($user)->execute()->fetchField();
    if($temp>0){
      drupal_add_js(array('newMessages' => $temp), 'setting');
    }else{
      drupal_add_js(array('newMessages' => FALSE), 'setting');
    }
  }
  if($element['#title'] == 'Выход'){
    $element['#attributes']['class'][] = "right-button";
  }
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

///////////////////////////////////////////////////////////////////////////////
/**
 * Implements theme_field__field_type().
 */
function bartik_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'>' . $output . '</div>';

  return $output;
}
////////////////////////////////////////////////////////////////////////////////////

function bartik_preprocess_views_view(&$vars) { 
  //kpr($vars);
  if($vars['view']->name == 'view_news'){
    $vars['news'] = array();
    foreach ($vars['view']->result as $news){
      if($news->_field_data['nid']['entity']->comment_count=='0'){
        $temp = l('Нет комментариев', 'node/' . $news->nid . '/', array('fragment' => 'comments'));
      }else{
        $temp = l('Комментариев - ' . $news->_field_data['nid']['entity']->comment_count, 'node/' . $news->nid . '/', array('fragment' => 'comments'));
      }
      $user_temp = user_load($news->node_uid);
      //kpr($user_temp);
      $vars['news'][] = array(
        'node_url' => 'node/' . $news->nid,
        'label' => l($news->node_title, 'node/' . $news->nid),
        'clear_label' => $news->node_title,
        'date' => date('H:i d/m/Y', $news->node_created), 
        'body' => $news->field_body[0]['raw']['value'], 
        'author' => t('Добавил ' . $user_temp->field_account_nick['und'][0]['value']),
        'comments_count' => $temp,
      );
    }
  }
}

function bartik_preprocess_page(&$variables) {
  //kpr($variables);
}

function bartik_preprocess_panels_pane(&$variables) {
  if($variables['pane']->type == 'page_content'){
    if(arg(0) == 'user'){
      //if(arg(1) == 'edit'){
        //$variables['form'] = drupal_get_form('user-profile-form');
        //kpr($variables);
      //}
    }
  }
}

function bartik_form_alter(&$form, &$form_state, $form_id){
  //global $user;
  //kpr($form);
  if(!empty($form['uid'])){
    $user = user_load($form['uid']['#value']);
  }
  if($form_id == "request_defile_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на дефиле"; 
  }
  if($form_id == "request_scene_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на сценкосплей"; 
  }
  if($form_id == "request_karaoke_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на караоке"; 
  }
  if($form_id == "request_music_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на музыкальный конкурс"; 
  }
  if($form_id == "request_dance_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на танцы"; 
  }
  if($form_id == "request_amv_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на AMV"; 
  }
  if($form_id == "request_write_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на литературный конкурс"; 
  }
  if($form_id == "request_master_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на мастеркласс"; 
  }
  if($form_id == "request_handmade_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на творческий конкурс"; 
  }
  if($form_id == "request_foto_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на фотокосплей"; 
  }
  if($form_id == "request_market_node_form"){
    $form['title']['#default_value'] = $user->name . " Заявка на ярмарку"; 
  }
  if($form_id == "to_admin_form_node_form"){
    $form['title']['#default_value'] = "Администрации от " . $user->name; 
  }
  if($form_id == "user-login" || $form_id == "user-register-form"){

  }
}

function request_defile_node_form_submit($form, &$form_state){
  $mail = '';
  $mail .= 'Заявка на ' . $form_state['values']['field_request_defile_type']['und']['0']['value'] . ' дефиле от ' . $form_state['values']['field_request_fio']['und']['0']['value'] . '(' . $form_state['values']['field_request_nick']['und']['0']['value'] . '). ';
  $mail .= 'Фэндом - ' . $form_state['values']['field_request_fandom']['und']['0']['value'] . '. ';
  //$mail .= 'Персонаж - ' . $form_state['values']['field_request_pers_name']['und']['0']['value'] . '. ';
  $mail .= 'Город - ' . $form_state['values']['field_request_city']['und']['0']['value'] . '. ';
  $mail .= 'Телефон - ' . $form_state['values']['field_request_phone']['und']['0']['value'] . '. ';
  $mail .= 'Контактик - ' . $form_state['values']['field_request_vk']['und']['0']['value'];
  $params['body'] = $mail;
  $params['subject'] = 'Заявка от на конкурс дефиле';
  
  //drupal_mail('wtf', 'request', 'wtfest2.0@gmail.com', user_preferred_language($account), $params);
}

function request_scene_node_form_submit($form, &$form_state){
  $mail = '';
  $mail .= 'Заявка на сценический косплей от ' . $form_state['values']['field_request_fio']['und']['0']['value'] . '(' . $form_state['values']['field_request_nick']['und']['0']['value'] . '). ';
  $mail .= 'Фэндом - ' . $form_state['values']['field_request_fandom']['und']['0']['value'] . '. ';
  //$mail .= 'Персонаж - ' . $form_state['values']['field_request_pers_name']['und']['0']['value'] . '. ';
  $mail .= 'Город - ' . $form_state['values']['field_request_city']['und']['0']['value'] . '. ';
  $mail .= 'Телефон - ' . $form_state['values']['field_request_phone']['und']['0']['value'] . '. ';
  $mail .= 'Контактик - ' . $form_state['values']['field_request_vk']['und']['0']['value'];
  $params['body'] = $mail;
  $params['subject'] = 'Заявка от на конкурс дефиле';
  
  //drupal_mail('wtf', 'request', 'wtfest2.0@gmail.com', user_preferred_language($account), $params);
}

function request_karaoke_node_form_submit($form, &$form_state){
  $mail = '';
  $mail .= 'Заявка на караоке от ' . $form_state['values']['field_request_fio']['und']['0']['value'] . '(' . $form_state['values']['field_request_nick']['und']['0']['value'] . '). ';
  $mail .= 'Фэндом - ' . $form_state['values']['field_request_fandom']['und']['0']['value'] . '. ';
  //$mail .= 'Персонаж - ' . $form_state['values']['field_request_pers_name']['und']['0']['value'] . '. ';
  $mail .= 'Город - ' . $form_state['values']['field_request_city']['und']['0']['value'] . '. ';
  $mail .= 'Телефон - ' . $form_state['values']['field_request_phone']['und']['0']['value'] . '. ';
  $mail .= 'Контактик - ' . $form_state['values']['field_request_vk']['und']['0']['value'];
  $params['body'] = $mail;
  $params['subject'] = 'Заявка от на конкурс дефиле';
  
  //drupal_mail('wtf', 'request', 'wtfest2.0@gmail.com', user_preferred_language($account), $params);
}

function request_music_node_form_submit($form, &$form_state){
  $mail = '';
  $mail .= 'Заявка на караоке от ' . $form_state['values']['field_request_fio']['und']['0']['value'] . '(' . $form_state['values']['field_request_nick']['und']['0']['value'] . '). ';
  $mail .= 'Фэндом - ' . $form_state['values']['field_request_fandom']['und']['0']['value'] . '. ';
  //$mail .= 'Персонаж - ' . $form_state['values']['field_request_pers_name']['und']['0']['value'] . '. ';
  $mail .= 'Город - ' . $form_state['values']['field_request_city']['und']['0']['value'] . '. ';
  $mail .= 'Телефон - ' . $form_state['values']['field_request_phone']['und']['0']['value'] . '. ';
  $mail .= 'Контактик - ' . $form_state['values']['field_request_vk']['und']['0']['value'];
  $params['body'] = $mail;
  $params['subject'] = 'Заявка от на конкурс дефиле';
  
  //drupal_mail('wtf', 'request', 'wtfest2.0@gmail.com', user_preferred_language($account), $params);
}

function request_dance_node_form_submit($form, &$form_state){
  $mail = '';
  $mail .= 'Заявка на ' . $form_state['values']['field_request_dance_type ']['und']['0']['value'] . ' танец от ' . $form_state['values']['field_request_fio']['und']['0']['value'] . '(' . $form_state['values']['field_request_nick']['und']['0']['value'] . '). ';
  $mail .= 'Фэндом - ' . $form_state['values']['field_request_fandom']['und']['0']['value'] . '. ';
  //$mail .= 'Персонаж - ' . $form_state['values']['field_request_pers_name']['und']['0']['value'] . '. ';
  $mail .= 'Город - ' . $form_state['values']['field_request_city']['und']['0']['value'] . '. ';
  $mail .= 'Телефон - ' . $form_state['values']['field_request_phone']['und']['0']['value'] . '. ';
  $mail .= 'Контактик - ' . $form_state['values']['field_request_vk']['und']['0']['value'];
  $params['body'] = $mail;
  $params['subject'] = 'Заявка от на конкурс дефиле';
  
  //drupal_mail('wtf', 'request', 'wtfest2.0@gmail.com', user_preferred_language($account), $params);
}