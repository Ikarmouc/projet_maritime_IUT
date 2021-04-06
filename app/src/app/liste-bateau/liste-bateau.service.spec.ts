import { TestBed } from '@angular/core/testing';

import { ListeBateauService } from './liste-bateau.service';

describe('ListeBateauService', () => {
  let service: ListeBateauService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ListeBateauService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
