<?php

/**
 * @file
 * Template file for an image with fancyBox activated for the Insert module.
 *
 * Available variables:
 * - $item: The complete item being inserted.
 * - $image_path: The URL to the image.
 * - $link_path: The URL to the image that fancyBox should open.
 * - $class: A set of classes assigned to this image (if any).
 * - $gid: The ID of the fancyBox gallery.
 *
 * __alt__ and __title__ are placeholders for the Insert module.
 */

?>
<a href="<?php print $link_path; ?>" title="__title__" class="fancybox fancybox-insert-image" data-fancybox-group="<?php print $gid; ?>">
  <img typeof="foaf:Image" src="<?php print $image_path; ?>" alt="__alt__" title="__title__" class="<?php print $class; ?>" />
</a>
