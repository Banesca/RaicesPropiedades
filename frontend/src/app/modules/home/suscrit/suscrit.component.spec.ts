import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SuscritComponent } from './suscrit.component';

describe('SuscritComponent', () => {
  let component: SuscritComponent;
  let fixture: ComponentFixture<SuscritComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SuscritComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SuscritComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
