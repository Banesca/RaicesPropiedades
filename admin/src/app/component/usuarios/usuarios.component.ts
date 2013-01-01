import { enCRUD } from "./../../misc/enums";
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
  id: number;
  searchResult: any [] = [];

  mForma: FormGroup;
  filterForm: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _usuarios: _UsuariosService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
    this.mForma = this._formBuilder.group({
      name: ['', Validators.required],
      password: ['', [Validators.required, Validators.minLength(8)]],
      password_confirmation: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]]
    }),
    this.filterForm = this._formBuilder.group({
      search: [''],
      searchRol: [''],
      aprobados:[''],

    })
  }

  ngOnInit() {}

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


  modificar(categoria) {
    this.mFormaEstado = enCRUD.Actualizar;
    this.id = categoria.id;
  }

  eliminar(pKey: number) {
    this.mLoading = true;
    this._usuarios
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        console.log(pKey)
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



  guardar() {
    this.mCategoriasSelect = this.mForma.value as IUsuarios;
    this.mLoading = true;
    this._usuarios
      .nuevaCategoria(this.mCategoriasSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
        console.log(this.mCategoriasSelect)
      });
  }

  filtrar() {
    this.mLoading = true;
    const val = this.filterForm.value
    console.log(val)
    this._usuarios.filtrarUsuarios(val)
      .then(res => {
        this.searchResult = res;
        this.mCategorias = this.searchResult;
        this.mLoading = false;
        console.log(this.searchResult, this.mCategorias);
      })
    .catch(error => {
      console.log(error);
      this._AlertsService.msg('ERR', 'error', 'error al filtrar');
    }); 
  }

  actualizar() {
    this.mCategoriasSelect = this.mForma.value as IUsuarios;
    this.mLoading = true;
    console.log(this.id)
    this._usuarios
      .actualizarCategoria(this.mCategoriasSelect, this.id)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }
}
