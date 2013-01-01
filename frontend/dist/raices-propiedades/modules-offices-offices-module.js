(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["modules-offices-offices-module"],{

/***/ "./src/app/modules/offices/office/office.component.html":
/*!**************************************************************!*\
  !*** ./src/app/modules/offices/office/office.component.html ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "<app-header-bottom>\n  <div class=\"container title col-md-4 py-5 ml-5\"> \n    <div class=\"col-sm-12\">\n      <h1 class=\"font-weight-light text-uppercase\">Sucursal\n      <span class=\"font-weight-extrabold\">OpenDoor</span></h1>\n    </div>\n  </div>\n</app-header-bottom>\n<app-search></app-search>"

/***/ }),

/***/ "./src/app/modules/offices/office/office.component.scss":
/*!**************************************************************!*\
  !*** ./src/app/modules/offices/office/office.component.scss ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJzcmMvYXBwL21vZHVsZXMvb2ZmaWNlcy9vZmZpY2Uvb2ZmaWNlLmNvbXBvbmVudC5zY3NzIn0= */"

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