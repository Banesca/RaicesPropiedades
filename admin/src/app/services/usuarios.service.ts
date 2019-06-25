import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders, HttpResponse } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';

const httpOptions = {
  headers: new HttpHeaders({
    'Access-Control-Allow-Origin': '*',
    'Authorization': 'Bearer ' + localStorage.getItem('access_token')
  })
};


@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  httpOptions2:any
  constructor(
    private http: HttpClient,
  ) {
    this.httpOptions2 = {
      headers: new HttpHeaders({
          'Accept':  'application/json',
          'Access-Control-Allow-Origin': '*',
          'Authorization': 'Bearer '+ localStorage.getItem('access_token'),
          'content-type': 'multipart/form-data',
      }),
      observe: 'response'  
  };
   }

  listaUsuarios(){
    return this.http.post(environment.apiHost + '/api/v1/listarUsers',httpOptions);
  }

  _addUser(data){
    return this.http.post<any>(environment.apiHost + '/api/v1/crearUser',data,httpOptions);
  }

  editUser(data,id){
    
    return this.http.post<any>(environment.apiHost + '/api/auth/editarUser/'+id,data,httpOptions);
  }
  deleteUser(id:number){
    return this.http.delete(environment.apiHost + '/api/v1/user/'+id,httpOptions);
  }

  upgradeUsers(data,id){
    return this.http.post<any>(environment.apiHost + '/api/v1/user/'+id,data,httpOptions);
  }

  filtrarUsuarios2(data:any){
    return this.http.get(environment.apiHost + '/api/v1/buscadorPersonas/'+data,httpOptions);

  }
  filtrarUsuarios(data:any){
    return this.http.post(environment.apiHost + '/api/v1/buscadorPersonas/',data,httpOptions);

  }
  _activeAcc(data:FormData){

    return this.http.post(`${environment.apiHost}/api/auth/activarCuentaFromAdmin`,data,httpOptions);
  }
/*   getMayorista(id:number):Observable<HttpResponse<any>>{
    const httpOptions2 = {
      headers: new HttpHeaders({
          'Accept':  'application/json',
          'Access-Control-Allow-Origin': '*',
          'Authorization': 'Bearer '+ localStorage.getItem('access_token'),
      }),
      observe: 'response'  
  };
    return this.http.get(environment.apiHost + '/api/v1/listarPorIdDatosMayoristas/'+id,httpOptions2);
  } */
  getMayorista(id: number):  Observable<HttpResponse<any>>{
 
    return this.http.get<void>(`${environment.apiHost}/api/v1/listarPorIdDatosMayoristas/${id}`, this.httpOptions2) as Observable<HttpResponse<any>>;
}

}
