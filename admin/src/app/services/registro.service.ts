import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpResponse } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({
    providedIn: 'root'
})
export class RegistroService {

    httpOptions: HttpHeaders = new HttpHeaders({
        'Accept': 'application/json',
        'Access-Control-Allow-Origin': '*',
        'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
    });
    constructor(private http: HttpClient) { }

    verificarRegistro(body: any): Observable<HttpResponse<any>> {
        if (body.nameUser) {
            return this.http.get<any>(`http://depocentral.dyndns.org:8753/api/v1/client/ml/byid/${body.nameUser}`, { headers: this.httpOptions, observe: 'response' });
        }
    }
    
    ingresarRegistro(body: any): Observable<HttpResponse<any>> {
        return this.http.post<any>(`http://depocentral.dyndns.org:8753/api/v1/client/ml/add`, body, { headers: this.httpOptions, observe: 'response' });
    }

    modificarRegistro(body: any): Observable<HttpResponse<any>> {
        return this.http.post<any>(`http://depocentral.dyndns.org:8753/api/v1/client/ml/update`, body, { headers: this.httpOptions, observe: 'response' });
    }
}
