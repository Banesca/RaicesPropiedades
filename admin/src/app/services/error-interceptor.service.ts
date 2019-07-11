import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';


@Injectable()
export class ErrorInterceptor implements HttpInterceptor {
   constructor() { }

   intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
      return next.handle(request).pipe(catchError(err => {
         console.log(err)
         if ([401, 403].indexOf(err.status) !== -1) {
            // auto logout if 401 Unauthorized or 403 Forbidden response returned from api
            localStorage.clear()
            location.reload(true);
         }

         const error = err.error.message || err.statusText;
         return throwError(error);
      }))
   }
}