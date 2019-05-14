import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BlogPaginationComponent } from './blog-pagination.component';

describe('BlogPaginationComponent', () => {
  let component: BlogPaginationComponent;
  let fixture: ComponentFixture<BlogPaginationComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BlogPaginationComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BlogPaginationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
