import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { ConfigHome } from '../models/config-home';
import { environment } from '../../environments/environment';

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
export class ConfigHomeService {

  

  constructor(
    private http: HttpClient,
    
    ) {  }

   _getConfigHome(){
    return this.http.get(environment.apiHost + '/api/v1/config-home',httpOptions);
   }

   _upgradeConfigHome(data:any){
    return this.http.post(environment.apiHost + '/api/v1/upgrade_config_home',data);
  }
}
