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
  }

  ngOnInit() {
    this.authService.authState.subscribe((user) => {
      this.user = user;
    });
  }


  signInWithFB(): void {
    this.authService.signIn(FacebookLoginProvider.PROVIDER_ID);
  } 
 
  signOut(): void {
    this.authService.signOut();
  }

  guardar() {
    this._PublicacionesFacebookService
      .nuevaCategoria()
      .then(data => {
        console.log(data)
      })
      .catch(error => {
        console.log(error)
      });
  }
}
