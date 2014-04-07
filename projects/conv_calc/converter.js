/**
 * Created by Elmer on 4/2/14.
 */

(function ($) {
  "use strict";
  // Data types
  var binary = "binary";
  var octal = "octal";
  var decimal = "decimal";
  var hexadecimal = "hexadecimal";
  var one_complement = "one";
  var two_complement = "two";
  var unsigned = "unsigned";

  var input_radio_buttons;
  var input_binary_type;

  var output_checkboxes;
  var output_binary_type;

  // Data type selections
  var input_type = {type: decimal, binary_type: two_complement};
  var output_type = {binary: true, octal: true, decimal: true, hexadecimal: true, binary_type: two_complement};

  function init() {
    // Intercept submit event
    $('#converter').submit(submitHandler);

    // Get all input radio buttons.
    input_radio_buttons = $('form#converter #cv_input_format_checkboxes :radio');
    // Set decimal radio button checked by default
    $('#cv_type_in_dec_id').prop('checked', true);
    // Get binary type input radio buttons.
    input_binary_type = $('form#converter #cv_input_binary_format :radio');
    // Set binary type input radio buttons to disabled by default.
    input_binary_type.prop('disabled', true);
    // Set two's complement as default input value for binary format.
    $('#cv_input_bin_two_id').prop('checked', true);

    // Get all output checkboxes
    output_checkboxes = $('form#converter #cv_output_format_checkboxes :checkbox');
    // Set initial state of checkboxes to enabled.
    output_checkboxes.prop('checked', true);
    // Get binary type output radio buttons.
    output_binary_type = $('form#converter #cv_output_binary_format :radio');
    // Set binary type input radio buttons to disabled by default.
    output_binary_type.prop('disabled', false);

    // Add checkbox listener
    output_checkboxes.change(outputCheckboxHandler);
    // Add binary type radio button listener
    output_binary_type.change(outputBinaryTypeRadioButtonHandler);
    // Add input radio button listener
    input_radio_buttons.change(inputRadioButtonHandler);
    // Add binary type radio button listener
    input_binary_type.change(inputBinaryTypeRadioButtonHandler);
    // Set two's complement as default output value for binary format.
    $('#cv_output_bin_two_id').prop('checked', true);
  }

  function submitHandler(e) {
    e.preventDefault();

    console.log("Input: " + input_type.type + " two's complement: " + input_type.binary_type);
    console.log("Output bin:" + output_type.binary + " oct:" + output_type.octal + " dec:" + output_type.decimal + " hex:" + output_type.hexadecimal + " two's complement: " + output_type.binary_type);
  }

  function outputCheckboxHandler(event) {
    var checkbox = $(event.target);
    var value = checkbox.val();
    if (checkbox.is(':checked')) {
      if (value === binary) {
        $('#cv_output_bin_id').prop('disabled', false);
        output_type.binary = true;
        output_binary_type.prop('disabled', false);
      } else if (value === octal) {
        $('#cv_output_oct_id').prop('disabled', false);
        output_type.octal = true;
      } else if (value === decimal) {
        $('#cv_output_dec_id').prop('disabled', false);
        output_type.decimal = true;
      } else if (value === hexadecimal) {
        $('#cv_output_hex_id').prop('disabled', false);
        output_type.hexadecimal = true;
      }
    } else {
      if (value === binary) {
        $('#cv_output_bin_id').prop('disabled', true);
        output_type.binary = false;
        output_binary_type.prop('disabled', true);
      } else if (value === octal) {
        $('#cv_output_oct_id').prop('disabled', true);
        output_type.octal = false;
      } else if (value === decimal) {
        $('#cv_output_dec_id').prop('disabled', true);
        output_type.decimal = false;
      } else if (value === hexadecimal) {
        $('#cv_output_hex_id').prop('disabled', true);
        output_type.hexadecimal = false;
      }
    }
  }

  function outputBinaryTypeRadioButtonHandler(event) {
    var radio = $(event.target);
    var value = radio.val();
    if (value === one_complement) {
      output_type.binary_type = one_complement;
    } else if (value === two_complement) {
      output_type.binary_type = two_complement;
    } else if (value === unsigned) {
      output_type.binary_type = unsigned;
    }
  }

  function inputRadioButtonHandler(event) {
    var radio = $(event.target);
    var value = radio.val();
    input_binary_type.prop('disabled', true);
    if (value === binary) {
      input_binary_type.prop('disabled', false);
    }
    input_type.type = value;
  }

  function inputBinaryTypeRadioButtonHandler(event) {
    var radio = $(event.target);
    var value = radio.val();
    if (value === one_complement) {
      input_type.binary_type = one_complement;
    } else if (value === two_complement) {
      input_type.binary_type = two_complement;
    } else if (value === unsigned) {
      input_type.binary_type = unsigned
    }
  }

  $(document).ready(init);
}(jQuery));

