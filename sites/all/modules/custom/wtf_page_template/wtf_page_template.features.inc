<?php
/**
 * @file
 * wtf_page_template.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function wtf_page_template_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "page_manager" && $api == "pages_default") {
    return array("version" => "1");
  }
}
