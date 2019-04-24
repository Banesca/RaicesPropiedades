import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NavDosComponent } from './nav-dos.component';

describe('NavDosComponent', () => {
  let component: NavDosComponent;
  let fixture: ComponentFixture<NavDosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NavDosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NavDosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
