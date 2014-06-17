/*
 *
 * Copyright (c) 2006-2011 Sam Collett (http://www.texotela.co.uk)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 * 
 * Version 1.3
 * Demo: http://www.texotela.co.uk/code/jquery/numeric/
 *
 */
(function($) {
    /*
     * Allows only valid characters to be entered into input boxes.
     * Note: fixes value when pasting via Ctrl+V, but not when using the mouse to paste
     *      side-effect: Ctrl+A does not work, though you can still use the mouse to select (or double-click to select all)
     *
     * @name     numeric
     * @param    config      { decimal : "." , negative : true }
     * @param    callback     A function that runs if the number is not valid (fires onblur)
     * @author   Sam Collett (http://www.texotela.co.uk)
     * @example  $(".numeric").numeric();
     * @example  $(".numeric").numeric(","); // use , as separater
     * @example  $(".numeric").numeric({ decimal : "," }); // use , as separator
     * @example  $(".numeric").numeric({ negative : false }); // do not allow negative values
     * @example  $(".numeric").numeric(null, callback); // use default values, pass on the 'callback' function
     *
     */
    $.fn.numeric = function(config, callback)
    {
        this.removeNumeric();

        if (typeof config === 'boolean')
        {
            config = {decimal: config};
        }
        config = config || {};
        // if config.negative undefined, set to true (default is to allow negative numbers)
        if (typeof config.negative == "undefined")
            config.negative = true;
        // set decimal point
        if (typeof config.decimal == "undefined")
            config.decimal = false;

        var decimal = (config.decimal === false) ? "" : config.decimal || ".";

        // allow negatives
        var negative = (config.negative === true) ? true : false;
        // allow numbers and letters
        var numbers_letters = (config.numbers_letters === true) ? true : false;
        // allow only letters
        var onlyletters = (config.onlyletters === true) ? true : false;
        // allow only letters to lower
        var tolower = (config.tolower === true) ? true : false;
        // allow only space
        var allowspace = (config.allowspace === true) ? true : false;
        // allow email
        var email = (config.email === true) ? true : false;
        
        decimal = numbers_letters || onlyletters ? false : decimal;
        negative = numbers_letters || onlyletters ? false : negative;

        if(email) {
            numbers_letters = allowspace = tolower = true;
            decimal = negative = onlyletters = false;
        }

        // callback function
        var callback = typeof callback == "function" ? callback : function() {
        };
        // set data and methods
        return this.data("numeric.onlyletters", onlyletters)
                .data("numeric.tolower", tolower)
                .data("numeric.allowspace", allowspace)
                .data("numeric.numbers_letters", numbers_letters)
                .data("numeric.email", email)
                .data("numeric.decimal", decimal)
                .data("numeric.negative", negative)
                .data("numeric.callback", callback)
                .keypress($.fn.numeric.keypress)
                .keyup($.fn.numeric.keyup)
                .blur($.fn.numeric.blur)
                // disable copy paste.
                .bind('copy paste cut', function(_evt) {
                    _evt.preventDefault();
                    return false;
                }).on('copy paste cut', function(_evt) {
            _evt.preventDefault();
            return false;
        }).attr({
            autocomplete: 'off',
            autocorrect: 'off',
            autocapitalize: 'off',
            spellcheck: 'false'
        });
    };

    $.fn.numeric.keypress = function(e)
    {
        // get decimal character and determine if negatives are allowed
        var decimal = $.data(this, "numeric.decimal");
        var negative = $.data(this, "numeric.negative");
        var numbers_letters = $.data(this, "numeric.numbers_letters");
        var onlyletters = $.data(this, "numeric.onlyletters");
        var tolower = $.data(this, "numeric.tolower");
        var allowspace = $.data(this, "numeric.allowspace");
        var email = $.data(this, "numeric.email");

        // get the key that was pressed
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;

        //window.console.log('tolower = ' + key);

        // not allowed empty like first character and double space separator
        if (allowspace)
        {
            var _lastcharcode = this.value.charCodeAt(this.value.length - 1);

            if ((key == 32 && this.value.length == 0)
                    || (key == 32 && _lastcharcode == 32))
            {
                return false;
            }
        } else if (key == 32) {
            // not allowed empty
            return false;
        }

        if (onlyletters || numbers_letters)
        {
            var _lastcharcode = this.value.charCodeAt(this.value.length - 1);
            
            var _if = (key == 45 || key == 95);
            var _and_if = (_lastcharcode == 45 || _lastcharcode == 95);

            if ((_if && this.value.length == 0)
                    || (_if && _and_if))
            {
                return false;
            }
            
            if(email)
            {
                _if = (key == 46 || key == 64);
                _and_if = (_lastcharcode == 46 || _lastcharcode == 64);
    
                if ((_if && this.value.length == 0)
                        || (_if && _and_if))
                {
                    return false;
                }                
            }
        }

        if (key == 161
                || key == 172
                || key == 176
                || key == 191
                || (key > 34 && key < 40)
                || (key > 122 && key < 127))
        {
            return false;
        }

        // allow enter/return key (only when in an input box)
        if (key == 13 && this.nodeName.toLowerCase() == "input")
        {
            return true;
        }
        else if (key == 13)
        {
            return false;
        }
        var allow = false;
        // allow Ctrl+A
        if ((e.ctrlKey && key == 97 /* firefox */) || (e.ctrlKey && key == 65) /* opera */)
            return true;
        // allow Ctrl+X (cut)
        if ((e.ctrlKey && key == 120 /* firefox */) || (e.ctrlKey && key == 88) /* opera */)
            return true;
        // allow Ctrl+C (copy)
        if ((e.ctrlKey && key == 99 /* firefox */) || (e.ctrlKey && key == 67) /* opera */)
            return true;
        // allow Ctrl+Z (undo)
        if ((e.ctrlKey && key == 122 /* firefox */) || (e.ctrlKey && key == 90) /* opera */)
            return true;
        // allow or deny Ctrl+V (paste), Shift+Ins
        if ((e.ctrlKey && key == 118 /* firefox */) || (e.ctrlKey && key == 86) /* opera */
                || (e.shiftKey && key == 45))
            return true;

        // if a number was not pressed
        if (key < 48 || key > 57)
        {
            if (allowspace && key == 32) /*space*/ {
                return true;
            }

            if (onlyletters || numbers_letters)
            {                
                if (tolower)
                {
                    //[A-Z][Ñ]
                    if (key > 64 && key < 91 || key == 209)
                    {
                        return false;
                    }
                }
                
                if (email)
                {
                    //[-][@]
                    if (key == 46 || key == 64)
                    {
                        return true;
                    }                    
                }

                //[az-AZ][ñ-Ñ]
                if (key > 64 && key < 91
                        || key > 94 && key < 213
                        || key == 37 /* left */
                        || key == 39 /* right */
                        || key == 45 /* underscore */
                        || key == 209
                        || key == 241)
                {
                    return true;
                }
            }

            /* '-' only allowed at start and if negative numbers allowed */
            if (this.value.indexOf("-") != 0 && negative && key == 45 && (this.value.length == 0 || ($.fn.getSelectionStart(this)) == 0))
                return true;
            /* only one decimal separator allowed */
            if (decimal && key == decimal.charCodeAt(0) && this.value.indexOf(decimal) != -1)
            {
                allow = false;
            }
            // check for other keys that have special purposes
            if (
                    key != 8 /* backspace */ &&
                    key != 9 /* tab */ &&
                    key != 13 /* enter */ &&
                    key != 35 /* end */ &&
                    key != 36 /* home */ &&
                    key != 37 /* left */ &&
                    key != 39 /* right */ &&
                    key != 46 /* del */
                    )
            {
                allow = false;
            }
            else
            {
                // for detecting special keys (listed above)
                // IE does not support 'charCode' and ignores them in keypress anyway
                if (typeof e.charCode != "undefined")
                {
                    // special keys have 'keyCode' and 'which' the same (e.g. backspace)
                    if (e.keyCode == e.which && e.which != 0)
                    {
                        allow = true;
                        // . and delete share the same code, don't allow . (will be set to true later if it is the decimal point)
                        if (e.which == 46)
                            allow = false;
                    }
                    // or keyCode != 0 and 'charCode'/'which' = 0
                    else if (e.keyCode != 0 && e.charCode == 0 && e.which == 0)
                    {
                        allow = true;
                    }
                }
            }
            // if key pressed is the decimal and it is not already in the field
            if (decimal && key == decimal.charCodeAt(0))
            {
                if (this.value.indexOf(decimal) == -1)
                {
                    allow = true;
                }
                else
                {
                    allow = false;
                }
            }
        }
        else
        {
            if (onlyletters)
            {
                allow = false;
            }
            else if (numbers_letters)
            {
                allow = true;
            } else {

                if (decimal != "") {

                    // allow only amount int seven by default.
                    var dot = this.value.indexOf(decimal);

                    if (dot == -1 && (this.value.length + 1) > 7)
                    {
                        allow = false;
                    }
                    else
                    {
                        // allow only dot if character is zero.
                        if (this.value === '0' && dot == -1)
                        {
                            allow = false;
                        } else {
                            // allow only 2 decimal after point
                            if (dot > 0 && this.value.substring(dot + 1).length > 1)
                            {
                                allow = false;
                            }
                            else
                            {
                                allow = true;
                            }
                        }
                    }
                } else {
                    allow = true;
                }

            }
        }
        return allow;
    };

    $.fn.numeric.keyup = function(e)
    {
        var val = this.value;
        if (val.length > 0)
        {
            // get carat (cursor) position
            var carat = $.fn.getSelectionStart(this);

            // get decimal character and determine if negatives are allowed
            var decimal = $.data(this, "numeric.decimal");
            var negative = $.data(this, "numeric.negative");
            var numbers_letters = $.data(this, "numeric.numbers_letters");
            var onlyletters = $.data(this, "numeric.onlyletters");
            var tolower = $.data(this, "numeric.tolower");
            var email = $.data(this, "numeric.email");

            // prepend a 0 if necessary
            if (decimal != "")
            {
                // find decimal point
                var dot = val.indexOf(decimal);

                // if dot at start, add 0 before
                if (dot == 0)
                {
                    this.value = "0" + val;
                }
                // if dot at position 1, check if there is a - symbol before it
                if (dot == 1 && val.charAt(0) == "-")
                {
                    this.value = "-0" + val.substring(1);
                }

                if (decimal != "") {

                    // allow only amount int seven by default.
                    if (dot == -1 && val.length > 7)
                    {
                        this.value = val.substring(0, 7);
                    }
                }

                val = this.value;
            }

            // if pasted in, only allow the following characters
            var validChars = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, '-', decimal];

            if (onlyletters)
            {
                if (tolower)
                {
                    validChars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

                } else {
                    validChars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                }
            }
            else if (numbers_letters)
            {
                if (tolower)
                {
                    if (email)
                    {
                        validChars = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
                            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '@', '-', '.'];
                    } else {
                        validChars = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
                            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
                    }
                } else {
                    validChars = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
                        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                }
            }

            // get length of the value (to loop through)
            var length = val.length;
            // loop backwards (to prevent going out of bounds)
            for (var i = length - 1; i >= 0; i--)
            {
                var ch = val.charAt(i);
                
                // remove '-' if it is in the wrong place
                if (i != 0 && ch == "-")
                {
                    val = val.substring(0, i) + val.substring(i + 1);
                }
                // remove character if it is at the start, a '-' and negatives aren't allowed
                else if (i == 0 && (!negative || negative == '') && ch == "-")
                {
                    val = val.substring(1);
                }
                
                var validChar = false;
                // loop through validChars
                for (var j = 0; j < validChars.length; j++)
                {
                    // if it is valid, break out the loop
                    if (ch == validChars[j])
                    {
                        validChar = true;
                        break;
                    }
                }
                // if not a valid character, or a space, remove
                if (!onlyletters && !numbers_letters && (!validChar || ch == " "))
                {
                    val = val.substring(0, i) + val.substring(i + 1);
                }
            }

            if (onlyletters || numbers_letters) {
                return;
            }

            // remove extra decimal characters
            var firstDecimal = val.indexOf(decimal);

            if (firstDecimal > 0)
            {
                for (var i = length - 1; i > firstDecimal; i--)
                {
                    var ch = val.charAt(i);
                    // remove decimal character
                    if (ch == decimal)
                    {
                        val = val.substring(0, i) + val.substring(i + 1);
                    }
                }
            }
            // set the value and prevent the cursor moving to the end
            this.value = val;
            $.fn.setSelection(this, carat);
        }
    };

    $.fn.numeric.blur = function()
    {
        var decimal = $.data(this, "numeric.decimal");
        var callback = $.data(this, "numeric.callback");
        var val = this.value;
        if (val != "")
        {
            var re = new RegExp("^\\d+$|\\d*" + decimal + "\\d+");
            if (!re.exec(val))
            {
                callback.apply(this);
            }
        }
    };

    $.fn.removeNumeric = function()
    {
        return this.data("numeric.onlyletters", null)
                .data("numeric.tolower", null)
                .data("numeric.allowspace", null)
                .data("numeric.numbers_letters", null)
                .data("numeric.email", null)
                .data("numeric.decimal", null)
                .data("numeric.negative", null)
                .data("numeric.callback", null)
                .unbind("keypress", $.fn.numeric.keypress)
                .unbind("blur", $.fn.numeric.blur)
                .attr({
                    autocomplete: 'on',
                    autocorrect: 'on',
                    autocapitalize: 'on',
                    spellcheck: 'true'
                });
        ;
    };

    // Based on code from http://javascript.nwbox.com/cursor_position/ (Diego Perini <dperini@nwbox.com>)
    $.fn.getSelectionStart = function(o)
    {
        if (o.createTextRange)
        {
            var r = document.selection.createRange().duplicate();
            r.moveEnd('character', o.value.length);
            if (r.text == '')
                return o.value.length;
            return o.value.lastIndexOf(r.text);
        } else
            return o.selectionStart;
    }

// set the selection, o is the object (input), p is the position ([start, end] or just start)
    $.fn.setSelection = function(o, p)
    {
        // if p is number, start and end are the same
        if (typeof p == "number")
            p = [p, p];
        // only set if p is an array of length 2
        if (p && p.constructor == Array && p.length == 2)
        {
            if (o.createTextRange)
            {
                var r = o.createTextRange();
                r.collapse(true);
                r.moveStart('character', p[0]);
                r.moveEnd('character', p[1]);
                r.select();
            }
            else if (o.setSelectionRange)
            {
                o.focus();
                //o.setSelectionRange(p[0], p[1]);
            }
        }
    }

})(jQuery);