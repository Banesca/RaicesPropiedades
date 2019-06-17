import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders, HttpResponse } from '@angular/common/http';
import { ConfigFooter } from '../models/config-footer'; 
import { environment } from '../../environments/environment';
import {Observable} from'rxjs'
import { map } from 'rxjs/operators';
const httpOptions = {
  headers: new HttpHeaders({
   // 'Content-Type':  'application/json',
   'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
  })
};

@Injectable({
  providedIn: 'root'
})

export class ConfgFooterService {


  constructor(
    private http: HttpClient,
    ) { }

  _getConfigFooter(){
    return this.http.get(`${environment.apiHost}/api/v1/config/get`,httpOptions);
  }

  _upgradeConfigFooter(data:any){
    return this.http.post(`${environment.apiHost}/api/auth/config/agregarActualizar`,data,httpOptions);
  }
  _getMails(){
    return this.http.get(`${environment.apiHost}/api/v1/listar/mails`,httpOptions);
  }
  _addMail(data:any){
    return this.http.post(`${environment.apiHost}/api/auth/addMail`,data,httpOptions);
  }

  
  eliminarCategoria(pKey: any) {
    return this.http
      .delete(environment.apiHost + '/api/auth/borrarMail/' + pKey, httpOptions)
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }
 
}
