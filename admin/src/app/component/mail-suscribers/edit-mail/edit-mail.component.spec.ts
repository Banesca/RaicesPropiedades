import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditMailComponent } from './edit-mail.component';

describe('EditMailComponent', () => {
  let component: EditMailComponent;
  let fixture: ComponentFixture<EditMailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditMailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditMailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
