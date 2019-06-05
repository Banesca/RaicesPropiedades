import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { PropiertysCarouselComponent } from './propiertys-carousel.component';

describe('PropiertysCarouselComponent', () => {
  let component: PropiertysCarouselComponent;
  let fixture: ComponentFixture<PropiertysCarouselComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ PropiertysCarouselComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PropiertysCarouselComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
