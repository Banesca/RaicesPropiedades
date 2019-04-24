import { Component, OnInit } from '@angular/core';
import { RegisterService } from '../../services/register.service';
import { Router, ActivatedRoute } from '@angular/router';
import { AlertsService } from '../../services/alerts.service';

declare var $:any;

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
  

  v_register:any = { 
    nombre:null, username:null,
    email:null,  password: null,
    password_r : null,
    foto_perfil: null, 
  }

  constructor(
    private _registerService:RegisterService,
    private route: ActivatedRoute,
    private router: Router,
    private _alertService: AlertsService
  ) { }

  ngOnInit() {
  }


  upFoto(event){
    var foto_x : File = event.target.files[0]; // Ubicamos la IMG
    this.v_register.foto_perfil = foto_x
  }

  addRegister(){
    if(this.v_register.password && this.v_register.password_r && this.v_register.nombre){
      if(this.v_register.password.length != 0){
        if(this.v_register.password.length <= 8){
          this._alertService.Erros('el password tiene que ser mayor de 8 caracteres');
        }else{
          if(this.v_register.password == this.v_register.password_r){
            
            const data_i:any = { 
              name: this.v_register.nombre,
              email: this.v_register.email,
              password: this.v_register.password,
              userName: this.v_register.username,
              password_confirmation: this.v_register.password,
              fk_idPerfil: 2
            };

            this._registerService._addRegister(data_i).subscribe( 
              (resp:any) => { 
                this._alertService.Success('Iniciando...')
                localStorage.getItem('access_token')
                $("#registraseModal").modal('hide');
                location.href="/";
              },
              (error:any) => {
                console.log(error.error.errors)
                this._alertService.listError(error.error);
              }
            );
                
          }else{
            this._alertService.Erros('los pasword no es igual');
          }
      }      
    }else{
      this._alertService.Erros('Todos los campos son requeridos') 
    }


  }

}}
