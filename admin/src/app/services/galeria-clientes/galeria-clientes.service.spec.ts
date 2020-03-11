import { TestBed } from '@angular/core/testing';

import { GaleriaClientesService } from './galeria-clientes.service';

describe('GaleriaClientesService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: GaleriaClientesService = TestBed.get(GaleriaClientesService);
    expect(service).toBeTruthy();
  });
});
