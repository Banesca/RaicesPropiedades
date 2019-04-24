import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class RolPerfilService {

  

  constructor(
    private http: HttpClient,
    
    ) {  }

  getPerfil(){
    return this.http.get(environment.apiHost + '/api/v1/perfiles');
  }
}
