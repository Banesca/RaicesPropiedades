import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { CanActivate } from '@angular/router';
import { JwtHelperService } from '@auth0/angular-jwt';
import {Observable,BehaviorSubject} from 'rxjs'

@Injectable()
export class AuthGuard implements CanActivate {
  sourceReload:BehaviorSubject<boolean> = new BehaviorSubject(false);
  canReload:Observable<boolean> = this.sourceReload.asObservable();
  tokenHelper = new JwtHelperService();
  
  constructor(
    private router: Router) { }

  canActivate() {

    const token  = localStorage.getItem('access_token');

    if (!token || this.tokenHelper.isTokenExpired(token)) {
      localStorage.clear();
      this.router.navigate(['/login']);
      return false;
    }
    return true;
  }

}
