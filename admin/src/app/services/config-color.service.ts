import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment';

const httpOptions = {
  headers: new HttpHeaders({
    'Accept':  'application/json',
    'Access-Control-Allow-Origin': '*',
    'Authorization': 'Bearer '+localStorage.getItem('access_token')
  })
};

@Injectable({
  providedIn: 'root'
})
export class ConfigColorService {

  

  constructor(
    private http: HttpClient,
    
    ) {  }

  _getColor(){
    return this.http.get(environment.apiHost + '/api/auth/colores',httpOptions);
  }
  
  _paletaColor(){
    /* Esta paleta de colores se ubican en el landing */
    return this.http.get(environment.apiHost + '/api/v1/paleta-color',httpOptions)
  }

  addColores(data:any){ console.log(data)
    return this.http.post(environment.apiHost + '/api/auth/colores',data,httpOptions);
  }

  deleteColores(id:number){
    return this.http.delete(environment.apiHost + '/api/auth/colores/'+id,httpOptions);
  }
}
