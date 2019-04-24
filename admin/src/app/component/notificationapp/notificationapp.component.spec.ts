import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NotificationappComponent } from './notificationapp.component';

describe('NotificationappComponent', () => {
  let component: NotificationappComponent;
  let fixture: ComponentFixture<NotificationappComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NotificationappComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NotificationappComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
