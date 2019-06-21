import { Component, OnInit } from '@angular/core';
import { AlertsService } from '../../services/alerts.service';
import { LoginService } from "../../services/login.service";
import { Router } from '@angular/router';
import { AuthGuard } from "../../services/auth.guard";

@Component({
  selector: 'app-authbackend',
  templateUrl: './authbackend.component.html',
  styleUrls: ['./authbackend.component.css']
})
export class AuthbackendComponent implements OnInit {

  form:any = { email:null, password:null , idAF:2 }
  inPromise: boolean;
  bandera: boolean = true;  

  constructor(
    private alerService:AlertsService,
    private loginService:LoginService,
    private auth:AuthGuard,
    private router:Router
  ) { }

  ngOnInit() {
  }

  ingresarLogin(){
    this.inPromise = true;
    this.loginService.ingresarLogin(this.form).subscribe(
      (resp:any) =>{

        // Activamos la sesion
        // this.alerService.Success('Iniciando...')
        localStorage.setItem('access_token',resp.access_token)
        
        // Buscamos la informacion del usuario
        this.loginService._getAuthUser(resp.access_token).subscribe(
          
          (resp:any) => {
            //console.warn(resp);
            // Guardamos en local, la informacion que reutilizamos 
            localStorage.setItem('id',resp.id);
            localStorage.setItem('userName',resp.name);
            localStorage.setItem('userEmail',resp.email);
            if(resp.img_perfil){
              localStorage.setItem('imgPerfil',resp.img_perfil);
            }
            this.inPromise = false;
            this.auth.sourceReload.next(true);
            this.router.navigate(['/perfil']);
             
            // location.reload(); 
            // Actualizamos para iniciar
            
          }
        )
      },
      error => {
          //console.log(error.error.message);
        this.inPromise = false;
        this.alerService.msg("ERR", error.error.message);
      }
    )
  }

  change() {
    this.bandera = !this.bandera;
  }
  
  changevalue() {
    console.log("me han dado click");
    this.bandera = !this.bandera;
  }
}