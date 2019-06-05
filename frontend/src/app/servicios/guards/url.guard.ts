import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, Router } from '@angular/router';

@Injectable()
export class UrlGuard implements CanActivate {
  // tslint:disable-next-line:max-line-length
  constructor(private router: Router) {}

  // tslint:disable-next-line:max-line-length
  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): Observable<boolean> | Promise<boolean> | boolean {
    // if (this._UsuariosSistemaService.isLoggedIn()) {
      return true;
    // } else {
      // this.router.navigate(['/login']);
    // }
  }
}