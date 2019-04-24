import { Injectable } from '@angular/core';
import { ToastrService, ActiveToast, IndividualConfig } from 'ngx-toastr';
import {Observable , BehaviorSubject} from 'rxjs';

declare var toastr:any;

@Injectable({
  providedIn: 'root'
})
export class AlertsService {
  sourceToggleMenu : BehaviorSubject<boolean> = new BehaviorSubject(false);
  toggleMenu:Observable<boolean>  = this.sourceToggleMenu.asObservable();
  constructor(private toastrSrv: ToastrService ) { }
  
  Success(msj){
    toastr.success(msj)
  }

  listError(error){
 
    var tipo=[];
		for (let i in error.errors) {
			tipo.push(i);
    }

		var errores=[];
		tipo.forEach(function(element) {
			errores.push(error.errors[element]);
    });
    
		var myError = errores;
		
    myError.forEach(function(element) {
      toastr.error(element)
    });
  }

  msjListError(myError){

  }

  Erros(msj){
    toastr.error(msj)
  }

  /**
   * Muestra un mensaje de éxito, a la vez devuelve
   * el toastr para realizar operaciones (onHidden, onAction,etc...)
   * a las cuales nos podemos subscribir
   * 
   * @param style determinará cual toastr mostrar
   * @param tittle
   * @param msgBody
   * @param options Opciones individuales para setear parámetros
   * 
   * @see https://www.npmjs.com/package/ngx-toastr
   */
  msg(
    style: 'OK' | 'ERR' | 'INFO' | '', 
    tittle: string, 
    msgBody?: string, 
    options?: Partial<IndividualConfig>): ActiveToast<any> {
    
    if(!options){
      options =  {
        progressBar: true,
        progressAnimation: 'decreasing',
        closeButton: true,
        positionClass: 'toast-bottom-right',
      }
    }
    
    switch(style){
      case 'OK': return this.toastrSrv.success(msgBody, tittle, options);
      case 'ERR': return this.toastrSrv.error(msgBody, tittle, options);
      case 'INFO': return this.toastrSrv.info(msgBody, tittle, options);
      default: return this.toastrSrv.show(msgBody, tittle, options);
    }
    
  }

}
