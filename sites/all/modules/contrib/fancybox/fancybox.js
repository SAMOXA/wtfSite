/**
 * @file
 * Integration file for fancyBox module.
 */

(function($) {
  Drupal.behaviors.fancyBox = {
    attach: function(context, settings) {
      if (typeof settings.fancybox.options === 'undefined') {
        settings.fancybox.options = {};
      }

      if (typeof settings.fancybox.callbacks !== 'undefined') {
        $.each(settings.fancybox.callbacks, function(i, val) {
          settings.fancybox.options[i] = window[val];
        });
      }

      if (typeof settings.fancybox.helpers !== 'undefined') {
        settings.fancybox.options.helpers = settings.fancybox.helpers;
      }

      if (typeof settings.fancybox.selectors !== 'undefined') {
        $.each(settings.fancybox.selectors, function(i, val) {
          $($.trim(val), context).fancybox(settings.fancybox.options);
        });
      }

      $('.fancybox', context).fancybox(settings.fancybox.options);
    }
  };
})(jQuery);
