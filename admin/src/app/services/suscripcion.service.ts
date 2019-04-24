import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type':  'application/json',
    'Access-Control-Allow-Origin': '*'
    // 'Authorization': 'my-auth-token'
  })
};

@Injectable({
  providedIn: 'root'
})
export class SuscripcionService {

  constructor(private http:HttpClient) { }
 
  _getSuscripciones(){
    return this.http.get(`${environment.apiHost}/api/v1/listarSuscripciones`,httpOptions);
  }

  _getSuscripcionesCanceladas(){
    return this.http.get(`${environment.apiHost}/api/v1/listarSuscripcionesCanceladas`,httpOptions);
  }  
  _changeStatus(idSus:number,idStatus:number){
    return this.http.put(`${environment.apiHost}/api/v1/cambiarStatusSus/`+idSus,{ 'fk_idStatusSistema' : idStatus},httpOptions);
    
  }

  _deleteSuscripciones(data:any){
    return this.http.put(`${environment.apiHost}/api/v1/cancelarSus/`+data.id,data,httpOptions);
  }

}
