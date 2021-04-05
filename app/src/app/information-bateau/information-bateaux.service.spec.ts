import { TestBed } from '@angular/core/testing';

import { InformationBateauxService } from './information-bateaux.service';

describe('InformationBateauxService', () => {
  let service: InformationBateauxService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(InformationBateauxService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
