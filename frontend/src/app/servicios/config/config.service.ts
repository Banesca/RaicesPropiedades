import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IConfigStatic} from './config.interface';
import { environment } from '../../../environments/environment';

@Injectable()
export class ConfigService {
  public mCfgStatic: IConfigStatic = null;

  constructor(private _HttpClient: HttpClient) {}

  loadAppConfigStatic() {
    let lFileConfig = 'assets/config.dev.json';
    if (environment.production) {
      lFileConfig = 'assets/config.json';
    }
    return this._HttpClient
      .get(lFileConfig)
      .pipe(
        map((response: IConfigStatic) => {
          return response;
        })
      )
      .toPromise()
      .then(data => {
        this.mCfgStatic = data;
      });
  }

}