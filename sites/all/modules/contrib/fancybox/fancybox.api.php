<?php

/**
 * Modify fancyBox settings just before being rendered to Javascript.
 *
 * Implement this hook for settings that do not appear on the module's
 * interface, settings that are dependent on taxonomy, etc.
 *
 * @param &$options array
 *   An associative array of fancyBox options.
 * @param &$helpers array
 *   An associative array of fancyBox helpers and their options.
 *
 * @see http://fancyapps.com/fancybox/#docs
 */
function hook_fancybox_settings_alter(&$options, &$helpers) {
  $options['tpl'] = array(
    'closeBtn' => '<a title="Close this window" class="fancybox-item fancybox-close" href="javascript:;"></a>',
  );
}
