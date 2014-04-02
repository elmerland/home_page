/**
 * Created by Elmer on 4/2/14.
 */

(function ($) {
  "use strict";
  var binary = "binary";
  var octal = "octal";
  var decimal = "decimal";
  var hexadecimal = "hexadecimal";
  var one_comp = "one";
  var two_comp = "two";

  var output_checkboxes;
  var input_radiobuttons;
  var binary_type_radiobuttons;

  function init() {
    // Intercept submit event
    $('#converter').submit(submitHandler);
    // Initially check all checkboxes
    output_checkboxes = $('form#converter #cv_output_format_checkboxes :checkbox');
    output_checkboxes.prop('checked', true);
    input_radiobuttons = $('form#converter #cv_input_format_checkboxes :checkbox');
    $('#cv_type_in_dec_id').prop('checked', true);
    binary_type_radiobuttons = $('form#converter #cv_input_binary_format :radio');
    binary_type_radiobuttons.prop('disabled', true);
    // Add checkbox listener
    $('form#converter :checkbox').change(checkboxChangeHandler);
    $('form#converter :radio').change(radioButtonChangeHandler);
  }

  function submitHandler(e) {
    e.preventDefault();
  }

  function checkboxChangeHandler(event) {
    var checkbox = $(event.target);
    var value = checkbox.val();
    if (checkbox.is(':checked')) {
      if (value === binary) {
        $('#cv_output_bin_id').prop('disabled', false);
      } else if (value === octal) {
        $('#cv_output_oct_id').prop('disabled', false);
      } else if (value === decimal) {
        $('#cv_output_dec_id').prop('disabled', false);
      } else if (value === hexadecimal) {
        $('#cv_output_hex_id').prop('disabled', false);
      }
    } else {
      if (value === binary) {
        $('#cv_output_bin_id').prop('disabled', true);
      } else if (value === octal) {
        $('#cv_output_oct_id').prop('disabled', true);
      } else if (value === decimal) {
        $('#cv_output_dec_id').prop('disabled', true);
      } else if (value === hexadecimal) {
        $('#cv_output_hex_id').prop('disabled', true);
      }
    }
  }

  function radioButtonChangeHandler(event) {
    var radio = $(event.target);
    var value = radio.val();
    if (value === binary) {
      binary_type_radiobuttons.prop('disabled', false);
    } else {
      binary_type_radiobuttons.prop('disabled', true);
    }
  }

  $(document).ready(init);
}(jQuery));

