import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PropiertysListComponent } from './propiertys-list.component';

describe('PropiertysListComponent', () => {
  let component: PropiertysListComponent;
  let fixture: ComponentFixture<PropiertysListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PropiertysListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PropiertysListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
