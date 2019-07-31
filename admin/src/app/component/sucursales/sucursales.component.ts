import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { enCRUD } from "./../../misc/enums";
import { SucursalService } from './../../services/sucursales/sucursal.service';
import { ISucursales } from './../../services/sucursales/sucursales-interface'
import { AlertsService } from 'src/app/services/alerts.service';

@Component({
  selector: 'app-sucursales',
  templateUrl: './sucursales.component.html',
  styleUrls: ['./sucursales.component.css']
})

export class SucursalesComponent implements OnInit {
  mFormaEstado: string;
  enCRUD = enCRUD;
  sucursalList: ISucursales[] = [];
  sucursalSelected: ISucursales;
  myForm: FormGroup
  mLoading: boolean;
  progressBar = false;
  constructor(
    private fb: FormBuilder,
    private _sucursalService: SucursalService,
    private _as: AlertsService
  ) {
    this.myForm = this.fb.group({
      nombreSucursal: ['', Validators.required],
      telefonoSucursal: ['', [Validators.required, Validators.pattern(new RegExp(/^[0-9]+$/))]],
      emailSucursal: ['', [Validators.required, Validators.pattern(new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))]],
      direccionSucursal: ['', Validators.required]
    })
  }

  ngOnInit() {
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
    this.progressBar = true;
    this._sucursalService
      .addNew(this.sucursalSelected)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getSucursalList();
        this.progressBar = false;
        this._as.msg('OK', 'Crear Sucursal', 'Sucursal Creada Correctamente.');
        //Se agrega el reset al guardar el formulario - RM 11/06/2019
        this.myForm.reset();
      })
      .catch(err => {
        // Parsear Object errors a Array de errores para poder mapearlos
        const mapped = Object.keys(err.error.errors).map(key => ({ type: key, value: err.error.errors[key] }));
        // Notificando Errores
        mapped ? mapped.map(e => { this._as.msg('ERR', 'Crear Sucursal', e.value) }) :
          err.error.message ? this._as.msg('ERR', 'Crear Sucursal', err.error.message) :
            this._as.msg('ERR', 'Crear Sucursal', 'Error al Crear Sucursal.')
        this.progressBar = false;
      });
  }

  ver(pCategoria: ISucursales) {
    this.sucursalSelected = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  modificar(pCategoria: ISucursales) {
    this.sucursalSelected = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
    //Se agrega la carga de data al seleccionar actualizar - RM 11/06/2019
    this.myForm.controls['nombreSucursal'].setValue(this.sucursalSelected.nombreSucursal);
    this.myForm.controls['telefonoSucursal'].setValue(this.sucursalSelected.telefonoSucursal);
    this.myForm.controls['emailSucursal'].setValue(this.sucursalSelected.emailSucursal);
    this.myForm.controls['direccionSucursal'].setValue(this.sucursalSelected.direccionSucursal);
  }

  actualizar(pKey: number) {
    this.sucursalSelected.nombreSucursal = this.myForm.controls['nombreSucursal'].value;
    this.sucursalSelected.telefonoSucursal = this.myForm.controls['telefonoSucursal'].value;
    this.sucursalSelected.emailSucursal = this.myForm.controls['emailSucursal'].value;
    this.sucursalSelected.direccionSucursal = this.myForm.controls['direccionSucursal'].value;
    this.progressBar = true;

    this._sucursalService
      .actualizarCategoria(this.sucursalSelected, this.sucursalSelected.idSucursal)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getSucursalList();
        this.progressBar = false;
        this._as.msg('OK', 'Actualizar Sucursal', 'Sucursal Actualizada Correctamente.')
      })
      .catch(err => {
        // Parsear Object errors a Array de errores para poder mapearlos
        //const mapped = Object.keys(err.error.errors).map(key => ({ type: key, value: err.error.errors[key] }));
        //Se modifica la constante mapped porque da error al mapear err.error && err.error.errors cuando vienen nulos

        let mapped = null;
        if (err.error && err.error.errors) {
          mapped = Object.keys(err.error.errors).map(key => ({ type: key, value: err.error.errors[key] }));
        }

        // Notificando Errores
        mapped ? mapped.map(e => { this._as.msg('ERR', 'Actualizar Sucursal', e.value) }) :
          err.error.message ? this._as.msg('ERR', 'Actualizar Sucursal', err.error.message) :
            this._as.msg('ERR', 'Actualizar Sucursal', 'Error al Actualizar Sucursal.')
            this.progressBar = false;
      });
  }

  eliminar(pKey: number) {
    if(confirm('Está seguro de que quiere eliminar esta sucursal?')){
    this._sucursalService
      .eliminarCategoria(pKey)
      .then(data => {
        this.getSucursalList();
        this._as.msg('OK', 'Eliminar Sucursal', 'Sucursal Eliminada Correctamente.')
      })
      .catch(error => {
        this._as.msg('ERR', 'Eliminar Sucursal', 'Error al Eliminar Sucursal.')
      });
  }
}


}
