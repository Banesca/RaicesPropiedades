import { Component, OnInit , ViewChild, ViewChildren } from '@angular/core';
import { LoginService } from '../services/login.service'
import { AlertsService } from '../services/alerts.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  dataUser:any ={ userName: localStorage.getItem('userName'), userEmail:localStorage.getItem('userEmail') } 

  constructor(
    private loginService:LoginService,
    private _alerts:AlertsService,
    private router:Router
  ) { }

  ngOnInit() {

  }

  salirLogin(){
    this.loginService._salirLogin().subscribe(
      (resp:any) => { 
        this._alerts.msg('OK','Saliendo...') // informamos 
        localStorage.removeItem('access_token') // borramos el token
        localStorage.removeItem('sesion_login') // removemos la sesion
        localStorage.removeItem('userName');
        localStorage.removeItem('imgPerfil');
        /* location.reload(); // reiniciamos la pagina */
        this.router.navigate(['/login']);
        console.log("cerrando sesion desde el servicio");
      },
      error => { console.log('algo salio mal'); console.log(error) 
      this.router.navigate(['/login']);
    }
    )
  }
  toggle(){
    this._alerts.sourceToggleMenu.next(true);
  }

}
