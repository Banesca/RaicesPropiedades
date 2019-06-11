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
  form: any = { id: null, name: null, email: null, password: null, fk_idPerfil: null, passwordConfirm: null }
  myForm: FormGroup;
  passForm: FormGroup;

  loading = true;
  actualizando = false;
  actualizandoPass = false;

  constructor(
    private _perfilService: PerfilService,
    private _loginService: LoginService,
    private _alertService: AlertsService,
    private userService: UsuariosService,
    private fb: FormBuilder
  ) {
    this.myForm = fb.group({
      id: [this.form.id],
      name: [this.form.name, Validators.required],
      email: [this.form.email, [Validators.required, Validators.pattern(new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))]],
      fk_idPerfil: [this.form.fk_idPerfil]
    });

    this.passForm = this.fb.group({
      password: ["", Validators.compose([Validators.required, /*Validators.pattern('^(?=.*\\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[*#!/$-]).*$'),*/ Validators.minLength(6)])],
      passwordConfirm: ["", Validators.compose([Validators.required])]
    },
      { validator: this.matchingPasswords('password', 'passwordConfirm') });

    this.passForm.reset();
  }


  /**
   * Método para validar que las contraseñas sean iguales
   * @param passwordKey //Key del control de password
   * @param confirmPasswordKey  //key del control de confirmar
   */
  matchingPasswords(passwordKey: string, confirmPasswordKey: string) {
    return (claveForm: FormGroup): { [key: string]: any } => {
      let password = claveForm.controls[passwordKey];
      let confirmPassword = claveForm.controls[confirmPasswordKey];

      if (password.value !== confirmPassword.value) {
        claveForm.controls['passwordConfirm'].setErrors({ "mismatchedPasswords": true });
        return {
          mismatchedPasswords: true
        };
      } else {
        return null;
      }
    }
  }


  ngOnInit() {
    setTimeout(() => {
      this.getAuthUser();
    }, 3000);

  }

  getAuthUser() {
    this.loading = true;
    const token = localStorage.getItem('access_token');
    this._loginService._getAuthUser(token).subscribe(
      (resp: any) => {
        this.myForm.controls['id'].setValue(resp.id);
        this.myForm.controls['name'].setValue(resp.name);
        this.myForm.controls['email'].setValue(resp.email);
        this.myForm.controls['fk_idPerfil'].setValue(resp.fk_idPerfil);
        this.loading = false;
      },
      error => {
        this.loading = false;
        console.log(error);
      }
    )
  }


  upgradeFormPerfil() {
    this.actualizando = true;
    this.form.id = this.myForm.controls['id'].value;
    this.form.name = this.myForm.controls['name'].value;
    this.form.email = this.myForm.controls['email'].value;
    this.form.fk_idPerfil = this.myForm.controls['fk_idPerfil'].value

    this.userService.editUser(this.form, this.form.id).subscribe(
      resp => {
        this._alertService.msg("OK", "Actualizar Perfil", "Actualización del Perfil exitosa.");
        this.actualizando = false;
      },
      error => {
        this._alertService.msg("ERR", "Actualizar Perfil", `Error: ${error.status} - ${error.statusText}`);
        this.actualizando = false;
      }
    )
  }

  /**
   * Método para cambiar de contraseña
   */
  changePassword() {
    this.actualizandoPass = true;
    this.form.id = this.myForm.controls['id'].value;
    this.form.name = this.myForm.controls['name'].value;
    this.form.email = this.myForm.controls['email'].value;
    this.form.fk_idPerfil = this.myForm.controls['fk_idPerfil'].value;
    //this.form.password =  this.passForm.controls['password'].value;
    //this.form.passwordConfirm =  this.passForm.controls['passwordConfirm'].value;

    this.userService.editUser(this.form, this.form.id).subscribe(
      resp => {
        this._alertService.msg("OK", "Cambiar Contraseña", "Cambio de Contraseña exitoso.");
        this.actualizandoPass = false;
        this.passForm.reset();
      },
      error => {
        this._alertService.msg("ERR", "Cambiar Contraseña", `Error: ${error.status} - ${error.statusText}`);
        this.actualizandoPass = false;
      }
    )
  }
}
