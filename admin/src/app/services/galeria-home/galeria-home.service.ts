import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IGaleriaRs, IGaleria} from '../galeria-home/galeria-home.interface'
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class GaleriaHomeService {
  private mService = 'categorias';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  } 

  allGalerias() { 
    return this._HttpClient
      .get(environment.apiHost + '/api/v1/galeria/galeria', {
        headers: getHeaders()
      })
      .pipe(
        map((res: IGaleriaRs) => {
          return res;
        })
      )
      .toPromise();
  }

  nuevaCategoria(pCategoria: IGaleria) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient
      .post(environment.apiHost + '/api/v1/enviarMailMasivos', lCategoria, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  actualizarCategoria(pCategoria: IGaleria, pKey: number) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient
      .put(environment.apiHost + '/api/v1/editarSuscripcion/' + pKey + '/' , lCategoria, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }

  eliminarCategoria(pKey: number) {
    return this._HttpClient
      .delete(environment.apiHost + '/api/v1/borrarSuscripcion' + '/' + pKey, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }
}
