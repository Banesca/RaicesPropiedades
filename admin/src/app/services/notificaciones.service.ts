import { Injectable } from '@angular/core';
import { HttpResponse, HttpHeaders, HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable({providedIn: 'root'})
export class NotificacionesService {
    headers: HttpHeaders = new HttpHeaders({
        "Authorization": 'Bearer ' +localStorage.getItem('access_token')
    });
    constructor(private http:HttpClient){}

    persist(data: {titleNotification: string, descriptionNotification: string, fk_idSecctionApp: number}): Observable<HttpResponse<any>>{
        return  this.http.post<void>(`${environment.apiHost}/api/auth/notification`, data, {observe: 'response', headers: this.headers});
    }

    getAll(): Observable<HttpResponse<any>>{
        return this.http.get<void>(`${environment.apiHost}/api/auth/listarNotificationes`, {observe: 'response', headers: this.headers} )
    }

    delete(id:number): Observable<HttpResponse<any>>{
        return  this.http.delete<void>(`${environment.apiHost}/api/auth/notification/delete/${id}`,  {observe: 'response', headers: this.headers});
    }
    update(id,data: {titleNotification: string, descriptionNotification: string, fk_idSecctionApp: number}): Observable<HttpResponse<any>>{
        return  this.http.put<void>(`${environment.apiHost}/api/auth/notification/edit/${id}`, data, {observe: 'response', headers: this.headers});
    }
}