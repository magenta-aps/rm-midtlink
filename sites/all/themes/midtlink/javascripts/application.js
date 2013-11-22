jQuery(document).ready(function() {
	jQuery('.tooltip').tipsy({gravity: 's'});

	jQuery('#modal').jqm({modal: true});
	jQuery('#modal').jqmShow();


  /* USER MENU */
  jQuery(".dropdown dt a").click(function() {

    // Change the behaviour of onclick states for links within the menu.
    var toggleId = "#" + this.id.replace(/^link/,"ul");

    // Hides all other menus depending on JQuery id assigned to them
    jQuery(".dropdown dd ul").not(toggleId).hide();

    //Only toggles the menu we want since the menu could be showing and we want to hide it.
    jQuery(toggleId).toggle();

    //Change the css class on the menu header to show the selected class.
    if(jQuery(toggleId).css("display") == "none"){
      jQuery(this).removeClass("selected");
    }else{
      jQuery(this).addClass("selected");
    }
  });

  jQuery(".dropdown dd ul li a").click(function() {

      // This is the default behaviour for all links within the menus
      var text = jQuery(this).html();
      jQuery(".dropdown dt a span").html(text);
      jQuery(".dropdown dd ul").hide();
  });

  jQuery(document).bind('click', function(e) {

      // Lets hide the menu when the page is clicked anywhere but the menu.
      var jQueryclicked = jQuery(e.target);
      if (! jQueryclicked.parents().hasClass("dropdown")){
          jQuery(".dropdown dd ul").hide();0
      jQuery(".dropdown dt a").removeClass("selected");
    }

  });

  //jQuery('.tooltipped').tooltip();

});


// Always show the submit button for editablefields forms,
// even if there's only 1 editable field.
Drupal.behaviors.always_show_editablefields_submit = {
    attach: function (context) {
        $('.editablefield-item').once('editablefield', function() {
            // Always show the submit button
            $(this).find('input.form-submit').show();
            $(this).find('input[type=text],input[type=radio],textarea,select').change(function() {});
        });
    }
};