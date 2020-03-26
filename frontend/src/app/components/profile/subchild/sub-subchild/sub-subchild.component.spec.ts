import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SubSubchildComponent } from './sub-subchild.component';

describe('SubSubchildComponent', () => {
  let component: SubSubchildComponent;
  let fixture: ComponentFixture<SubSubchildComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SubSubchildComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SubSubchildComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
