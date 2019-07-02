import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders, HttpResponse } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';
import { getHeaders } from '../misc/Headers';


@Injectable({
  providedIn: 'root'
})
export class UsuariosService {

  constructor(
    private http: HttpClient,
  ) {

   }

  listaUsuarios(){
    return this.http.post(environment.apiHost + '/api/v1/listarUsers',{
        headers: getHeaders()
      });
  }

  _addUser(data){
    return this.http.post<any>(environment.apiHost + '/api/v1/crearUser',data,{
        headers: getHeaders()
      });
  }

  editUser(data,id){
    
    return this.http.post<any>(environment.apiHost + '/api/auth/editarUser/'+id,data,{
        headers: getHeaders()
      });
  }
  deleteUser(id:number){
    return this.http.delete(environment.apiHost + '/api/v1/user/'+id,{
        headers: getHeaders()
      });
  }

  upgradeUsers(data,id){
    return this.http.post<any>(environment.apiHost + '/api/v1/user/'+id,data,{
        headers: getHeaders()
      });
  }

  filtrarUsuarios2(data:any){
    return this.http.get(environment.apiHost + '/api/v1/buscadorPersonas/'+data,{
        headers: getHeaders()
      });

  }
  filtrarUsuarios(data:any){
    return this.http.post(environment.apiHost + '/api/v1/buscadorPersonas/',data,{
        headers: getHeaders()
      });

  }
  _activeAcc(data:FormData){

    return this.http.post(`${environment.apiHost}/api/auth/activarCuentaFromAdmin`,data,{
        headers: getHeaders()
      });
  }
/*   getMayorista(id:number):Observable<HttpResponse<any>>{
    const {
        headers: getHeaders()
      }2 = {
      headers: new HttpHeaders({
          'Accept':  'application/json',
          'Access-Control-Allow-Origin': '*',
          'Authorization': 'Bearer '+ localStorage.getItem('access_token'),
      }),
      observe: 'response'  
  };
    return this.http.get(environment.apiHost + '/api/v1/listarPorIdDatosMayoristas/'+id,{
        headers: getHeaders()
      }2);
  } */


}
