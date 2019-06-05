import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PropiertysComponent } from './propiertys.component';

describe('PropiertysComponent', () => {
  let component: PropiertysComponent;
  let fixture: ComponentFixture<PropiertysComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PropiertysComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PropiertysComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
