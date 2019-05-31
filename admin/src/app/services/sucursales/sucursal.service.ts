import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';

import { getHeaders } from '../../misc/Headers';
import { Sucursal } from './sucursal';

@Injectable({
  providedIn: 'root'
})
export class SucursalService {

  constructor(
    private _HttpClient: HttpClient
  ) { }

  getAll() {
    return this._HttpClient
      .post(environment.apiHost + '/api/v1/sucursal/listar',null, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  addNew(sucursal: any) {
/*     const data = JSON.stringify(sucursal); */
    return this._HttpClient
      .post(environment.apiHost+'/api/auth/sucursal/add', sucursal, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
}
