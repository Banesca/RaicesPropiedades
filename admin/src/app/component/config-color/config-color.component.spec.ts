import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConfigColorComponent } from './config-color.component';

describe('ConfigColorComponent', () => {
  let component: ConfigColorComponent;
  let fixture: ComponentFixture<ConfigColorComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConfigColorComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConfigColorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
