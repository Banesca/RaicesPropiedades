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

module.exports = ".group {\n  position: relative;\n  margin-bottom: 2rem; }\n\n.contact-container {\n  border-color: #39211F;\n  border-radius: 10px;\n  border: 1px solid; }\n\ninput, textarea {\n  font-size: 18px;\n  padding: 10px 10px 10px 5px;\n  display: block;\n  width: 300px;\n  border: none;\n  border-bottom: 1px solid #757575; }\n\n@media (max-width: 500px) {\n  width: 80px; }\n\ninput:focus, textarea:focus {\n  outline: none; }\n\n/* LABEL ======================================= */\n\nlabel {\n  color: #999;\n  font-size: 18px;\n  font-weight: normal;\n  position: absolute;\n  pointer-events: none;\n  left: 5px;\n  top: 10px;\n  transition: 0.2s ease all;\n  -moz-transition: 0.2s ease all;\n  -webkit-transition: 0.2s ease all; }\n\n/* active state */\n\ninput:focus ~ label, input:valid ~ label, textarea:focus ~ label {\n  top: -20px;\n  font-size: 14px;\n  color: #39211F; }\n\n/* BOTTOM BARS ================================= */\n\n.bar {\n  position: relative;\n  display: block;\n  width: 300px; }\n\n.bar:before, .bar:after {\n  content: '';\n  height: 2px;\n  width: 0;\n  bottom: 1px;\n  position: absolute;\n  background: #39211F;\n  transition: 0.2s ease all;\n  -moz-transition: 0.2s ease all;\n  -webkit-transition: 0.2s ease all; }\n\n.bar:before {\n  left: 50%; }\n\n.bar:after {\n  right: 50%; }\n\n/* active state */\n\ninput:focus ~ .bar:before, input:focus ~ .bar:after,\ntextarea:focus ~ .bar:before, textarea:focus ~ .bar:after {\n  width: 50%; }\n\n/* HIGHLIGHTER ================================== */\n\n.highlight {\n  position: absolute;\n  height: 60%;\n  width: 100px;\n  top: 25%;\n  left: 0;\n  pointer-events: none;\n  opacity: 0.5; }\n\n/* active state */\n\ninput:focus ~ .highlight, textarea:focus ~ .highlight {\n  -webkit-animation: inputHighlighter 0.3s ease;\n  animation: inputHighlighter 0.3s ease; }\n\n/* ANIMATIONS ================ */\n\n@-webkit-keyframes inputHighlighter {\n  from {\n    background: #39211F; }\n  to {\n    width: 0;\n    background: transparent; } }\n\n@keyframes inputHighlighter {\n  from {\n    background: #39211F; }\n  to {\n    width: 0;\n    background: transparent; } }\n\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInNyYy9hcHAvbW9kdWxlcy9vZmZpY2VzL29mZmljZS9DOlxceGFtcHBcXGh0ZG9jc1xcUmFpY2VzUHJvcGllZGFkZXNcXGZyb250ZW5kL3NyY1xcYXBwXFxtb2R1bGVzXFxvZmZpY2VzXFxvZmZpY2VcXG9mZmljZS5jb21wb25lbnQuc2NzcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtFQUNJLGtCQUFpQjtFQUNqQixtQkFBa0IsRUFBQTs7QUFHdEI7RUFFSSxxQkFBcUI7RUFDckIsbUJBQW1CO0VBQ25CLGlCQUFpQixFQUFBOztBQUVuQjtFQUNFLGVBQWM7RUFDZCwyQkFBMEI7RUFDMUIsY0FBYTtFQUNiLFlBQVc7RUFDWCxZQUFXO0VBQ1gsZ0NBQStCLEVBQUE7O0FBR2pDO0VBQ0UsV0FBVSxFQUFBOztBQUdaO0VBQWdDLGFBQVksRUFBQTs7QUFFNUMsa0RBQUE7O0FBQ0E7RUFDRSxXQUFVO0VBQ1YsZUFBYztFQUNkLG1CQUFrQjtFQUNsQixrQkFBaUI7RUFDakIsb0JBQW1CO0VBQ25CLFNBQVE7RUFDUixTQUFRO0VBQ1IseUJBQXdCO0VBQ3hCLDhCQUE2QjtFQUM3QixpQ0FBZ0MsRUFBQTs7QUFHbEMsaUJBQUE7O0FBQ0E7RUFDRSxVQUFTO0VBQ1QsZUFBYztFQUNkLGNBQWEsRUFBQTs7QUFHZixrREFBQTs7QUFDQTtFQUFRLGtCQUFpQjtFQUFFLGNBQWE7RUFBRSxZQUFXLEVBQUE7O0FBQ3JEO0VBQ0UsV0FBVTtFQUNWLFdBQVU7RUFDVixRQUFPO0VBQ1AsV0FBVTtFQUNWLGtCQUFpQjtFQUNqQixtQkFBa0I7RUFDbEIseUJBQXdCO0VBQ3hCLDhCQUE2QjtFQUM3QixpQ0FBZ0MsRUFBQTs7QUFFbEM7RUFDRSxTQUFRLEVBQUE7O0FBRVY7RUFDRSxVQUFTLEVBQUE7O0FBR1gsaUJBQUE7O0FBQ0E7O0VBRUUsVUFBUyxFQUFBOztBQUdYLG1EQUFBOztBQUNBO0VBQ0Usa0JBQWlCO0VBQ2pCLFdBQVU7RUFDVixZQUFXO0VBQ1gsUUFBTztFQUNQLE9BQU07RUFDTixvQkFBbUI7RUFDbkIsWUFBVyxFQUFBOztBQUdiLGlCQUFBOztBQUNBO0VBQ0UsNkNBQTRDO0VBRTVDLHFDQUFvQyxFQUFBOztBQUd0QyxnQ0FBQTs7QUFDQTtFQUNJO0lBQU8sbUJBQWtCLEVBQUE7RUFDM0I7SUFBTSxRQUFPO0lBQUUsdUJBQXNCLEVBQUEsRUFBQTs7QUFNdkM7RUFDSTtJQUFPLG1CQUFrQixFQUFBO0VBQzNCO0lBQU0sUUFBTztJQUFFLHVCQUFzQixFQUFBLEVBQUEiLCJmaWxlIjoic3JjL2FwcC9tb2R1bGVzL29mZmljZXMvb2ZmaWNlL29mZmljZS5jb21wb25lbnQuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi5ncm91cCBcdFx0XHQgIHsgXHJcbiAgICBwb3NpdGlvbjpyZWxhdGl2ZTsgXHJcbiAgICBtYXJnaW4tYm90dG9tOjJyZW07IFxyXG4gIH1cclxuXHJcbi5jb250YWN0LWNvbnRhaW5lclxyXG4gIHtcclxuICAgIGJvcmRlci1jb2xvcjogIzM5MjExRjtcclxuICAgIGJvcmRlci1yYWRpdXM6IDEwcHg7XHJcbiAgICBib3JkZXI6IDFweCBzb2xpZDtcclxuICB9XHJcbiAgaW5wdXQsIHRleHRhcmVhXHRcdHtcclxuICAgIGZvbnQtc2l6ZToxOHB4O1xyXG4gICAgcGFkZGluZzoxMHB4IDEwcHggMTBweCA1cHg7XHJcbiAgICBkaXNwbGF5OmJsb2NrO1xyXG4gICAgd2lkdGg6MzAwcHg7XHJcbiAgICBib3JkZXI6bm9uZTtcclxuICAgIGJvcmRlci1ib3R0b206MXB4IHNvbGlkICM3NTc1NzU7XHJcbiAgfVxyXG4gIFxyXG4gIEBtZWRpYSAobWF4LXdpZHRoOiA1MDBweCl7XHJcbiAgICB3aWR0aDo4MHB4O1xyXG4gIH0gXHJcblxyXG4gIGlucHV0OmZvY3VzLCB0ZXh0YXJlYTpmb2N1cyBcdFx0eyBvdXRsaW5lOm5vbmU7IH1cclxuICBcclxuICAvKiBMQUJFTCA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0gKi9cclxuICBsYWJlbCBcdFx0XHRcdCB7XHJcbiAgICBjb2xvcjojOTk5OyBcclxuICAgIGZvbnQtc2l6ZToxOHB4O1xyXG4gICAgZm9udC13ZWlnaHQ6bm9ybWFsO1xyXG4gICAgcG9zaXRpb246YWJzb2x1dGU7XHJcbiAgICBwb2ludGVyLWV2ZW50czpub25lO1xyXG4gICAgbGVmdDo1cHg7XHJcbiAgICB0b3A6MTBweDtcclxuICAgIHRyYW5zaXRpb246MC4ycyBlYXNlIGFsbDsgXHJcbiAgICAtbW96LXRyYW5zaXRpb246MC4ycyBlYXNlIGFsbDsgXHJcbiAgICAtd2Via2l0LXRyYW5zaXRpb246MC4ycyBlYXNlIGFsbDtcclxuICB9XHJcbiAgXHJcbiAgLyogYWN0aXZlIHN0YXRlICovXHJcbiAgaW5wdXQ6Zm9jdXMgfiBsYWJlbCwgaW5wdXQ6dmFsaWQgfiBsYWJlbCx0ZXh0YXJlYTpmb2N1cyB+IGxhYmVsXHR7XHJcbiAgICB0b3A6LTIwcHg7XHJcbiAgICBmb250LXNpemU6MTRweDtcclxuICAgIGNvbG9yOiMzOTIxMUY7XHJcbiAgfVxyXG4gIFxyXG4gIC8qIEJPVFRPTSBCQVJTID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSAqL1xyXG4gIC5iYXIgXHR7IHBvc2l0aW9uOnJlbGF0aXZlOyBkaXNwbGF5OmJsb2NrOyB3aWR0aDozMDBweDsgfVxyXG4gIC5iYXI6YmVmb3JlLCAuYmFyOmFmdGVyIFx0e1xyXG4gICAgY29udGVudDonJztcclxuICAgIGhlaWdodDoycHg7IFxyXG4gICAgd2lkdGg6MDtcclxuICAgIGJvdHRvbToxcHg7IFxyXG4gICAgcG9zaXRpb246YWJzb2x1dGU7XHJcbiAgICBiYWNrZ3JvdW5kOiMzOTIxMUY7IFxyXG4gICAgdHJhbnNpdGlvbjowLjJzIGVhc2UgYWxsOyBcclxuICAgIC1tb3otdHJhbnNpdGlvbjowLjJzIGVhc2UgYWxsOyBcclxuICAgIC13ZWJraXQtdHJhbnNpdGlvbjowLjJzIGVhc2UgYWxsO1xyXG4gIH1cclxuICAuYmFyOmJlZm9yZSB7XHJcbiAgICBsZWZ0OjUwJTtcclxuICB9XHJcbiAgLmJhcjphZnRlciB7XHJcbiAgICByaWdodDo1MCU7IFxyXG4gIH1cclxuICBcclxuICAvKiBhY3RpdmUgc3RhdGUgKi9cclxuICBpbnB1dDpmb2N1cyB+IC5iYXI6YmVmb3JlLCBpbnB1dDpmb2N1cyB+IC5iYXI6YWZ0ZXIsXHJcbiAgdGV4dGFyZWE6Zm9jdXMgfiAuYmFyOmJlZm9yZSwgdGV4dGFyZWE6Zm9jdXMgfiAuYmFyOmFmdGVyIHtcclxuICAgIHdpZHRoOjUwJTtcclxuICB9XHJcbiAgXHJcbiAgLyogSElHSExJR0hURVIgPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PSAqL1xyXG4gIC5oaWdobGlnaHQge1xyXG4gICAgcG9zaXRpb246YWJzb2x1dGU7XHJcbiAgICBoZWlnaHQ6NjAlOyBcclxuICAgIHdpZHRoOjEwMHB4OyBcclxuICAgIHRvcDoyNSU7IFxyXG4gICAgbGVmdDowO1xyXG4gICAgcG9pbnRlci1ldmVudHM6bm9uZTtcclxuICAgIG9wYWNpdHk6MC41O1xyXG4gIH1cclxuICBcclxuICAvKiBhY3RpdmUgc3RhdGUgKi9cclxuICBpbnB1dDpmb2N1cyB+IC5oaWdobGlnaHQsIHRleHRhcmVhOmZvY3VzIH4gLmhpZ2hsaWdodCB7XHJcbiAgICAtd2Via2l0LWFuaW1hdGlvbjppbnB1dEhpZ2hsaWdodGVyIDAuM3MgZWFzZTtcclxuICAgIC1tb3otYW5pbWF0aW9uOmlucHV0SGlnaGxpZ2h0ZXIgMC4zcyBlYXNlO1xyXG4gICAgYW5pbWF0aW9uOmlucHV0SGlnaGxpZ2h0ZXIgMC4zcyBlYXNlO1xyXG4gIH1cclxuICBcclxuICAvKiBBTklNQVRJT05TID09PT09PT09PT09PT09PT0gKi9cclxuICBALXdlYmtpdC1rZXlmcmFtZXMgaW5wdXRIaWdobGlnaHRlciB7XHJcbiAgICAgIGZyb20geyBiYWNrZ3JvdW5kOiMzOTIxMUY7IH1cclxuICAgIHRvIFx0eyB3aWR0aDowOyBiYWNrZ3JvdW5kOnRyYW5zcGFyZW50OyB9XHJcbiAgfVxyXG4gIEAtbW96LWtleWZyYW1lcyBpbnB1dEhpZ2hsaWdodGVyIHtcclxuICAgICAgZnJvbSB7IGJhY2tncm91bmQ6IzM5MjExRjsgfVxyXG4gICAgdG8gXHR7IHdpZHRoOjA7IGJhY2tncm91bmQ6dHJhbnNwYXJlbnQ7IH1cclxuICB9XHJcbiAgQGtleWZyYW1lcyBpbnB1dEhpZ2hsaWdodGVyIHtcclxuICAgICAgZnJvbSB7IGJhY2tncm91bmQ6IzM5MjExRjsgfVxyXG4gICAgdG8gXHR7IHdpZHRoOjA7IGJhY2tncm91bmQ6dHJhbnNwYXJlbnQ7IH1cclxuICB9Il19 */"

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