import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PropiertysGridComponent } from './propiertys-grid.component';

describe('PropiertysGridComponent', () => {
  let component: PropiertysGridComponent;
  let fixture: ComponentFixture<PropiertysGridComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PropiertysGridComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PropiertysGridComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
