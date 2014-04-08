/**
 * Created by Elmer on 4/2/14.
 */

(function () {
  "use strict";
  /**
   * Converts a signed integer into a two's complement representation of binary.
   * @param dec_num A signed integer
   * @returns {*} A two's complement binary representation of the signed integer.
   */
  function parserTwoComplement(dec_num) {
    var result, i;
    if (dec_num >= 0) {
      result = parserUnsigned(dec_num);
      // Add zero in front if most significant bit is one.
      if (result.charAt(0) === "1") {
        result = "0" + result;
      }
      // Pad result to next 4 bit length.
      result = padToStep(result, 4);
    } else {
      // Get two's complement representation of absolute value.
      result = parserTwoComplement(Math.abs(dec_num));

      // Flip bits
      var flipped = [];
      for (i = 0; i < result.length; i++) {
        if (result.charAt(i) === "0") {
          flipped.push("1");
        } else {
          flipped.push("0");
        }
      }

      // Add one
      if (flipped[flipped.length - 1] === "0") { // Last bit is zero.
        flipped[flipped.length - 1] = "1";
      } else { // Last bit is not zero
        flipped[flipped.length - 1] = "0";
        for (i = flipped.length - 2; i >= 0; i--) {
          if (flipped[i] === "0") {
            flipped[i] = "1";
            break;
          } else {
            flipped[i] = "0";
          }
        }
      }

      // Concatenate result.
      result = "";
      for (i = 0; i < flipped.length; i++) {
        result += flipped[i];
      }
    }
    return result;
  }

  /**
   * Converts a signed integers into a one's complement binary representation.
   * @param dec_num A signed integer.
   * @returns {*} A one's complement binary representation of the signed integer.
   */
  function parserOneComplement(dec_num) {
    var result;
    if (dec_num >= 0) {
      result = parserUnsigned(dec_num);
      if (result.charAt(0) === "1") {
        result = "0" + result;
      }
      return padToStep(result, 4);
    } else {
      var abs = parserOneComplement(Math.abs(dec_num));

      // Flip bits
      result = "";
      for (var i = 0; i < abs.length; i++) {
        if (abs.charAt(i) === "0") {
          result += "1";
        } else {
          result += "0";
        }
      }
    }
    return result;
  }

  /**
   * Converts a unsigned integer into binary.
   * @param dec_num An unsigned integer
   * @returns {string} The binary representation of the unsigned integer.
   */
  function parserUnsigned(dec_num) {
    var bin_num = "";
    while (dec_num !== 0) {
      bin_num = (dec_num % 2) + bin_num;
      dec_num = Math.floor(dec_num / 2);
    }
    return bin_num;
  }

  /**
   * Adds padding zeroes to the given value so that the length of the string
   * matches is such that length % step  = 0.
   * @param value The value to be padded.
   * @param step The offset to which the value will be padded.
   * @returns {*} The original value plus that padding that was added if any.
   */
  function padToStep(value, step) {
    if (value.length % step === 0) {
      return value;
    } else {
      var padding_len = step - (value.length % step);
      var padding = "";
      for (var i = 0; i < padding_len; i++) {
        padding += "0";
      }
      return padding + value;
    }
  }

  var parser = {};
  parser.parseTwoComplement = parserTwoComplement;
  parser.parserOneComplement = parserOneComplement;
  parser.parserUnsigned = parserUnsigned;

  window.parser = parser;
}());

(function ($) {
  "use strict";

  function processRequest(input_type, output_type, input_value) {
    if (input_type.type === LCA.binary) {
      console.log("Input: Binary");
    } else if (input_type.type === LCA.octal) {
      console.log("Input: Octal");
    } else if (input_type.type === LCA.decimal) {
      if (output_type.binary) {
        var result = decimalToBinary(input_value, output_type.binary_type);
        window.output_targets.binary.val(result);
      }
    } else if (input_type.type === LCA.hexadecimal) {
      console.log("Input: Hexadecimal");
    }
  }

  function spaceOutput(str, step) {
    var result = "";
    var j = 0;
    for (var i = str.length - 1; i >= 0; i--, j++) {
      if (j !== 0 && j % step === 0) {
        result = " " + result;
      }
      result = str.charAt(i) + result;
    }
    return result;
  }

  function decimalToBinary(value, bin_output_type) {
    // Parser input value into decimal.
    var number = parseInt($.trim(value));
    // Check binary output type.
    var result;
    if (bin_output_type === LCA.unsigned) {
      if (number < 0) {
        return "Error: Negative number";
      } else {
        result = window.parser.parserUnsigned(number);
        return spaceOutput(result, 4);
      }
    } else if (bin_output_type === LCA.two_complement) {
      result = window.parser.parseTwoComplement(number);
      return spaceOutput(result, 4);
    } else if (bin_output_type === LCA.one_complement) {
      result = window.parser.parserOneComplement(number);
      return spaceOutput(result, 4);
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

    window.output_targets = {
      binary: $('#cv_output_bin_id'),
      octal: $('#cv_output_oct_id'),
      decimal: $('#cv_output_dec_id'),
      hexadecimal: $('#cv_output_hex_id')
    };
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

