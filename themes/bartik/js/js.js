/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*
jQuery(document).ready(function($) {
  console.log('lol');
  console.log($('.news_body .rtecenter img'));
  $('#login-button').click(function(e) {
    e.preventDefault();
    console.log('wtf');
    //$.fancybox.showActivity();
    $.get(Drupal.settings.basePath + 'user/login', function(data) {
      var form = $('#user-login', data);
      $.fancybox({content:form});
    });
    return false;
  });
});
*/

var newMessagesSpin = false;

function getTimeLeft(){
  var options = 'Thu, 28 Feb 2013 00:00:00 GMT';
  var days = 24*60*60;
  var hours = 60*60;
  var minutes = 60;
  var left = Math.floor((Number(new Date(options)) - Number(new Date())) / 1000);
  var d = Math.floor(left / days);
  left -= d*days;
  var h = Math.floor(left / hours);
  left -= h*hours;
  var m = Math.floor(left / minutes);
  left -= m*minutes;
  var s = left;
  var ds;
  var hs;
  var ms;
  var ss;
  if(d.toString().length==2 && d.toString()[0]!='1'){
    switch(d.toString()[1]){
        case('1'):
          ds = d + '&nbsp;день&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          ds = d + '&nbsp;дня&nbsp;&nbsp;';
        break;
        default:
          ds = d + '&nbsp;дней&nbsp;';
      }
  }else{
    if(d.toString().length<2){
      switch(d.toString()[0]){
        case('1'):
          ds = d + '&nbsp;&nbsp;день&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          ds = d + '&nbsp;&nbsp;дня&nbsp;&nbsp;';
        break;
        default:
          ds = d + '&nbsp;&nbsp;дней&nbsp;';
      }
    }else{
      ds = d + '&nbsp;дней&nbsp;';
    }
  }
  if(h.toString().length==2 && h.toString()[0]!='1'){
    switch(h.toString()[1]){
        case('1'):
          hs = h + '&nbsp;час&nbsp;&nbsp;&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          hs = h + '&nbsp;часа&nbsp;&nbsp;';
        break;
        default:
          hs = h + '&nbsp;часов&nbsp;';
      }
  }else{
    if(h.toString().length<2){
      switch(h.toString()[0]){
        case('1'):
          hs = h + '&nbsp;&nbsp;час&nbsp;&nbsp;&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          hs = h + '&nbsp;&nbsp;часа&nbsp;&nbsp;';
        break;
        default:
          hs = h + '&nbsp;&nbsp;часов&nbsp;';
      }
    }else{
      hs = h + '&nbsp;часов&nbsp;';
    }
  }
  if(m.toString().length==2 && m.toString()[0]!='1'){
    switch(m.toString()[1]){
        case('1'):
          ms = m + '&nbsp;минута&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          ms = m + '&nbsp;минуты&nbsp;';
        break;
        default:
          ms = m + '&nbsp;минут&nbsp;&nbsp;';
      }
  }else{
    if(m.toString().length<2){
      switch(m.toString()[0]){
        case('1'):
          ms = m + '&nbsp;&nbsp;минута&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          ms = m + '&nbsp;&nbsp;минуты&nbsp;';
        break;
        default:
          ms = m + '&nbsp;&nbsp;минут&nbsp;&nbsp;';
      }
    }else{
      ms = m + '&nbsp;минут&nbsp;&nbsp;';
    }
  }
  if(s.toString().length==2 && s.toString()[0]!='1'){
    switch(s.toString()[1]){
        case('1'):
          ss = s + '&nbsp;секунда&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          ss = s + '&nbsp;секунды&nbsp;';
        break;
        default:
          ss = s + '&nbsp;секунд&nbsp;&nbsp;';
      }
  }else{
    if(s.toString().length<2){
      switch(s.toString()[0]){
        case('1'):
          ss = s + '&nbsp;&nbsp;секунда&nbsp;';
        break;
        case('2'):
        case('3'):
        case('4'):
          ss = s + '&nbsp;&nbsp;секунды&nbsp;';
        break;
        default:
          ss = s + '&nbsp;&nbsp;секунд&nbsp;&nbsp;';
      }
    }else{
      ss = s + '&nbsp;секунд&nbsp;&nbsp;';
    }
  }
  return ds+hs+ms+ss;
}

function timeUpdate(){
  $('.pane-page-logo .request-timer p').html('До конца приёма заявок осталось</br>' + getTimeLeft());
  setTimeout(timeUpdate, 1000);
}

function newMessages(){
  if(newMessagesSpin){
    $('.lk-button a').css({'font-size' : '16px'});  
    $('.lk-button a').html('Личный кабинет')
    newMessagesSpin = false;
  }else{
    $('.lk-button a').css({'font-size' : '13px'});
    $('.lk-button a').html('Новых сообщений(' + Drupal.settings.newMessages + ')')
    newMessagesSpin = true;
  }
  setTimeout(newMessages, 2500);
}

jQuery(document).ready(function($) {
  if(Drupal.settings.newMessages!=false){
    setTimeout(newMessages, 3000);
  }
  $('<div class="request-timer"><p>' + getTimeLeft() + '</p></div>').insertAfter('.pane-page-logo a');
  setTimeout(timeUpdate, 1000);
  //$('<span class="jst_timer"><span style="display:none" class="datetime">2015-05-02T08:11:00-08:00</span></span>').insertAfter('pane-page-logo');
  if(Drupal.settings.node_type == 'request_defile'){
    if(Drupal.settings.defile_photo_pers_none){
      $('<div class="field field-name-field-request-pers-image conent-none field-type-image field-label-above"><div class="field-label">Изображение персонажа:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-defile-type');
    }else{
      $("div.field-name-field-request-pers-image a").fancybox();
    }
    if(Drupal.settings.defile_photo_none){
      $('<div class="field field-name-field-request-foto conent-none field-type-image field-label-above"><div class="field-label">Фото косплеера в костюме:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-defile-type');
    }else{
      $("div.field-name-field-request-foto a").fancybox();
    }
    if(Drupal.settings.defile_photo_none){
      $('<div class="field field-name-field-request-music conent-none field-type-image field-label-above"><div class="field-label">Музыка для выступления:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНА</p></div></div></div>').insertAfter('.field-name-field-request-defile-type');
    }
    if(Drupal.settings.defile_photo_suit_none){
      $('<div class="field field-name-field-request-foto-suit conent-none field-type-image field-label-above"><div class="field-label">Фото костюма:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-defile-type');
    }else{
      $("div.field-name-field-request-foto-suit a").fancybox();
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_scene'){
    if(Drupal.settings.scene_print_none){
      $('<div class="field field-name-field-request-scene-print conent-none field-label-above"><div class="field-label">Сценарий&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАН</p></div></div></div>').insertAfter('.field-name-field-request-scene-fios');
    }
    if(Drupal.settings.scene_sound_none){
      $('<div class="field field-name-field-request-scene-sound conent-none field-label-above"><div class="field-label">Звуковая дорожка для выступления&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНА</p></div></div></div>').insertAfter('.field-name-field-request-scene-fios');
    }
    if(Drupal.settings.scene_video_none){
      if(Drupal.settings.scene_video_link){
        $('.field-name-field-request-scene-video-link .field-items .field-item').html('<a href="' + Drupal.settings.scene_video_link + '">' + Drupal.settings.scene_video_link + '</a>');
      }else{
        $('<div class="field field-name-field-request-scene-video conent-none field-label-above"><div class="field-label">Видео для выступления:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-scene-fios');
      }
    }else{
      $('.field-name-field-request-scene-video-link').hide();
    }
    if(Drupal.settings.scene_rep_none){
      if(Drupal.settings.scene_rep_link){
        $('.field-name-field-request-scene-rep-link .field-items .field-item').html('<a href="' + Drupal.settings.scene_rep_link + '">' + Drupal.settings.scene_rep_link + '</a>');
      }else{
        $('<div class="field field-name-field-request-scene-rep conent-none field-label-above"><div class="field-label">Видео репетиции:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-scene-fios');
      }
    }else{
      $('.field-name-field-request-scene-rep-link').hide();
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_dance'){
    if(Drupal.settings.dance_music_none){
      $('<div class="field field-name-field-request-dance-music conent-none field-label-above"><div class="field-label">Музыка для выступления:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНА</p></div></div></div>').insertAfter('.field-name-field-request-dance-fios');
    }
    if(Drupal.settings.dance_foto_none){
      $('<div class="field field-name-field-request-dance-foto conent-none field-type-image field-label-above"><div class="field-label">Фото танцоров в костюмах:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-dance-fios');
    }else{
      $("div.field-name-field-request-dance-foto a").fancybox();
    }
    if(Drupal.settings.dance_rep_none){
      if(Drupal.settings.dance_rep_link){
        $('.field-name-field-request-dance-video-r-link .field-items .field-item').html('<a href="' + Drupal.settings.dance_rep_link + '">' + Drupal.settings.dance_rep_link + '</a>');
      }else{
        $('<div class="field field-name-field-request-dance-video-rep conent-none field-label-above"><div class="field-label">Видео репетиции:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-dance-fios');
      }
    }else{
      $('.field-name-field-request-dance-video-r-link').hide();
    }
    if(Drupal.settings.dance_video_none){
      if(Drupal.settings.dance_video_link){
        $('.field-name-field-request-dance-video-link .field-items .field-item').html('<a href="' + Drupal.settings.dance_video_link + '">' + Drupal.settings.dance_video_link + '</a>');
      }else{
        $('<div class="field field-name-field-request-dance-video conent-none field-label-above"><div class="field-label">Видео для выступления:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-dance-fios');
      }
    }else{
      $('.field-name-field-request-dance-video-link').hide();
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_karaoke'){
    if(Drupal.settings.karaoke_demo_none){
      $('<div class="field field-name-field-request-karaoke-demo conent-none field-label-above"><div class="field-label">Демо вокала:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-phone');
    }
    if(Drupal.settings.karaoke_text_none){
      $('<div class="field field-name-field-request-karaoke-text conent-none field-label-above"><div class="field-label">Текст песни:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАН</p></div></div></div>').insertAfter('.field-name-field-request-phone');
    }
    if(Drupal.settings.karaoke_minus_none){
      $('<div class="field field-name-field-request-karaoke-minus conent-none field-label-above"><div class="field-label">Минус для выступления:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАН</p></div></div></div>').insertAfter('.field-name-field-request-phone');
    }
    if(Drupal.settings.karaoke_doc_none){
      $('<div class="field field-name-field-request-karaoke-doc conent-none field-label-above"><div class="field-label">Сценарий выступления:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАН</p></div></div></div>').insertAfter('.field-name-field-request-phone');
    }
    if(Drupal.settings.karaoke_video_none){
      if(Drupal.settings.karaoke_video_link){
        $('.field-name-field-request-karaoke-video-link .field-items .field-item').html('<a href="' + Drupal.settings.karaoke_video_link + '">' + Drupal.settings.karaoke_video_link + '</a>');
      }else{
        $('<div class="field field-name-field-request-karaoke-video conent-none field-label-above"><div class="field-label">Видео для выступления:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-phone');
      }
    }else{
      $('.field-name-field-request-karaoke-video-link').hide();
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_amv'){
    if(Drupal.settings.amv_video_none){
      if(Drupal.settings.amv_video_link){
        $('.field-name-field-request-amv-video-link .field-items .field-item').html('<a href="' + Drupal.settings.amv_video_link + '">' + Drupal.settings.amv_video_link + '</a>');
      }else{
        $('<div class="field field-name-field-request-amv-video conent-none field-label-above"><div class="field-label">Видео:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-phone');
      }
    }else{
      $('.field-name-field-request-amv-video-link').hide();
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_write'){
    if(Drupal.settings.fanfic_text_none){
      $('<div class="field field-name-field-request-fanfic-text conent-none field-label-above"><div class="field-label">Текст:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАН</p></div></div></div>').insertAfter('.field-name-field-request-phone');
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_master'){
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_handmade'){
    if(Drupal.settings.handmade_foto_none){
      $('<div class="field field-name-field-request-handmade-foto conent-none field-type-image field-label-above"><div class="field-label">Фото изделия:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-phone');
    }else{
      $("div.field-name-field-request-handmade-foto a").fancybox();
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_foto'){
    if(Drupal.settings.foto_foto_none){
      $('<div class="field field-name-field-request-foto-foto conent-none field-type-image field-label-above"><div class="field-label">Фото:&nbsp;</div><div class="field-items"><div class="field-item-none even"><p>НЕ ПРИСЛАНО</p></div></div></div>').insertAfter('.field-name-field-request-phone');
    }else{
      $("div.field-name-field-request-foto-foto a").fancybox();
    }
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
  if(Drupal.settings.node_type == 'request_market'){
    $(".field-name-field-request-state .field-items").css("background-color", Drupal.settings.reques_status_color);
  }
});