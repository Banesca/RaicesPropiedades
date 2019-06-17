import { enCRUD } from "./../../misc/enums";
import {
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { ITransacciones, Transacciones } from './../../services/transacciones/transacciones.interface'
import { TransaccionesService } from './../../services/transacciones/transacciones.service'
import { AlertsService } from '../../services/alerts.service';
import { ICategoria } from "src/app/services/categoria/categoria.interface";
import { CategoriaService } from "src/app/services/categoria/categoria.service";



@Component({
  selector: 'app-transacciones',
  templateUrl: './transacciones.component.html',
  styleUrls: ['./transacciones.component.css']
})
export class TransaccionesComponent implements OnInit {
  mCategorias: ITransacciones[];
  mCategoriasList: ICategoria[];
  mCategoriasSelect: ITransacciones;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  mId: number;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _TransaccionesService: TransaccionesService,
    private _CategoriasService: CategoriaService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
    this.mForma = this.generarFormulario();
    this.mCategoriasSelect = Transacciones.empy();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
    this.getCategoria() 
  }

  ngOnInit() {}

  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      nombre_apellido: ["", Validators.required],
      telefono: ["", Validators.required],
      fk_tipoPropiedad: ["", Validators.required],
      titulo: ["", Validators.required],
      descripcion: ["", Validators.required]
    });
  }

  getAll() {
    this.mLoading = true;
    this._TransaccionesService
      .All()
      .then(res => {
        console.log(res)
        this.mCategorias = res.data;
        this.mLoading = false;
      })
      .catch(error => {
        console.log(error)
      });
  }

  getCategoria() {
    this.mLoading = true;
    this._CategoriasService
      .allCategories()
      .then(res => {
        console.log(res)
        this.mCategoriasList = res.data;
        console.log(this.mCategoriasList)
        this.mLoading = false;
      })
      .catch(error => {
        console.log(error)
      });
  }

  modificar(pCategoria: ITransacciones) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
  }

  eliminar(pKey: number) {
    this.mLoading = true;
    this._TransaccionesService
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }

  ver(pCategoria: ITransacciones) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  actualizar(pKey: number) {
    this.mCategoriasSelect = this.mForma.value as ITransacciones;
    this.mLoading = true;
    this._TransaccionesService
      .actualizarCategoria(this.mCategoriasSelect, pKey)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg('OK', 'EXITO!', 'Transacción Actualizada Correctamente.')
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

}

