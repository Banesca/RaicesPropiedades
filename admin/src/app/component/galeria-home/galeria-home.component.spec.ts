import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GaleriaHomeComponent } from './galeria-home.component';

describe('GaleriaHomeComponent', () => {
  let component: GaleriaHomeComponent;
  let fixture: ComponentFixture<GaleriaHomeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GaleriaHomeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GaleriaHomeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
