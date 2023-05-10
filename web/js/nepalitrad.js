'use strict';

(function (nepalify, jQuery) {

  // array to hold unicode values - maps unicode values with ascii indices
  /* --------------------------------------------------------------------------
     ASCII printable characters begin at decimal 32 and end at 126
     but Array begins at 0 and ends at 94
     hence necessary increment/decrement should be done ( by 32 )
     --------------------------------------------------------------------------
     */
  var unicodeRomanToNepaliMap = [
 '\u0020',	// SPACE
'\u0021',	// ! -> !
'\u0942',	// ' ->
'\u0918',	// # -> घ
'\u0926\u094D\u0927',	// $ -> द्ध
'\u091B',	// % -> छ
'\u0920',	// & -> ठ
'\u0941',	// ' -> 
'\u0922',	// ( -> ढ
'\u0923',	// ) -> ण
'\u0921',	// * -> ड
'\u200C',	// + -> ZWNJ
'\u002C',	// , -> ,
'\u0914',	// - -> औ
'\u0964',	// . -> ।
'\u0930',	// / -> र
'\u0966',	// 0 -> ०
'\u0967',	// 1 -> १
'\u0968',	// 2 -> २
'\u0969',	// 3 -> ३
'\u096A',	// 4 -> ४
'\u096B',	// 5 -> ५
'\u096C',	// 6 -> ६
'\u096D',	// 7 -> ७
'\u096E',	// 8 -> ८
'\u096F',	// 9 -> ९
'\u003A',	// : -> :
'\u0938',	// ; -> स
'\u0919',	// < -> ङ
'\u200D',	// = -> ZWJ
'\u0936\u094D\u0930',	// > -> श्र
'\u0930\u0941',	// ? -> रु
'\u0908',	// @ -> ई
'\u0906',	// A -> आ
'\u094C',	//B->ौ
'\u090B',	//C->ऋ
'\u0919\u094D\u0917',	//D->ङ्ग
'\u0910',	//E->ऐ
'\u0901',	//F->ँ
'\u0928',	//G->न
'\u091D',	//H->झ
'\u0915\u094D\u0937',	//I->क्ष
'\u094B',	//J->ो
'\u092B',	//K->फ
'\u0940',	//L->ी
'\u0921\u094D\u0921',	//M->ड्ड
'\u0926\u094D\u092F',	//N->द्य
'\u0907',	//O->इ
'\u090F',	//P->ए
'\u0924\u094D\u0924',	//Q->त्त
'\u0926\u094D\u0935',	//R->द्व
'\u0919\u094D\u0915',	//S->ङ्क
'\u091F\u094D\u091F',	//T->ट्ट
'\u090A',	//U->ऊ
'\u0950',	//V->ॐ
'\u0921\u094D\u0922',	//W->ड्ढ
'\u0939\u094D\u092F',	//X->ह्य
'\u0920\u094D\u0920',	//Y->ठ्ठ
'\u0936',	//Z->श
'\u0907',	//[->र्
'\u094D',	//\->
'\u0947',	//]->े
'\u091F',	//^->ट
'\u0913',	//_->ओ
'\u091E',	//`->ञ
'\u092C',	//a->ब
'\u0926',	//b->द
'\u0905',	//c->अ
'\u092E',	//d->म
'\u092D',	//e->भ
'\u093E',	//f->ा
'\u0928',	//g->न
'\u091C',	//h->ज
'\u0937',	//i->ष
'\u0935',	//j->व
'\u092A',	//k->प
'\u093F',	//l->ि
'\u0903',	//m->ः
'\u0932',	//n->ल
'\u092F',	//o->य
'\u0909',	//p->उ
'\u0924\u094D\u0930',	//q->त्र
'\u091A',	//r->च
'\u0915',	//s->क
'\u0924',	//t->त
'\u0917',	//u->ग
'\u0916',	//v->ख
'\u0927',	//w->ध
'\u0939',	//x->ह
'\u0925',	//y->थ
'\u0936',	//z->श
'\u0943',	//{->ृ
'\u0902',	//|->ं
'\u0948',	//}->ै
'\u091E' ,	//~->ञ
'.'//ALT128
];

  // Default class to be nepalified
  var nepalifyClass = 'nepalify';

  // variable that holds the toggle state, intially false
  // on page load, toggle is called which toggles on
  // nepalify because the state is initially false, i.e. toggled off
  var nepalifyToggled = false;

  // Return the unicode of the key passed ( else return the key itself )
  function romanToNepaliUnicodeChar(keyCode, array)
  {
    debugger
    if (keyCode === 199) {
    
      return array[95];
    }
    return array[keyCode - 32];
  }

  // Wrapper function for the keymap function
  function unicodify(character)
  {
    return romanToNepaliUnicodeChar(character, unicodeRomanToNepaliMap);
  }

  // Extracted from StackOverflow
  // http://stackoverflow.com/questions/3622818/ies-document-selection-createrange-doesnt-include-leading-or-trailing-blank-li
  function getInputSelection(el) {
    var start = 0, end = 0, normalizedValue, range,
    textInputRange, len, endRange;

    if (typeof el.selectionStart === 'number' && typeof el.selectionEnd === 'number') {
      start = el.selectionStart;
      end = el.selectionEnd;
    } else {
      range = document.selection.createRange();

      if (range && range.parentElement() === el) {
        len = el.value.length;
        normalizedValue = el.value.replace(/\r\n/g, '\n');

        // Create a working TextRange that lives only in the input
        textInputRange = el.createTextRange();
        textInputRange.moveToBookmark(range.getBookmark());

        // Check if the start and end of the selection are at the very end
        // of the input, since moveStart/moveEnd doesn't return what we want
        // in those cases
        endRange = el.createTextRange();
        endRange.collapse(false);

        if (textInputRange.compareEndPoints('StartToEnd', endRange) > -1) {
          start = end = len;
        } else {
          start = -textInputRange.moveStart('character', -len);
          start += normalizedValue.slice(0, start).split('\n').length - 1;

          if (textInputRange.compareEndPoints('EndToEnd', endRange) > -1) {
            end = len;
          } else {
            end = -textInputRange.moveEnd('character', -len);
            end += normalizedValue.slice(0, end).split('\n').length - 1;
          }
        }
      }
    }

    return {
      start: start,
      end: end
    };
  }

  // Extracted from StackOverflow
  // http://stackoverflow.com/questions/8928660/setselectionrange-not-behaving-the-same-way-across-browsers
  // Set the caret position in the right manner across all browsers
  //
  function adjustOffset(el, offset) {
    var val = el.value, newOffset = offset;
    if (val.indexOf('\r\n') > -1) {
      var matches = val.replace(/\r\n/g, '\n').slice(0, offset).match(/\n/g);
      newOffset += matches ? matches.length : 0;
    }
    return newOffset;
  }

  function setCaretToPos(input, selectionStart, selectionEnd) {
    // input.focus();
    if (input.setSelectionRange) {
      selectionStart = adjustOffset(input, selectionStart);
      selectionEnd = adjustOffset(input, selectionEnd);
      input.setSelectionRange(selectionStart, selectionEnd);

    } else if (input.createTextRange) {
      var range = input.createTextRange();
      range.collapse(true);
      range.moveEnd('character', selectionEnd);
      range.moveStart('character', selectionStart);
      range.select();
    }
  }

  // Initialize the Nepalify
  function initialize() {
    // Only on the selected classes
    jQuery('.' + nepalifyClass).keypress(function (event) {

      // Only on input fields and textareas
      if (event.target.type === 'text' || event.target.type === 'textarea') {
        var eventKey = event.which;
  
        if (eventKey < 200 && eventKey > 32) {
          event.preventDefault();
          event.stopPropagation();

          var target = event.target;

          var selectionTarget = getInputSelection(target);
          var selectionStart = selectionTarget.start;
          var selectionEnd = selectionTarget.end;

          var nepalifiedKey = unicodify(eventKey);

          target.value =  target.value.substring(0, selectionStart) + nepalifiedKey + target.value.substring(selectionEnd);
          setCaretToPos(target, selectionStart + nepalifiedKey.length, selectionStart + nepalifiedKey.length);

        }
      }
      nepalifyToggled = true;
    });
  }

  // Common handler for un/binding keypress events
  function keypressUnbindCallbackHandler() {
    nepalifyToggled = false;
  }


  // Destroy the keypress handler -> Disable nepalify
  function terminate() {
    // Only on the selected classes
    jQuery('.' + nepalifyClass).unbind('keypress', keypressUnbindCallbackHandler());
  }

  // Set custom class
  nepalify.setNepalifyClass = function (customClass) {
    terminate();
    if (customClass === undefined || customClass === '') {
      nepalifyClass = 'nepalify';
    } else {
      nepalifyClass = customClass;
    }
    initialize();
  };

  // Toggle nepalify
  nepalify.toggle = function () {
    if (nepalifyToggled === true) {
      terminate();
    } else if (nepalifyToggled === false) {
      initialize();
    }
  };

  // Initialize on page load
  nepalify.toggle();

})(window.nepalify = window.nepalify || {}, window.jQuery);
