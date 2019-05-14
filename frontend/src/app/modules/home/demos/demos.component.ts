import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-demos',
  templateUrl: './demos.component.html',
  styleUrls: ['./demos.component.scss']
})
export class DemosComponent implements OnInit {

  a: boolean = true;
  b: boolean = false;
  c: boolean = false;
  d: boolean = false;

  demos: any = [{
    type: 'web',
    name: 'Proyecto Umbani App Web',
    url: 'assets/img/test.jpg'
  },{
    type: 'web',
    name: 'Proyecto Umbani App Web',
    url: 'assets/img/test.jpg'
  },{
    type: 'web',
    name: 'Proyecto Umbani App Web',
    url: 'assets/img/test.jpg'
  },{
    type: 'web',
    name: 'Proyecto Umbani App Web',
    url: 'assets/img/test.jpg'

  },
  {
    type: 'movil',
    name: 'Proyecto Umbani App Móvil',
    url: 'assets/img/test.jpg'
  },{
    type: 'movil',
    name: 'Proyecto Umbani App Móvil',
    url: 'assets/img/test.jpg'
  },{
    type: 'movil',
    name: 'Proyecto Umbani App Móvil',
    url: 'assets/img/test.jpg'
  },{
    type: 'movil',
    name: 'Proyecto Umbani App Móvil',
    url: 'assets/img/test.jpg'

  },
  {
    type: 'software',
    name: 'Proyecto Umbani App Software',
    url: 'assets/img/test.jpg'
  },{
    type: 'software',
    name: 'Proyecto Umbani App Software',
    url: 'assets/img/test.jpg'
  },{
    type: 'software',
    name: 'Proyecto Umbani App Software',
    url: 'assets/img/test.jpg'
  },{
    type: 'software',
    name: 'Proyecto Umbani App Software',
    url: 'assets/img/test.jpg'

  },
];

  constructor() { }

  ngOnInit() {
  }

  setAll() {
    this.a = true;
    this.b = false;
    this.c = false;
    this.d = false;
  }
  setWeb() {
    this.a = false;
    this.b = true;
    this.c = false;
    this.d = false;
  }
  setMovil() {
    this.a = false;
    this.b = false;
    this.c = true;
    this.d = false;
  }
  setSoftware() {
    this.a = false;
    this.b = false;
    this.c = false;
    this.d = true;
  }

}
