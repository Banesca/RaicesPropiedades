import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NavUnoComponent } from './nav-uno.component';

describe('NavUnoComponent', () => {
  let component: NavUnoComponent;
  let fixture: ComponentFixture<NavUnoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NavUnoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NavUnoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
