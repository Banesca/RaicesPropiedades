import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class PerfilService {

  

  constructor(
    private http: HttpClient,
    
    ) {  }

  
  _upgradeInfoPerfil(data:any,id:number){
    return this.http.post(environment.apiHost + '/api/v1/user/'+id,data);
  }

  _upgradePerfil(data:any){
    return this.http.post(environment.apiHost + '/api/v1/upgrade-foto-perfil',data)
  }

  _getPerfilCliente(id:number){
    return this.http.get(`${environment.apiHost}/api/v1/get-perfil-cliente/`+id);
  }
  _update(data:any,id:number){
    return this.http.put(`${environment.apiHost}/api/v1/actualizarPerfilCliente/`+id,data);
  }
}
