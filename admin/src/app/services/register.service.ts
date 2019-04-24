import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type':  'application/json',
    'Authorization': 'my-auth-token'
  })
};
@Injectable({
  providedIn: 'root'
})
export class RegisterService {

  

  constructor(
    private http: HttpClient,
    
    ) {  }

  _addRegister(data:any){ 
    return this.http.post(environment.apiHost + '/api/v1/user',data,httpOptions);
  }

}
