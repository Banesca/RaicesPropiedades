import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { ICategoriaRs } from './categoria.interface';
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class CategoriaService {
  private mService = '/api/v1/transacciones/categorias';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  } 

  allCategories() { 
    return this._HttpClient
      .get(environment.apiHost + this.mService, {
        headers: getHeaders()
      })
      .pipe(
        map((res: ICategoriaRs) => {
          return res;
        })
      )
      .toPromise();
  }
}
