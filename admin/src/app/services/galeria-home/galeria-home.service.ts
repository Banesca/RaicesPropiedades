import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IMailSuscriber, IMailSuscriberRs, ISuscriberRs, ISuscriber } from '../mail-suscribers/mail-suscriber.interface'
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

  allCategorias() { 
    return this._HttpClient
      .get(environment.apiHost + '/api/v1/ListarMensajesMailMasivos', {
        headers: getHeaders()
      })
      .pipe(
        map((data: IMailSuscriberRs) => {
          return data;
        })
      )
      .toPromise();
  }

  nuevaCategoria(pCategoria: IMailSuscriber) {
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
  actualizarCategoria(pCategoria: IMailSuscriber, pKey: number) {
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
