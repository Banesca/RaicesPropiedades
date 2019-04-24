import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AuthbackendComponent } from './authbackend.component';

describe('AuthbackendComponent', () => {
  let component: AuthbackendComponent;
  let fixture: ComponentFixture<AuthbackendComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AuthbackendComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AuthbackendComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
