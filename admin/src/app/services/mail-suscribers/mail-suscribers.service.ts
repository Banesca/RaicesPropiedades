import { environment } from "../../../environments/environment";
import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { map } from "rxjs/operators";
import {
  IMailSuscriber,
  IMailSuscriberRs,
  ISuscriberRs
} from "./mail-suscriber.interface";
import { getHeaders } from "../../misc/Headers";

@Injectable({
  providedIn: "root"
})
export class MailSuscribersService {
  constructor(private _HttpClient: HttpClient) {}

  allCategorias() {
    return this._HttpClient
      .get(environment.apiHost + "/api/v1/ListarMensajesMailMasivos", {
        headers: getHeaders()
      })
      .pipe(
        map((data: IMailSuscriberRs) => {
          return data;
        })
      )
      .toPromise();
  }

  allSuscribers() {
    return this._HttpClient
      .get(environment.apiHost + "/api/v1/suscripcion/listarSuscripciones", {
        headers: getHeaders()
      })
      .pipe(
        map((data: ISuscriberRs) => {
          return data;
        })
      )
      .toPromise();
  }

  nuevaCategoria(pCategoria: IMailSuscriber) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient
      .post(environment.apiHost + "/api/v1/enviarMailMasivos", lCategoria, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  //suscriptores
  search(data: any) {
    return this._HttpClient
      .post(
        environment.apiHost + "/api/v1/suscripcion/buscarSuscripcionPorEmail",
        data,
        { headers: getHeaders() }
      )
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  //mail a suscriptores
  filter(data: any) {
    return this._HttpClient
      .post(environment.apiHost + "/api/v1/suscripcion/filter", data, {
        headers: getHeaders()
      })
      .pipe(
        map((res: any) => {
          return res;
        })
      )
      .toPromise();
  }
}
