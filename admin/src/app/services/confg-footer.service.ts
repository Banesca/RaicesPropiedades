import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders, HttpResponse } from '@angular/common/http';
import { ConfigFooter } from '../models/config-footer'; 
import { environment } from '../../environments/environment';
import {Observable} from'rxjs'
import { map } from 'rxjs/operators';
import { getHeaders } from '../misc/Headers';


@Injectable({
  providedIn: 'root'
})

export class ConfgFooterService {


  constructor(
    private http: HttpClient,
    ) { }

  _getConfigFooter(){
    return this.http.get(`${environment.apiHost}/api/v1/config/get`,{
        headers: getHeaders()
      });
  }

  _upgradeConfigFooter(data:any){
    return this.http.post(`${environment.apiHost}/api/auth/config/agregarActualizar`,data,{
        headers: getHeaders()
      });
  }
  _getMails(){
    return this.http.get(`${environment.apiHost}/api/v1/listar/mails`,{
        headers: getHeaders()
      });
  }
  _addMail(val:any){
    return this.http.post(`${environment.apiHost}/api/auth/addMail`, val,{
        headers: getHeaders()
      });
  }

  
  eliminarCategoria(pKey: any) {
    return this.http
      .delete(environment.apiHost + '/api/auth/borrarMail/' + pKey, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }
 
}
