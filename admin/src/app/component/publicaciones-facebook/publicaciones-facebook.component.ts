import { AuthService } from "angularx-social-login";
import { FacebookLoginProvider } from "angularx-social-login";
import { enCRUD } from "./../../misc/enums";
import { SocialUser } from 'angularx-social-login';

import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { PublicacionesFacebookService } from './../../services/publicaciones-facebook/publicaciones-facebook.service'
import { IFacebookPost } from './../../services/publicaciones-facebook/publicaciones-facebook.interface'
import { AlertsService } from '../../services/alerts.service';


@Component({
  selector: 'app-publicaciones-facebook',
  templateUrl: './publicaciones-facebook.component.html',
  styleUrls: ['./publicaciones-facebook.component.css']
})
export class PublicacionesFacebookComponent implements OnInit {
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  user: SocialUser;
  postList: IFacebookPost[];
  mPostSelect: IFacebookPost;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _PublicacionesFacebookService: PublicacionesFacebookService,
    private _AlertsService: AlertsService,
    private authService: AuthService
  ) {
    this.mFormaEstado = enCRUD.Eliminar;
    this.mForma = this.generarFormulario();
  }

  ngOnInit() {
    this.authService.authState.subscribe((user) => {
      this.user = user;
      this.getPost();
    });
  }

  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      message: ["", Validators.required]
    });
  }


  signInWithFB(): void {
    this.authService.signIn(FacebookLoginProvider.PROVIDER_ID);
  } 
 
  signOut(): void {
    this.authService.signOut();
  }

  getPost() {
    this.mLoading = true;
    this._PublicacionesFacebookService
      .getAll()
      .then(res => {
        this.postList = res.data;
        this.mLoading = false;
      })
      .catch(error => {
       
      });

  }

  eliminar(id: number) {
    this.mLoading = true;
    this._PublicacionesFacebookService
      .eliminarCategoria(id)
      .then(data => {
        this.getPost();
        this.mLoading = false;
      })
      .catch(error => {
        this.mLoading = false;
      });
  }

  modificar(pCategoria: IFacebookPost) {
    this.mPostSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
  }


  nuevo() {
    this.mForma.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IFacebookPost) {
    console.log(pCategoria);
    this.mPostSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  actualizar(id: number) {
    this.mPostSelect = this.mForma.value as IFacebookPost;
    this.mLoading = true;
    this._PublicacionesFacebookService
      .actualizarCategoria(this.mPostSelect, id,)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getPost();
        this.mLoading = false;
        this._AlertsService.msg('OK', '!ÉXITO!', 'Post Actualizado Correctamente.')
      })
      .catch(err => {
        // Parsear Object errors a Array de errores para poder mapearlos
        const mapped = Object.keys(err.error.errors).map(key => ({ type: key, value: err.error.errors[key] }));
        // Notificando Errores
        mapped ? mapped.map(e => { this._AlertsService.msg('ERR', 'ERROR', e.value) }) :
          err.error.message ? this._AlertsService.msg('ERR', 'ERROR', err.error.message) :
            this._AlertsService.msg('ERR', 'ERROR', 'Error al Guardar.')

      });
  }

  guardar() {
    this.mPostSelect = this.mForma.value as IFacebookPost;
    this.mLoading = true;
    this._PublicacionesFacebookService
      .nuevaCategoria(this.mPostSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getPost();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }
}
