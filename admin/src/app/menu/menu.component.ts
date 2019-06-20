import { Component, OnInit } from '@angular/core';
import { AlertsService } from '../services/alerts.service';
import { AuthGuard } from '../services/auth.guard';
import { IModulos, Modulos } from '../services/modulos/modulos.interface';
import { ModulosService } from '../services/modulos/modulos.service';

import { Router} from '@angular/router'
declare var $
@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {
  
  dataUser:any ={ userName: localStorage.getItem('userName'), userEmail:localStorage.getItem('userEmail') } 
   hideUser:boolean=false;
   mModulos: IModulos[];
  constructor(
    private alertS: AlertsService,
    private route:Router,
    private auth:AuthGuard,
    private _ModuloService: ModulosService,
  ) { }

  ngOnInit() {

    this.auth.canReload.subscribe(val=>{
      if(val){
        this.auth.sourceReload.next(false);
        /* location.reload(); */
        setTimeout(() => {
            this.route.navigate(['']);
        }, 250);
      }
    })
   
    this.alertS.toggleMenu.subscribe(val=>{
      console.log(val);

      if(val){
        this.hideUser = this.hideUser?false:true;
        this.alertS.sourceToggleMenu.next(false);
      }
    })

    this._ModuloService
    .moduloUsuario()
     .then(res => {
       //console.log(res);
      this.mModulos = res.modulos;
      //console.log( this.mModulos);
       //this.mLoading = false;
     })
     .catch(error => {
       console.log(error)
     });
  }
 toggle(){

  this.hideUser= this.hideUser? false: true;
  }

}
