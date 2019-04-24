import { Injectable } from '@angular/core';
import { HttpClient, HttpResponse, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({providedIn: 'root'})
export class SeccionAppService {
    headers: HttpHeaders = new HttpHeaders({
        "Authorization": localStorage.getItem('access_token')
    })
    constructor(private http:HttpClient) {}

    getAll(): Observable<HttpResponse<any>> {
        return this.http.get<void>(`${environment.apiHost}/api/v1/listarSeccionApp`, {observe:'response', headers: this.headers});
    }
}