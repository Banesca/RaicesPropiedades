import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IFichas, IFichasRs } from './ficha.interface';
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})

export class FichaService {

  private fService = '/api/auth/fichas';
  private fUrl: string;

  constructor( private _HttpClient: HttpClient) {}

  All() {
    return this._HttpClient.get(environment.apiHost + this.fService + '/getAll', {
      headers: getHeaders()
    }).pipe(
      map((res:IFichasRs) => {
        return res;
      })
    );
  }

  agregarFicha(ficha: IFichas){
    return this._HttpClient.post(
      environment.apiHost + this.fService + '/agregar', 
      ficha, 
      {
        headers: getHeaders()
      }
    ).pipe(
      map((data: any) => {
        return data;
      })
    ).toPromise(); 
  }

  actualizarFicha(ficha: IFichas, fKey: number) {
    return this._HttpClient.post(
      environment.apiHost + this.fService + 'editar' + fKey, 
      ficha,
      {
        headers: getHeaders()
      }
    ).pipe(
      map((data: any) => {
        return data;
      })
    ).toPromise(); 
  }


  eliminarFicha(fKey: number) {
    return this._HttpClient.delete(
      environment.apiHost + this.fService + '/borrar/' + fKey, 
        { 
          headers: getHeaders() 
        }
      ).pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }

}
