import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MailSuscribersComponent } from './mail-suscribers.component';

describe('MailSuscribersComponent', () => {
  let component: MailSuscribersComponent;
  let fixture: ComponentFixture<MailSuscribersComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MailSuscribersComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MailSuscribersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
