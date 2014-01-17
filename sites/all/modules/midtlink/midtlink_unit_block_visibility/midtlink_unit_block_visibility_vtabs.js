(function ($) {

/**
 * Provide summary information for vertical tabs.
 */
Drupal.behaviors.scheduler_settings = {
  attach: function (context) {
  // Provide summary when editting a node.
  $('fieldset#edit-contexts', context).drupalSetSummary(function(context) {
      var vals = [];
      if ($("fieldset#edit-contexts input:checkbox:checked").length > 0) {
        vals.push(Drupal.t('Per-Unit'));
      }
      if (!vals.length) {
        vals.push(Drupal.t('All units (Default block)'));
      }
      return vals.join('<br/>');
    });
  }
};

})(jQuery);
