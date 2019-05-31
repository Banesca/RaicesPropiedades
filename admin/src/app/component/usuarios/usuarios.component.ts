import { enCRUD } from "./../../misc/enums";
import { Usuarios } from './../../services/interfaces.index'
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { IUsuarios } from './../../services/usuarios/usuarios-interface'
import { _UsuariosService } from './../../services/usuarios/_usuarios-service'
import { AlertsService } from '../../services/alerts.service';


@Component({
  selector: 'app-usuarios',
  templateUrl: './usuarios.component.html',
  styleUrls: ['./usuarios.component.css']
})
export class UsuariosComponent implements OnInit {

  mCategorias: IUsuarios[];
  mCategoriasSelect: IUsuarios;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _usuarios: _UsuariosService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
    this.mCategoriasSelect = Usuarios.empy();
    this.mForma = this.generarFormulario();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
  }

  ngOnInit() {}

  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(8)]],
      password_confirmation: [''],
    }, {Validator: this.checkPassword});
  }

  checkPassword(group: FormGroup) {
  let pass = group.controls.password.value;
  let confirmPass = group.controls.password_confirmation.value;

  return pass === confirmPass ? null : { notSame: true }     
}

  getAll() {
    this.mLoading = true;
    this._usuarios
      .allCategorias()
      .then(data => {
        this.mCategorias = data.users;
        this.mLoading = false;
      })
      .catch(error => {
        console.log(error)
      });
  }


  modificar() {
    this.mFormaEstado = enCRUD.Actualizar;
  }

  eliminar(pKey: string) {
    this.mLoading = true;
    this._usuarios
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }

  nuevo(pForma: NgForm) {
    this.mForma.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IUsuarios) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  accion() {
    this.mCategoriasSelect = this.mForma.value as IUsuarios;
    if (this.mFormaEstado === enCRUD.Crear) {
      this.guardar();
    } else if (this.mFormaEstado === enCRUD.Actualizar) {
      this.actualizar();
    }
  }

  guardar() {
    this.mLoading = true;
    this._usuarios
      .nuevaCategoria(this.mCategoriasSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }

  actualizar() {
    this.mLoading = true;
    this._usuarios
      .actualizarCategoria(this.mCategoriasSelect, this.mCategoriasSelect.id)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }
}
