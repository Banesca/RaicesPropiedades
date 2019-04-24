import { Component, OnInit } from '@angular/core';
import { LoginService } from '../../services/login.service'
import { Router, ActivatedRoute } from '@angular/router';
import { AlertsService } from '../../services/alerts.service';

@Component({
  selector: 'app-nav-admin',
  templateUrl: './nav-admin.component.html',
  styleUrls: ['./nav-admin.component.css']
})
export class NavAdminComponent implements OnInit {
  dataUser:any = {
    img_perfil: null,
    userName: null
  }
  constructor(
    private _loginService:LoginService,
    private route: ActivatedRoute,
    private router: Router,
    private _alerts: AlertsService
  ) { 

    /*
      PRONTO INICIE LA EL LOGIN QUE VALIDE LA INFORMACION 
    ****/

    this._loginService._getAuthUser(localStorage.getItem('access_token')).subscribe(
      (resp:any) => {
        console.log('activo');
        this.dataUser.userName = resp.userName;
        if(resp.img_perfil){
          this.dataUser.img_perfil = resp.img_perfil;
        }
        
      },
      error => {
        console.log('no hay sesion activa');
        this.router.navigate(['']);
      })

  }

  ngOnInit() {

  }
  
  salirLogin(){
    /*
    this._loginService._salirLogin().subscribe(
      (resp:any) => { 
        this._alerts.Success('Saliendo...')
        localStorage.removeItem('access_token')
        this.router.navigate(['']); 
      },
      error => { console.log('algo salio mal'); console.log(error) }
    )*/
  }
  
}
