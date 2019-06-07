(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["modules-offices-offices-module"],{

/***/ "./src/app/modules/offices/office/office.component.html":
/*!**************************************************************!*\
  !*** ./src/app/modules/offices/office/office.component.html ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<app-header-bottom>\r\n  <div class=\"container title col-md-4 py-5 ml-5\"> \r\n    <div class=\"col-sm-12\">\r\n      <h1 class=\"font-weight-light text-uppercase\">Sucursal\r\n      <span class=\"font-weight-extrabold\">OpenDoor</span></h1>\r\n      <hr class=\"col-2 mx-0 my-1\">\r\n    </div>\r\n  </div>\r\n</app-header-bottom>\r\n<app-search></app-search>\r\n<section>\r\n  <div class=\"bg-light\">\r\n      <div class=\"container-fluid d-flex align-items-center\">\r\n        <div class=\"container col-lg-4 col-md-6 py-5 ml-lg-5\"> \r\n          <div class=\"col-sm-12\">\r\n              <h3 class=\"font-weight-light text-center text-md-left brown-text text-uppercase\">Desde 1990</h3>\r\n            </div>\r\n            <div class=\"col-sm-12\">\r\n              <h3 class=\"font-weight-extrabold text-center text-md-left brown-text text-uppercase\">Junto a usted</h3>\r\n            </div>\r\n          <p class=\"col-sm-12  text-md-left text-center brown-text\">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem aperiam obcaecati quas repellat quisquam consectetur explicabo dignissimos.</p>\r\n        </div>\r\n    <div class=\"col-md-8 d-none d-md-block\">\r\n    </div>\r\n      </div>\r\n    </div>\r\n  <div class=\"container-fluid\">\r\n    <div class=\"container  py-5 \"> \r\n          <div class=\"col-sm-12 d-flex justify-content-center\">\r\n              <h3 class=\"font-weight-light text-center text-md-left brown-text text-uppercase\">Información <span class=\"font-weight-extrabold\">de contacto</span></h3>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-4 flex-column\">\r\n              <div class=\"d-flex justify-content-center mt-4 mb-2\">\r\n              <img style=\"width: 6rem;\" src=\"../../../../assets/images/icons/Recurso 11.svg\" class=\"img-fluid\" alt=\"\">\r\n            </div>\r\n              <h5 class=\"text-brown text-center font-weight-bold\">ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus similique pla</h5>\r\n          </div>\r\n            <div class=\"col-md-4 flex-column\">\r\n              <div class=\"d-flex justify-content-center mt-4 mb-2\">\r\n              <img style=\"width: 6rem;\" src=\"../../../../assets/images/icons/Recurso 12.svg\" class=\"img-fluid\" alt=\"\">\r\n            </div>\r\n            <h5 class=\"text-brown text-center font-weight-bold\">+58 4140719316</h5>\r\n          </div>\r\n            <div class=\"col-md-4 flex-column\">\r\n              <div class=\"d-flex justify-content-center mt-4 mb-2\">\r\n              <img style=\"width: 6rem;\" src=\"../../../../assets/images/icons/Recurso 13.svg\" class=\"img-fluid\" alt=\"\">\r\n            </div>\r\n            <h5 class=\"text-brown text-center font-weight-bold\">example@correo.com</h5>\r\n          </div>  \r\n          </div>\r\n          </div>\r\n          \r\n  </div>\r\n  <div class=\"container-fluid bg-light\">\r\n      <div class=\"container  py-5 \"> \r\n            <div class=\"col-sm-12 d-flex justify-content-center\">\r\n                <h3 class=\"font-weight-light text-center text-md-left brown-text text-uppercase\">Formulario <span class=\"font-weight-extrabold\">de contacto</span></h3>\r\n            </div>\r\n            <div class=\"row\">\r\n              <div class=\"col-sm-12 my-4 d-flex justify-content-center\">\r\n                  <div class=\"py-5 bg-white contact-container shadow col-lg-5 col-md-6 w-100 d-flex justify-content-center\">\r\n                    <form>\r\n                      <div class=\"\">\r\n                      <div class=\"group\">      \r\n                        <input type=\"text\" required>\r\n                        <span class=\"highlight\"></span>\r\n                        <span class=\"bar\"></span>\r\n                        <label>Nombres</label>\r\n                      </div>\r\n                      <div class=\"group\">      \r\n                        <input type=\"text\" required>\r\n                        <span class=\"highlight\"></span>\r\n                        <span class=\"bar\"></span>\r\n                        <label>Email</label>\r\n                      </div> \r\n                      <div class=\"group\">      \r\n                          <input type=\"text\" required>\r\n                          <span class=\"highlight\"></span>\r\n                          <span class=\"bar\"></span>\r\n                          <label>Teléfono</label>\r\n                        </div> \r\n                        <div class=\"group\"> \r\n                          <textarea name=\"\" id=\"\" cols=\"30\" rows=\"3\"></textarea>     \r\n                            <span class=\"highlight\"></span>\r\n                            <span class=\"bar\"></span>\r\n                            <label>Mensaje</label>\r\n                          </div>\r\n                    </div> \r\n                    </form>\r\n              </div>\r\n          </div>\r\n          <div class=\"col-sm-12\">\r\n              <div class=\"d-flex justify-content-center\">\r\n                 <button class=\"btn shadow btn-block brown-button text-uppercase font-weight-bold col-lg-4\"\r\n                 >Enviar\r\n               </button>\r\n              </div>\r\n             </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n  </section>"

/***/ }),

/***/ "./src/app/modules/offices/office/office.component.scss":
/*!**************************************************************!*\
  !*** ./src/app/modules/offices/office/office.component.scss ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = ".group {\n  position: relative;\n  margin-bottom: 2rem; }\n\n.contact-container {\n  border-color: #39211F;\n  border-radius: 10px;\n  border: 1px solid; }\n\ninput, textarea {\n  font-size: 18px;\n  padding: 10px 10px 10px 5px;\n  display: block;\n  width: 300px;\n  border: none;\n  border-bottom: 1px solid #757575; }\n\n@media (max-width: 500px) {\n  width: 80px; }\n\ninput:focus, textarea:focus {\n  outline: none; }\n\n/* LABEL ======================================= */\n\nlabel {\n  color: #999;\n  font-size: 18px;\n  font-weight: normal;\n  position: absolute;\n  pointer-events: none;\n  left: 5px;\n  top: 10px;\n  transition: 0.2s ease all;\n  -moz-transition: 0.2s ease all;\n  -webkit-transition: 0.2s ease all; }\n\n/* active state */\n\ninput:focus ~ label, input:valid ~ label, textarea:focus ~ label {\n  top: -20px;\n  font-size: 14px;\n  color: #39211F; }\n\n/* BOTTOM BARS ================================= */\n\n.bar {\n  position: relative;\n  display: block;\n  width: 300px; }\n\n.bar:before, .bar:after {\n  content: '';\n  height: 2px;\n  width: 0;\n  bottom: 1px;\n  position: absolute;\n  background: #39211F;\n  transition: 0.2s ease all;\n  -moz-transition: 0.2s ease all;\n  -webkit-transition: 0.2s ease all; }\n\n.bar:before {\n  left: 50%; }\n\n.bar:after {\n  right: 50%; }\n\n/* active state */\n\ninput:focus ~ .bar:before, input:focus ~ .bar:after,\ntextarea:focus ~ .bar:before, textarea:focus ~ .bar:after {\n  width: 50%; }\n\n/* HIGHLIGHTER ================================== */\n\n.highlight {\n  position: absolute;\n  height: 60%;\n  width: 100px;\n  top: 25%;\n  left: 0;\n  pointer-events: none;\n  opacity: 0.5; }\n\n/* active state */\n\ninput:focus ~ .highlight, textarea:focus ~ .highlight {\n  -webkit-animation: inputHighlighter 0.3s ease;\n  animation: inputHighlighter 0.3s ease; }\n\n/* ANIMATIONS ================ */\n\n@-webkit-keyframes inputHighlighter {\n  from {\n    background: #39211F; }\n  to {\n    width: 0;\n    background: transparent; } }\n\n@keyframes inputHighlighter {\n  from {\n    background: #39211F; }\n  to {\n    width: 0;\n    background: transparent; } }\n\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvbW9kdWxlcy9vZmZpY2VzL29mZmljZS9DOlxceGFtcHBcXGh0ZG9jc1xcYWxlamFuZHJvXFxSYWljZXNQcm9waWVkYWRlc1xcZnJvbnRlbmQvc3JjXFxhcHBcXG1vZHVsZXNcXG9mZmljZXNcXG9mZmljZVxcb2ZmaWNlLmNvbXBvbmVudC5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0ksa0JBQWlCO0VBQ2pCLG1CQUFrQixFQUFBOztBQUd0QjtFQUVJLHFCQUFxQjtFQUNyQixtQkFBbUI7RUFDbkIsaUJBQWlCLEVBQUE7O0FBRW5CO0VBQ0UsZUFBYztFQUNkLDJCQUEwQjtFQUMxQixjQUFhO0VBQ2IsWUFBVztFQUNYLFlBQVc7RUFDWCxnQ0FBK0IsRUFBQTs7QUFHakM7RUFDRSxXQUFVLEVBQUE7O0FBR1o7RUFBZ0MsYUFBWSxFQUFBOztBQUU1QyxrREFBQTs7QUFDQTtFQUNFLFdBQVU7RUFDVixlQUFjO0VBQ2QsbUJBQWtCO0VBQ2xCLGtCQUFpQjtFQUNqQixvQkFBbUI7RUFDbkIsU0FBUTtFQUNSLFNBQVE7RUFDUix5QkFBd0I7RUFDeEIsOEJBQTZCO0VBQzdCLGlDQUFnQyxFQUFBOztBQUdsQyxpQkFBQTs7QUFDQTtFQUNFLFVBQVM7RUFDVCxlQUFjO0VBQ2QsY0FBYSxFQUFBOztBQUdmLGtEQUFBOztBQUNBO0VBQVEsa0JBQWlCO0VBQUUsY0FBYTtFQUFFLFlBQVcsRUFBQTs7QUFDckQ7RUFDRSxXQUFVO0VBQ1YsV0FBVTtFQUNWLFFBQU87RUFDUCxXQUFVO0VBQ1Ysa0JBQWlCO0VBQ2pCLG1CQUFrQjtFQUNsQix5QkFBd0I7RUFDeEIsOEJBQTZCO0VBQzdCLGlDQUFnQyxFQUFBOztBQUVsQztFQUNFLFNBQVEsRUFBQTs7QUFFVjtFQUNFLFVBQVMsRUFBQTs7QUFHWCxpQkFBQTs7QUFDQTs7RUFFRSxVQUFTLEVBQUE7O0FBR1gsbURBQUE7O0FBQ0E7RUFDRSxrQkFBaUI7RUFDakIsV0FBVTtFQUNWLFlBQVc7RUFDWCxRQUFPO0VBQ1AsT0FBTTtFQUNOLG9CQUFtQjtFQUNuQixZQUFXLEVBQUE7O0FBR2IsaUJBQUE7O0FBQ0E7RUFDRSw2Q0FBNEM7RUFFNUMscUNBQW9DLEVBQUE7O0FBR3RDLGdDQUFBOztBQUNBO0VBQ0k7SUFBTyxtQkFBa0IsRUFBQTtFQUMzQjtJQUFNLFFBQU87SUFBRSx1QkFBc0IsRUFBQSxFQUFBOztBQU12QztFQUNJO0lBQU8sbUJBQWtCLEVBQUE7RUFDM0I7SUFBTSxRQUFPO0lBQUUsdUJBQXNCLEVBQUEsRUFBQSIsImZpbGUiOiJzcmMvYXBwL21vZHVsZXMvb2ZmaWNlcy9vZmZpY2Uvb2ZmaWNlLmNvbXBvbmVudC5zY3NzIiwic291cmNlc0NvbnRlbnQiOlsiLmdyb3VwIFx0XHRcdCAgeyBcclxuICAgIHBvc2l0aW9uOnJlbGF0aXZlOyBcclxuICAgIG1hcmdpbi1ib3R0b206MnJlbTsgXHJcbiAgfVxyXG5cclxuLmNvbnRhY3QtY29udGFpbmVyXHJcbiAge1xyXG4gICAgYm9yZGVyLWNvbG9yOiAjMzkyMTFGO1xyXG4gICAgYm9yZGVyLXJhZGl1czogMTBweDtcclxuICAgIGJvcmRlcjogMXB4IHNvbGlkO1xyXG4gIH1cclxuICBpbnB1dCwgdGV4dGFyZWFcdFx0e1xyXG4gICAgZm9udC1zaXplOjE4cHg7XHJcbiAgICBwYWRkaW5nOjEwcHggMTBweCAxMHB4IDVweDtcclxuICAgIGRpc3BsYXk6YmxvY2s7XHJcbiAgICB3aWR0aDozMDBweDtcclxuICAgIGJvcmRlcjpub25lO1xyXG4gICAgYm9yZGVyLWJvdHRvbToxcHggc29saWQgIzc1NzU3NTtcclxuICB9XHJcbiAgXHJcbiAgQG1lZGlhIChtYXgtd2lkdGg6IDUwMHB4KXtcclxuICAgIHdpZHRoOjgwcHg7XHJcbiAgfSBcclxuXHJcbiAgaW5wdXQ6Zm9jdXMsIHRleHRhcmVhOmZvY3VzIFx0XHR7IG91dGxpbmU6bm9uZTsgfVxyXG4gIFxyXG4gIC8qIExBQkVMID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSAqL1xyXG4gIGxhYmVsIFx0XHRcdFx0IHtcclxuICAgIGNvbG9yOiM5OTk7IFxyXG4gICAgZm9udC1zaXplOjE4cHg7XHJcbiAgICBmb250LXdlaWdodDpub3JtYWw7XHJcbiAgICBwb3NpdGlvbjphYnNvbHV0ZTtcclxuICAgIHBvaW50ZXItZXZlbnRzOm5vbmU7XHJcbiAgICBsZWZ0OjVweDtcclxuICAgIHRvcDoxMHB4O1xyXG4gICAgdHJhbnNpdGlvbjowLjJzIGVhc2UgYWxsOyBcclxuICAgIC1tb3otdHJhbnNpdGlvbjowLjJzIGVhc2UgYWxsOyBcclxuICAgIC13ZWJraXQtdHJhbnNpdGlvbjowLjJzIGVhc2UgYWxsO1xyXG4gIH1cclxuICBcclxuICAvKiBhY3RpdmUgc3RhdGUgKi9cclxuICBpbnB1dDpmb2N1cyB+IGxhYmVsLCBpbnB1dDp2YWxpZCB+IGxhYmVsLHRleHRhcmVhOmZvY3VzIH4gbGFiZWxcdHtcclxuICAgIHRvcDotMjBweDtcclxuICAgIGZvbnQtc2l6ZToxNHB4O1xyXG4gICAgY29sb3I6IzM5MjExRjtcclxuICB9XHJcbiAgXHJcbiAgLyogQk9UVE9NIEJBUlMgPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09ICovXHJcbiAgLmJhciBcdHsgcG9zaXRpb246cmVsYXRpdmU7IGRpc3BsYXk6YmxvY2s7IHdpZHRoOjMwMHB4OyB9XHJcbiAgLmJhcjpiZWZvcmUsIC5iYXI6YWZ0ZXIgXHR7XHJcbiAgICBjb250ZW50OicnO1xyXG4gICAgaGVpZ2h0OjJweDsgXHJcbiAgICB3aWR0aDowO1xyXG4gICAgYm90dG9tOjFweDsgXHJcbiAgICBwb3NpdGlvbjphYnNvbHV0ZTtcclxuICAgIGJhY2tncm91bmQ6IzM5MjExRjsgXHJcbiAgICB0cmFuc2l0aW9uOjAuMnMgZWFzZSBhbGw7IFxyXG4gICAgLW1vei10cmFuc2l0aW9uOjAuMnMgZWFzZSBhbGw7IFxyXG4gICAgLXdlYmtpdC10cmFuc2l0aW9uOjAuMnMgZWFzZSBhbGw7XHJcbiAgfVxyXG4gIC5iYXI6YmVmb3JlIHtcclxuICAgIGxlZnQ6NTAlO1xyXG4gIH1cclxuICAuYmFyOmFmdGVyIHtcclxuICAgIHJpZ2h0OjUwJTsgXHJcbiAgfVxyXG4gIFxyXG4gIC8qIGFjdGl2ZSBzdGF0ZSAqL1xyXG4gIGlucHV0OmZvY3VzIH4gLmJhcjpiZWZvcmUsIGlucHV0OmZvY3VzIH4gLmJhcjphZnRlcixcclxuICB0ZXh0YXJlYTpmb2N1cyB+IC5iYXI6YmVmb3JlLCB0ZXh0YXJlYTpmb2N1cyB+IC5iYXI6YWZ0ZXIge1xyXG4gICAgd2lkdGg6NTAlO1xyXG4gIH1cclxuICBcclxuICAvKiBISUdITElHSFRFUiA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09ICovXHJcbiAgLmhpZ2hsaWdodCB7XHJcbiAgICBwb3NpdGlvbjphYnNvbHV0ZTtcclxuICAgIGhlaWdodDo2MCU7IFxyXG4gICAgd2lkdGg6MTAwcHg7IFxyXG4gICAgdG9wOjI1JTsgXHJcbiAgICBsZWZ0OjA7XHJcbiAgICBwb2ludGVyLWV2ZW50czpub25lO1xyXG4gICAgb3BhY2l0eTowLjU7XHJcbiAgfVxyXG4gIFxyXG4gIC8qIGFjdGl2ZSBzdGF0ZSAqL1xyXG4gIGlucHV0OmZvY3VzIH4gLmhpZ2hsaWdodCwgdGV4dGFyZWE6Zm9jdXMgfiAuaGlnaGxpZ2h0IHtcclxuICAgIC13ZWJraXQtYW5pbWF0aW9uOmlucHV0SGlnaGxpZ2h0ZXIgMC4zcyBlYXNlO1xyXG4gICAgLW1vei1hbmltYXRpb246aW5wdXRIaWdobGlnaHRlciAwLjNzIGVhc2U7XHJcbiAgICBhbmltYXRpb246aW5wdXRIaWdobGlnaHRlciAwLjNzIGVhc2U7XHJcbiAgfVxyXG4gIFxyXG4gIC8qIEFOSU1BVElPTlMgPT09PT09PT09PT09PT09PSAqL1xyXG4gIEAtd2Via2l0LWtleWZyYW1lcyBpbnB1dEhpZ2hsaWdodGVyIHtcclxuICAgICAgZnJvbSB7IGJhY2tncm91bmQ6IzM5MjExRjsgfVxyXG4gICAgdG8gXHR7IHdpZHRoOjA7IGJhY2tncm91bmQ6dHJhbnNwYXJlbnQ7IH1cclxuICB9XHJcbiAgQC1tb3ota2V5ZnJhbWVzIGlucHV0SGlnaGxpZ2h0ZXIge1xyXG4gICAgICBmcm9tIHsgYmFja2dyb3VuZDojMzkyMTFGOyB9XHJcbiAgICB0byBcdHsgd2lkdGg6MDsgYmFja2dyb3VuZDp0cmFuc3BhcmVudDsgfVxyXG4gIH1cclxuICBAa2V5ZnJhbWVzIGlucHV0SGlnaGxpZ2h0ZXIge1xyXG4gICAgICBmcm9tIHsgYmFja2dyb3VuZDojMzkyMTFGOyB9XHJcbiAgICB0byBcdHsgd2lkdGg6MDsgYmFja2dyb3VuZDp0cmFuc3BhcmVudDsgfVxyXG4gIH0iXX0= */"

/***/ }),

/***/ "./src/app/modules/offices/office/office.component.ts":
/*!************************************************************!*\
  !*** ./src/app/modules/offices/office/office.component.ts ***!
  \************************************************************/
/*! exports provided: OfficeComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "OfficeComponent", function() { return OfficeComponent; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");


var OfficeComponent = /** @class */ (function () {
    function OfficeComponent() {
    }
    OfficeComponent.prototype.ngOnInit = function () {
    };
    OfficeComponent = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["Component"])({
            selector: 'app-office',
            template: __webpack_require__(/*! ./office.component.html */ "./src/app/modules/offices/office/office.component.html"),
            styles: [__webpack_require__(/*! ./office.component.scss */ "./src/app/modules/offices/office/office.component.scss")]
        }),
        tslib__WEBPACK_IMPORTED_MODULE_0__["__metadata"]("design:paramtypes", [])
    ], OfficeComponent);
    return OfficeComponent;
}());



/***/ }),

/***/ "./src/app/modules/offices/offices-routing-module.ts":
/*!***********************************************************!*\
  !*** ./src/app/modules/offices/offices-routing-module.ts ***!
  \***********************************************************/
/*! exports provided: OfficesRoutingModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "OfficesRoutingModule", function() { return OfficesRoutingModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/router */ "./node_modules/@angular/router/fesm5/router.js");
/* harmony import */ var _office_office_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./office/office.component */ "./src/app/modules/offices/office/office.component.ts");




var officesRoutes = [
    { path: '', component: _office_office_component__WEBPACK_IMPORTED_MODULE_3__["OfficeComponent"] },
];
var OfficesRoutingModule = /** @class */ (function () {
    function OfficesRoutingModule() {
    }
    OfficesRoutingModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            imports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"].forChild(officesRoutes)],
            exports: [_angular_router__WEBPACK_IMPORTED_MODULE_2__["RouterModule"]]
        })
    ], OfficesRoutingModule);
    return OfficesRoutingModule;
}());



/***/ }),

/***/ "./src/app/modules/offices/offices.module.ts":
/*!***************************************************!*\
  !*** ./src/app/modules/offices/offices.module.ts ***!
  \***************************************************/
/*! exports provided: OfficesModule */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "OfficesModule", function() { return OfficesModule; });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! tslib */ "./node_modules/tslib/tslib.es6.js");
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/core */ "./node_modules/@angular/core/fesm5/core.js");
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/common */ "./node_modules/@angular/common/fesm5/common.js");
/* harmony import */ var _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shared/shared.module */ "./src/app/modules/shared/shared.module.ts");
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/forms */ "./node_modules/@angular/forms/fesm5/forms.js");
/* harmony import */ var _office_office_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./office/office.component */ "./src/app/modules/offices/office/office.component.ts");
/* harmony import */ var _offices_routing_module__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./offices-routing-module */ "./src/app/modules/offices/offices-routing-module.ts");






//Componentes

//Routes

var OfficesModule = /** @class */ (function () {
    function OfficesModule() {
    }
    OfficesModule = tslib__WEBPACK_IMPORTED_MODULE_0__["__decorate"]([
        Object(_angular_core__WEBPACK_IMPORTED_MODULE_1__["NgModule"])({
            declarations: [
                _office_office_component__WEBPACK_IMPORTED_MODULE_5__["OfficeComponent"],
            ],
            exports: [],
            imports: [
                _angular_common__WEBPACK_IMPORTED_MODULE_2__["CommonModule"],
                _offices_routing_module__WEBPACK_IMPORTED_MODULE_6__["OfficesRoutingModule"],
                _shared_shared_module__WEBPACK_IMPORTED_MODULE_3__["SharedModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_4__["ReactiveFormsModule"],
                _angular_forms__WEBPACK_IMPORTED_MODULE_4__["FormsModule"]
            ]
        })
    ], OfficesModule);
    return OfficesModule;
}());



/***/ })

}]);
//# sourceMappingURL=modules-offices-offices-module.js.map