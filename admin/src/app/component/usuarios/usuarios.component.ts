import { enCRUD } from "./../../misc/enums";
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators,
  FormArray
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { IUsuarios, Usuarios } from './../../services/usuarios/usuarios-interface'
import { _UsuariosService } from './../../services/usuarios/_usuarios-service'
import { AlertsService } from '../../services/alerts.service';
import { IModulos, Modulos } from './../../services/modulos/modulos.interface'
import { ModulosService } from './../../services/modulos/modulos.service'


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
  mModulos: IModulos[];
  mForma: FormGroup;
  mFormM: FormGroup;
  filterForm: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;
  modulo = new FormArray([]);
  
  constructor(
    private _formBuilder: FormBuilder,
    private _usuarios: _UsuariosService,
    private _AlertsService: AlertsService,
    private _ModuloService: ModulosService,
  ) {
    this.mCategorias = [];
    this.mFormaEstado = enCRUD.Eliminar;
    this.mCategoriasSelect = Usuarios.empy();
    this.getAll();
    this.mForma = this._formBuilder.group({
      name: ['', Validators.required],
      password: ['', [Validators.required, Validators.minLength(8)]],
      password_confirmation: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]]
    }),
    this.mFormM = this._formBuilder.group({
      modulo: [''],
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
        this._AlertsService.msg('ERR', 'ERROR', 'Error al cargar los datos');
      });
  }


  modificar(pCategoria: IUsuarios) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
    this.id = pCategoria.id;
  }

  modulos(idUsuario) {
    this.mFormaEstado = enCRUD.Asignar;
    this._ModuloService
    .All()
     .then(res => {
       console.log(res);
      this.mModulos = res.modulos;
       this.mLoading = false;
     })
     .catch(error => {
       console.log(error)
     });
    this.id = idUsuario.id;
  }

  asignarModulo(){
  
    console.log(this.mFormM.value)
  }

  eliminar(pKey: number) {
    this.mLoading = true;
    this._usuarios
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        console.log(pKey)
        this.mLoading = false;
        this._AlertsService.msg('OK', '!EXITO!', 'Usuario eliminado correctamente');
      })
      .catch(error => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al eliminar el usuario');
      });
  }

  nuevo() {
    this.mCategoriasSelect = Usuarios.empy();
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
        this._AlertsService.msg('OK', '!EXITO!', 'Usuario creado correctamente');
      })
      .catch(error => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al crear el usuario');
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
        this._AlertsService.msg('OK', '!EXITO!', 'Usuario actualizado correctamente');
      })
      .catch(error => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al actualizar el usuario');
      });
  }
}
