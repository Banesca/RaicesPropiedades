import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { enCRUD } from "./../../misc/enums";
import { SucursalService } from './../../services/sucursales/sucursal.service';
import { ISucursales } from './../../services/sucursales/sucursales-interface'
import { AlertsService } from 'src/app/services/alerts.service';

@Component({
  selector: 'app-sucursales2',
  templateUrl: './sucursales.component.html',
  styleUrls: ['./sucursales.component.css']
})
export class Sucursales2Component implements OnInit {
  mFormaEstado: string;
  enCRUD = enCRUD;
  sucursalList: ISucursales[] = [];
  sucursalSelected: ISucursales;
  myForm: FormGroup
  mLoading: boolean = true;

  constructor(
    private fb: FormBuilder,
    private _sucursalService: SucursalService,
    private _as: AlertsService
  ) {
    this.myForm = this.fb.group({
      nombreSucursal: ['', Validators.required],
      telefonoSucursal: ['', [Validators.required, Validators.pattern(new RegExp(/^[0-9]+$/))]],
      emailSucursal: ['', [Validators.required, Validators.email]],
      direccionSucursal: ['', Validators.required]
    })
  }

  ngOnInit() {
    this.mLoading = false;
    this.mFormaEstado = enCRUD.Eliminar;
    this.getSucursalList();

  }

  getSucursalList() {
    this.mLoading = true;
    this._sucursalService
    .getAll()
    .then(data => {
      this.sucursalList = data.suculsales;
      this.getSucursalList();
      this.mLoading = false;
    })
    .catch(error => {
      this._as.msg('ERR', 'ERROR', 'Error al Obtener Datos.')
    });

  }

  nuevo() {
    this.myForm.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  guardar() {
    this.sucursalSelected = this.myForm.value as ISucursales;
    this.mLoading = true;
    this._sucursalService
      .addNew(this.sucursalSelected)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getSucursalList();
        this.mLoading = false;
        this._as.msg('OK', 'EXITO!', 'Sucursal Creada Correctamente.')
      })
      .catch(err => {
         // Parsear Object errors a Array de errores para poder mapearlos
         const mapped = Object.keys(err.error.errors).map(key => ({ type: key, value: err.error.errors[key] }));
         // Notificando Errores
         mapped ? mapped.map(e => { this._as.msg('ERR', 'ERROR', e.value) }) :
           err.error.message ? this._as.msg('ERR', 'ERROR', err.error.message) :
             this._as.msg('ERR', 'ERROR', 'Error al Guardar.')
      });
  }

  ver(pCategoria: ISucursales) {
    this.sucursalSelected = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  modificar(pCategoria: ISucursales) {
    this.sucursalSelected = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
  }

  actualizar(pKey: number) {
    this.sucursalSelected = this.myForm.value as ISucursales;
    this.mLoading = true;
    this._sucursalService
      .actualizarCategoria(this.sucursalSelected, pKey,)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getSucursalList();
        this.mLoading = false;
        this._as.msg('OK', 'EXITO!', 'Sucursal Actualizada Correctamente.')
      })
      .catch(err => {
        // Parsear Object errors a Array de errores para poder mapearlos
        const mapped = Object.keys(err.error.errors).map(key => ({ type: key, value: err.error.errors[key] }));
        // Notificando Errores
        mapped ? mapped.map(e => { this._as.msg('ERR', 'ERROR', e.value) }) :
          err.error.message ? this._as.msg('ERR', 'ERROR', err.error.message) :
            this._as.msg('ERR', 'ERROR', 'Error al Guardar.')

      });
  }

  eliminar(pKey: number) {
    this._sucursalService
      .eliminarCategoria(pKey)
      .then(data => {
        this.getSucursalList();
        this._as.msg('OK', 'EXITO!', 'Sucursal Eliminada Correctamente.')
      })
      .catch(error => {
        this._as.msg('ERR', 'ERROR', 'Error al Eliminar.')
      });
  }


}
