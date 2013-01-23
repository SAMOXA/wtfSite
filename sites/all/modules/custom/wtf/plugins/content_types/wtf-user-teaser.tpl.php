<?php global $user; ?> 
<div class="user-teaser">
  <div>
    <?php print $teaser_title; ?>
  </div>
  <?php if ($user->uid != 0): ?>
  <div>
    <?php print $teaser_links; ?>
  </div>
  <div class="user-teaser_exit">
    <?php print $teaser_links_exit; ?>
  </div>
  <?php endif; ?>
</div>