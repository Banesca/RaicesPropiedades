import { Component, OnInit } from '@angular/core';
import { PerfilService } from '../../services/perfil.service';
import { LoginService } from '../../services/login.service';
import { AlertsService } from '../../services/alerts.service'
import { UsuariosService } from 'src/app/services/usuarios.service';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-perfil',
  templateUrl: './perfil.component.html',
  styleUrls: ['./perfil.component.css']
})
export class PerfilComponent implements OnInit {

  imgPerfil: any;
  img_perfil: null;
  form: any = { id: null, name: null, email: null, password: null, fk_idPerfil: null,passwordConfirm: null }
  myForm:FormGroup

  constructor(
    private _perfilService: PerfilService,
    private _loginService: LoginService,
    private _alertService: AlertsService,
    private userService:UsuariosService,
    private fb:FormBuilder
  ) {
    this.myForm = fb.group({
      id:[''],
      name:['',Validators.required],
      email:['',[Validators.required, Validators.pattern(new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))]],
      password:[''],
      passwordConfirm:['']
    })
   }

  ngOnInit() {
    setTimeout(() => {
      this.getAuthUser();
    }, 3000);

  }

  getAuthUser() {
    const token = localStorage.getItem('access_token');
    this._loginService._getAuthUser(token).subscribe(
      (resp: any) => {
        this.form.id = resp.id;
        this.form.name = resp.name;
        this.form.email = resp.email;
        this.form.fk_idPerfil = resp.fk_idPerfil
      },
      error => {
        console.log(error);
      }
    )
  }


  upgradeFormPerfil() {
    console.warn(this.form);
    this.userService.editUser(this.form, this.form.id).subscribe(
      resp => {
        this._alertService.msg("OK", "Éxito", "Actualizacion exitosa");
      },
      error => {
        this._alertService.msg("ERR", "Error", `Error: ${error.status} - ${error.statusText}`);
      }
    )
  }
  validPasswordConfirm(){
    console.log("in Valid password")
    console.warn(this.myForm.value);
    if(this.myForm.get('passwordConfirm').value != this.myForm.get('password').value){
      console.log('desigual')
      this.myForm.controls['passwordConfirm'].setErrors({'server-error': true});
    }else{
     /*  this.myForm.controls['passwordConfirm'].setErrors({'server-error': false}); */
      console.log('igual')

    }
  }



}
