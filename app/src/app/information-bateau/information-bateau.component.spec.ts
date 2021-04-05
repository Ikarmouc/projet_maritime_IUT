import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InformationBateauComponent } from './information-bateau.component';

describe('InformationBateauComponent', () => {
  let component: InformationBateauComponent;
  let fixture: ComponentFixture<InformationBateauComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InformationBateauComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InformationBateauComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
