<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php foreach($news as $rows):?>
  <div class="news_title">
    <?php print $rows['label'];?>
  </div>
  <div class="news_row">
    <div class="news_date">
      <?php print $rows['date'];?>
    </div>
    <div class="news_body">
      <?php print $rows['body'];?>
      <div class = "news_author">
        <?php print $rows['author'];?>
      </div>
    </div>
  </div>
  <div class="news_icons">
    <a onclick="window.open('http://vkontakte.ru/share.php?url=http://'<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>, 'vkontakte', 'width=626, height=436'); return false;" href="http://vkontakte.ru/share.php?url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>" rel="nofollow"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/vkontakte.png" width="32" height="32" title="Поделиться с друзьями ВКонтакте"></a>
    <a onclick="window.open('http://www.facebook.com/sharer.php?u=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>', 'facebook', 'width=626, height=436'); return false;" rel="nofollow" href="http://www.facebook.com/sharer.php?u=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/facebook.png" width="32" height="32" title="Поделиться с друзьями в Facebook"></a>
    <a onclick="window.open('http://connect.mail.ru/share?share_url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>', 'mmir', 'width=626, height=436'); return false;" rel="nofollow" href="http://connect.mail.ru/share?share_url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/moy-mir.png" width="32" height="32" title="Поделиться с друзьями Моего Мира на Mail.ru"></a> 
    <a onclick="window.open('http://www.livejournal.com/update.bml?event=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>&subject=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>', 'lj', 'width=626, height=436'); return false;" rel="nofollow" href="http://www.livejournal.com/update.bml?event=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>" title="Опубликовать в своем блоге livejournal.com"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/livejournal.png" alt="Опубликовать в своем блоге livejournal.com" width="32" height="32"></a>
    <a onclick="window.open('http://www.google.com/reader/link?url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>&title=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>&srcURL=http://pervushin.com/', 'buzz', 'width=626, height=436'); return false;" rel="nofollow" href="http://www.google.com/reader/link?url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>&title=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $rows['node_url']?>&srcURL=http://pervushin.com/"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/google.png" width="32" height="32" title="Добавить в Google Buzz"></a>
    <div class="comments_count">
      <?php print $rows['comments_count'] ?>
    </div>
  </div>
<?php endforeach;?>