/**
 * Created by Elmer on 4/2/14.
 */
(function ($) {
  "use strict";

  function processRequest(input_type, output_type, input_value) {
    if (input_type.type === LCA.binary) {
      console.log("Input: Binary");
    } else if (input_type.type === LCA.octal) {
      console.log("Input: Octal");
    } else if (input_type.type === LCA.decimal) {
      if (output_type.binary) {
        var result = decimalToBinary(input_value, input_type.binary_type);
        window.output_targets.binary.val(result);
      }
    } else if (input_type.type === LCA.hexadecimal) {
      console.log("Input: Hexadecimal");
    }
  }

  function decimalToBinary(value, bin_output_type) {
    var number = parseInt($.trim(value));
    var negative = number < 0;
    var binary = "";
    if (bin_output_type === LCA.unsigned) {
      while (number !== 0) {
        binary = (number % 2) + binary;
        number = Math.floor(number / 2);
      }
      return binary;
    } else if (bin_output_type === LCA.two_complement) {
      var binary = "";
      while (number !== 0) {
        binary = (number % 2) + binary;
        number = Math.floor(number / 2);
      }
      return binary;
    } else if (bin_output_type === LCA.one_complement) {
      var binary = "";
      while (number !== 0) {
        binary = (number % 2) + binary;
        number = Math.floor(number / 2);
      }
      return binary;
    }

  }

  var LCA = {};
  LCA.binary = "binary";
  LCA.binary = "binary";
  LCA.octal = "octal";
  LCA.decimal = "decimal";
  LCA.hexadecimal = "hexadecimal";
  LCA.one_complement = "one";
  LCA.two_complement = "two";
  LCA.unsigned = "unsigned";
  LCA.processRequest = processRequest;

  window.LCA = LCA;
}(jQuery));

(function ($) {
  "use strict";
  // Data types
  var input_radio_buttons;
  var input_binary_type;

  var output_checkboxes;
  var output_binary_type;

  // Data type selections
  var input_value;
  var input_type = {type: window.LCA.decimal, binary_type: window.LCA.two_complement};
  var output_type = {
    binary: true,
    octal: true,
    decimal: true,
    hexadecimal: true,
    binary_type: window.LCA.two_complement
  };

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

    var output_targets = {
      binary: $('#cv_output_bin_id'),
      octal: $('#cv_output_oct_id'),
      decimal: $('#cv_output_dec_id'),
      hexadecimal: $('#cv_output_hex_id')
    };

    window.output_targets = output_targets;
  }

  function submitHandler(e) {
    e.preventDefault();
    input_value = $('#cv_input_id').val();
    window.LCA.processRequest(input_type, output_type, input_value);
  }

  function outputCheckboxHandler(event) {
    var checkbox = $(event.target);
    var value = checkbox.val();
    if (checkbox.is(':checked')) {
      if (value === window.LCA.binary) {
        $('#cv_output_bin_id').prop('disabled', false);
        output_type.binary = true;
        output_binary_type.prop('disabled', false);
      } else if (value === window.LCA.octal) {
        $('#cv_output_oct_id').prop('disabled', false);
        output_type.octal = true;
      } else if (value === window.LCA.decimal) {
        $('#cv_output_dec_id').prop('disabled', false);
        output_type.decimal = true;
      } else if (value === window.LCA.hexadecimal) {
        $('#cv_output_hex_id').prop('disabled', false);
        output_type.hexadecimal = true;
      }
    } else {
      if (value === window.LCA.binary) {
        $('#cv_output_bin_id').prop('disabled', true);
        output_type.binary = false;
        output_binary_type.prop('disabled', true);
      } else if (value === window.LCA.octal) {
        $('#cv_output_oct_id').prop('disabled', true);
        output_type.octal = false;
      } else if (value === window.LCA.decimal) {
        $('#cv_output_dec_id').prop('disabled', true);
        output_type.decimal = false;
      } else if (value === window.LCA.hexadecimal) {
        $('#cv_output_hex_id').prop('disabled', true);
        output_type.hexadecimal = false;
      }
    }
  }

  function outputBinaryTypeRadioButtonHandler(event) {
    var radio = $(event.target);
    var value = radio.val();
    if (value === window.LCA.one_complement) {
      output_type.binary_type = window.LCA.one_complement;
    } else if (value === window.LCA.two_complement) {
      output_type.binary_type = window.LCA.two_complement;
    } else if (value === window.LCA.unsigned) {
      output_type.binary_type = window.LCA.unsigned;
    }
  }

  function inputRadioButtonHandler(event) {
    var radio = $(event.target);
    var value = radio.val();
    input_binary_type.prop('disabled', true);
    if (value === window.LCA.binary) {
      input_binary_type.prop('disabled', false);
    }
    input_type.type = value;
  }

  function inputBinaryTypeRadioButtonHandler(event) {
    var radio = $(event.target);
    var value = radio.val();
    if (value === window.LCA.one_complement) {
      input_type.binary_type = window.LCA.one_complement;
    } else if (value === window.LCA.two_complement) {
      input_type.binary_type = window.LCA.two_complement;
    } else if (value === window.LCA.unsigned) {
      input_type.binary_type = window.LCA.unsigned;
    }
  }

  $(document).ready(init);
}(jQuery));

