import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GaleriaClientesComponent } from './galeria-clientes.component';

describe('GaleriaClientesComponent', () => {
  let component: GaleriaClientesComponent;
  let fixture: ComponentFixture<GaleriaClientesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GaleriaClientesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GaleriaClientesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
