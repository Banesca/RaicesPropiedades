import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PublicacionesFacebookComponent } from './publicaciones-facebook.component';

describe('PublicacionesFacebookComponent', () => {
  let component: PublicacionesFacebookComponent;
  let fixture: ComponentFixture<PublicacionesFacebookComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PublicacionesFacebookComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PublicacionesFacebookComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
