import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';

@Injectable()
export class DefaultInterceptor implements HttpInterceptor {
  private readonly serverUrl = environment.apiHost;
  
  private get token(): string {
    return localStorage.getItem('access_token');
  }

  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    let setHeaders = {};

    if (this.token) {
      const contentType = req.headers.get('Content-Type');
      const noContentType = req.headers.get('No-Content-Type');

      Object.assign(setHeaders, {
        'Authorization': `Bearer ${this.token}`
      });

      // if (!contentType && !noContentType) {
      //   Object.assign(setHeaders, {
      //     'Content-Type': `application/json`,
      //   });
      // }
    }

    req = req.clone(
      { setHeaders }
    );

    return next.handle(req);
  }
}