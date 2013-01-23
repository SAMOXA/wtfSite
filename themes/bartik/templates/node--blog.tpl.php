<?php

/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<div class="news_title">
  <?php print $label;?>
</div>
<div class="news_row">
  <div class="news_date">
    <?php print $date;?>
  </div>
  <div class="news_body">
    <?php print $body[0]['value'];?>
    <div class = "news_author">
      <?php print $author;?>
    </div>
  </div>
</div>
<div class="news_icons">
  <a onclick="window.open('http://vkontakte.ru/share.php?url=http://'<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>, 'vkontakte', 'width=626, height=436'); return false;" href="http://vkontakte.ru/share.php?url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>" rel="nofollow"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/vkontakte.png" width="32" height="32" title="Поделиться с друзьями ВКонтакте"></a>
  <a onclick="window.open('http://www.facebook.com/sharer.php?u=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>', 'facebook', 'width=626, height=436'); return false;" rel="nofollow" href="http://www.facebook.com/sharer.php?u=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/facebook.png" width="32" height="32" title="Поделиться с друзьями в Facebook"></a>
  <a onclick="window.open('http://connect.mail.ru/share?share_url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>', 'mmir', 'width=626, height=436'); return false;" rel="nofollow" href="http://connect.mail.ru/share?share_url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/moy-mir.png" width="32" height="32" title="Поделиться с друзьями Моего Мира на Mail.ru"></a> 
  <a onclick="window.open('http://www.livejournal.com/update.bml?event=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>&subject=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>', 'lj', 'width=626, height=436'); return false;" rel="nofollow" href="http://www.livejournal.com/update.bml?event=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>" title="Опубликовать в своем блоге livejournal.com"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/livejournal.png" alt="Опубликовать в своем блоге livejournal.com" width="32" height="32"></a>
  <a onclick="window.open('http://www.google.com/reader/link?url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>&title=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>&srcURL=http://pervushin.com/', 'buzz', 'width=626, height=436'); return false;" rel="nofollow" href="http://www.google.com/reader/link?url=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>&title=http://<?php print $_SERVER['SERVER_NAME'] . "/" . $node_url?>&srcURL=http://pervushin.com/"><img src="http://<?php print $_SERVER['SERVER_NAME']?>/themes/bartik/images/google.png" width="32" height="32" title="Добавить в Google Buzz"></a>
</div>
<div id="comments">
  <?php foreach($comments as $comment): ?>
    <div class="news_comments">
      <div class="news_comment_author">
        <?php print $comment['author'] . ' написал '; ?>
      </div>
      <div class="news_comment_body">
        <?php print $comment['body']; ?>
      </div>
      <div class="news_comment_date">
        <?php print $comment['date']; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<div class="news_comment_form">
  <?php print render($content['comments']['comment_form']); ?>
</div>