/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/core/js/custom/documentation/editors/tinymce/hidden.js":
/*!*********************************************************************************!*\
  !*** ./resources/assets/core/js/custom/documentation/editors/tinymce/hidden.js ***!
  \*********************************************************************************/
/***/ (() => {

eval(" // Class definition\n\nvar KTFormsTinyMCEHidden = function () {\n  // Private functions\n  var exampleHidden = function exampleHidden() {\n    tinymce.init({\n      selector: '#kt_docs_tinymce_hidden',\n      menubar: false,\n      plugins: ['advlist autolink lists link image charmap print preview anchor', 'searchreplace visualblocks code fullscreen', 'insertdatetime media table paste imagetools wordcount'],\n      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',\n      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'\n    });\n  };\n\n  return {\n    // Public Functions\n    init: function init() {\n      exampleHidden();\n    }\n  };\n}(); // On document ready\n\n\nKTUtil.onDOMContentLoaded(function () {\n  KTFormsTinyMCEHidden.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2NvcmUvanMvY3VzdG9tL2RvY3VtZW50YXRpb24vZWRpdG9ycy90aW55bWNlL2hpZGRlbi5qcy5qcyIsIm1hcHBpbmdzIjoiQ0FFQTs7QUFDQSxJQUFJQSxvQkFBb0IsR0FBRyxZQUFXO0FBQ2xDO0FBQ0EsTUFBSUMsYUFBYSxHQUFHLFNBQWhCQSxhQUFnQixHQUFXO0FBQzNCQyxJQUFBQSxPQUFPLENBQUNDLElBQVIsQ0FBYTtBQUNUQyxNQUFBQSxRQUFRLEVBQUUseUJBREQ7QUFFVEMsTUFBQUEsT0FBTyxFQUFFLEtBRkE7QUFHVEMsTUFBQUEsT0FBTyxFQUFFLENBQ0wsZ0VBREssRUFFTCw0Q0FGSyxFQUdMLHVEQUhLLENBSEE7QUFRVEMsTUFBQUEsT0FBTyxFQUFFLGdKQVJBO0FBU0xDLE1BQUFBLGFBQWEsRUFBRTtBQVRWLEtBQWI7QUFXSCxHQVpEOztBQWNBLFNBQU87QUFDSDtBQUNBTCxJQUFBQSxJQUFJLEVBQUUsZ0JBQVc7QUFDYkYsTUFBQUEsYUFBYTtBQUNoQjtBQUpFLEdBQVA7QUFNSCxDQXRCMEIsRUFBM0IsQyxDQXdCQTs7O0FBQ0FRLE1BQU0sQ0FBQ0Msa0JBQVAsQ0FBMEIsWUFBVztBQUNqQ1YsRUFBQUEsb0JBQW9CLENBQUNHLElBQXJCO0FBQ0gsQ0FGRCIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvY29yZS9qcy9jdXN0b20vZG9jdW1lbnRhdGlvbi9lZGl0b3JzL3RpbnltY2UvaGlkZGVuLmpzPzQ4ZTEiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcblxyXG4vLyBDbGFzcyBkZWZpbml0aW9uXHJcbnZhciBLVEZvcm1zVGlueU1DRUhpZGRlbiA9IGZ1bmN0aW9uKCkge1xyXG4gICAgLy8gUHJpdmF0ZSBmdW5jdGlvbnNcclxuICAgIHZhciBleGFtcGxlSGlkZGVuID0gZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgdGlueW1jZS5pbml0KHtcclxuICAgICAgICAgICAgc2VsZWN0b3I6ICcja3RfZG9jc190aW55bWNlX2hpZGRlbicsXHJcbiAgICAgICAgICAgIG1lbnViYXI6IGZhbHNlLFxyXG4gICAgICAgICAgICBwbHVnaW5zOiBbXHJcbiAgICAgICAgICAgICAgICAnYWR2bGlzdCBhdXRvbGluayBsaXN0cyBsaW5rIGltYWdlIGNoYXJtYXAgcHJpbnQgcHJldmlldyBhbmNob3InLFxyXG4gICAgICAgICAgICAgICAgJ3NlYXJjaHJlcGxhY2UgdmlzdWFsYmxvY2tzIGNvZGUgZnVsbHNjcmVlbicsXHJcbiAgICAgICAgICAgICAgICAnaW5zZXJ0ZGF0ZXRpbWUgbWVkaWEgdGFibGUgcGFzdGUgaW1hZ2V0b29scyB3b3JkY291bnQnXHJcbiAgICAgICAgICAgIF0sXHJcbiAgICAgICAgICAgIHRvb2xiYXI6ICdpbnNlcnRmaWxlIHVuZG8gcmVkbyB8IHN0eWxlc2VsZWN0IHwgYm9sZCBpdGFsaWMgfCBhbGlnbmxlZnQgYWxpZ25jZW50ZXIgYWxpZ25yaWdodCBhbGlnbmp1c3RpZnkgfCBidWxsaXN0IG51bWxpc3Qgb3V0ZGVudCBpbmRlbnQgfCBsaW5rIGltYWdlJyxcclxuICAgICAgICAgICAgICAgIGNvbnRlbnRfc3R5bGU6ICdib2R5IHsgZm9udC1mYW1pbHk6SGVsdmV0aWNhLEFyaWFsLHNhbnMtc2VyaWY7IGZvbnQtc2l6ZToxNHB4IH0nXHJcbiAgICAgICAgfSk7XHJcbiAgICB9XHJcblxyXG4gICAgcmV0dXJuIHtcclxuICAgICAgICAvLyBQdWJsaWMgRnVuY3Rpb25zXHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24oKSB7XHJcbiAgICAgICAgICAgIGV4YW1wbGVIaWRkZW4oKTtcclxuICAgICAgICB9XHJcbiAgICB9O1xyXG59KCk7XHJcblxyXG4vLyBPbiBkb2N1bWVudCByZWFkeVxyXG5LVFV0aWwub25ET01Db250ZW50TG9hZGVkKGZ1bmN0aW9uKCkge1xyXG4gICAgS1RGb3Jtc1RpbnlNQ0VIaWRkZW4uaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktURm9ybXNUaW55TUNFSGlkZGVuIiwiZXhhbXBsZUhpZGRlbiIsInRpbnltY2UiLCJpbml0Iiwic2VsZWN0b3IiLCJtZW51YmFyIiwicGx1Z2lucyIsInRvb2xiYXIiLCJjb250ZW50X3N0eWxlIiwiS1RVdGlsIiwib25ET01Db250ZW50TG9hZGVkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/assets/core/js/custom/documentation/editors/tinymce/hidden.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/core/js/custom/documentation/editors/tinymce/hidden.js"]();
/******/ 	
/******/ })()
;