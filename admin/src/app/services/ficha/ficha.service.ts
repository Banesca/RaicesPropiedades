import {HttpClient} from '@angular/common/http';
import {Injectable} from '@angular/core';
import {Observable} from 'rxjs';
import {map} from 'rxjs/operators';
import {environment} from '../../../environments/environment';
import {getHeaders} from '../../misc/Headers';
import { /*IFichasRs,*/ IFichas} from './ficha.interface';

@Injectable({
  providedIn: 'root'
})

export class FichaService {

  private fService = '/api/auth/fichaPropiedad';
  private fUrl: string;

  constructor( private _HttpClient: HttpClient) {}

  All(): Observable<any> 
  {
    if (true){

      let a: any = [
        {
            "idFichas": 1,
            "titulo": "pbSUddLydd",
            "ubicacion": "mrXIrJFNbD",
            "caracteristica": "5uj7ub1oKa",
            "valor": "etHbMYTTiI",
            "comision": "89VVGHjitT",
            "img1fa": "prueba1.img",
            "img2pr": "prueba2.img",
            "img3pl": "prueba3.img",
            "img4pl": "prueba4.img",
            "img5sa": "prueba5.img",
            "img6sa": "prueba6.img",
            "fk_idPropiedad": 1,
            "urlImagen_img1fa": "http://127.0.0.1:8000/storage\\fichaPropiedad\\prueba1.img",
            "urlImagen_img2pr": "http://127.0.0.1:8000/storage\\fichaPropiedad\\prueba2.img",
            "urlImagen_img3pl": "http://127.0.0.1:8000/storage\\fichaPropiedad\\prueba3.img",
            "urlImagen_img4pl": "http://127.0.0.1:8000/storage\\fichaPropiedad\\prueba4.img",
            "urlImagen_img5sa": "http://127.0.0.1:8000/storage\\fichaPropiedad\\prueba5.img",
            "urlImagen_img6sa": "http://127.0.0.1:8000/storage\\fichaPropiedad\\prueba6.img"
        }
      ];

      let data = new Observable<any> (
        observer => {
          observer.next(a);
        }
      )
      return data;

    }else{
      return this._HttpClient.get(environment.apiHost + this.fService + '/getAll', 
      {
        headers: getHeaders()
      })
      .pipe(map(
        (res) => {
          return res;
        })
      );
    }
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
