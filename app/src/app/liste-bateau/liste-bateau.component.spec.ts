import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeBateauComponent } from './liste-bateau.component';

describe('ListeBateauComponent', () => {
  let component: ListeBateauComponent;
  let fixture: ComponentFixture<ListeBateauComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ListeBateauComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ListeBateauComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
