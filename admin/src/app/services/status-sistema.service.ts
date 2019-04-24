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
export class StatusSistemaService {

  constructor(
    private http:HttpClient
  ) { }

  _getStatusSistema(){
    return this.http.get(`${environment.apiHost}/api/v1/status-sistema`,httpOptions);
  }
}
