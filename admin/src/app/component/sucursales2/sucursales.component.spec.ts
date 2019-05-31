import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { Sucursales2Component } from './sucursales.component';

describe('SucursalesComponent', () => {
  let component: Sucursales2Component;
  let fixture: ComponentFixture<Sucursales2Component>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ Sucursales2Component ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(Sucursales2Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
