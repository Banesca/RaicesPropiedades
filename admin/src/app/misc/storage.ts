/*import { enSesionStg, enLocalStg } from './enums';
import { Crypt } from './Crypt';
import { environment } from '../../environments/environment';

/* SESION STORAGE 
export class SStorage {
  static clear() {
    sessionStorage.clear();
  }

  static set(key: enSesionStg, value: any) {
    if (environment.encrypt) {
      this.setCrypt(key, value);
    } else {
      sessionStorage.setItem(key, JSON.stringify(value));
    }
  }

  static get(key: enSesionStg) {
    if (environment.encrypt) {
      return this.getCrypt(key);
    } else {
      if (sessionStorage.getItem(key)) {
        return JSON.parse(sessionStorage.getItem(key));
      } else {
        return '';
      }
    }
  }

  static setCrypt(key: enSesionStg, value: any) {
    const lKey = Crypt.MD5(key);
    const lValue = Crypt.encrypt(JSON.stringify(value), lKey);
    sessionStorage.setItem(lKey, lValue);
  }

  static getCrypt(key: enSesionStg) {
    const lKey = Crypt.MD5(key);
    if (sessionStorage.getItem(lKey)) {
      const lValue = sessionStorage.getItem(lKey);
      return JSON.parse(Crypt.decrypt(lValue, lKey));
    } else {
      return '';
    }
  }
}

/** LOCALE STORAGE 
export class LStorage {
  static clear() {
    localStorage.clear();
  }

  static set(key: enLocalStg, value: any) {
    localStorage.setItem(key, JSON.stringify(value));
  }

  static get(key: enLocalStg) {
    if (localStorage.getItem(key)) {
      return JSON.parse(localStorage.getItem(key));
    } else {
      return '';
    }
  }
}
*/