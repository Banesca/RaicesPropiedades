import { Injectable } from "@angular/core";
import { Observable } from "rxjs";
import { map } from "rxjs/operators";
import { environment } from "../../../environments/environment";
import { getHeaders } from "../../misc/Headers";
import { /*IFichasRs,*/ IFichas } from "./ficha.interface";
import { HttpClient, HttpHeaders } from "@angular/common/http";

@Injectable({
  providedIn: "root",
})
export class FichaService {
  private cabeceraPrueba = { "Content-Type": "application/json" };

  private fService = "/api/v1/fichaPropiedad";
  //private fService = '/api/auth/fichaPropiedad';
  private fUrl: string;

  constructor(private _HttpClient: HttpClient) {}

  All(): Observable<any> {
    return this._HttpClient
      .get(environment.apiHost + this.fService + "/getAll", {
        headers: this.cabeceraPrueba,
        //headers: getHeaders()
      })
      .pipe(
        map((res) => {
          return res;
        })
      );
  }

  goToPdf(id: number) {
    window.open(
      `${environment.apiHost}/api/v1/fichaPropiedad/pdf/${id}`,
      "_blank"
    );
  }

  agregarFicha(ficha) {
    return this._HttpClient
      .post<any>(environment.apiHost + this.fService + "/agregar", ficha, {
        headers: new HttpHeaders({
          "Access-Control-Allow-Origin": "*",
          Authorization: "Bearer " + localStorage.getItem("access_token"),
        }),
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  actualizarFicha(ficha, fKey) {
    return this._HttpClient
      .post(environment.apiHost + this.fService + "/editar/" + fKey, ficha, {
        headers: this.cabeceraPrueba,
        //headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  eliminarFicha(fKey: number) {
    return this._HttpClient
      .delete(environment.apiHost + this.fService + "/borrar/" + fKey, {
        headers: this.cabeceraPrueba,
        //headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
}
