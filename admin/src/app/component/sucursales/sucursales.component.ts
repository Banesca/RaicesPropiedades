import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { enCRUD } from "./../../misc/enums";
import { Sucursal } from 'src/app/services/sucursales/sucursal';
import { SucursalService } from 'src/app/services/sucursales/sucursal.service';
import { AlertsService } from 'src/app/services/alerts.service';
declare var $
@Component({
  selector: 'app-sucursales',
  templateUrl: './sucursales.component.html',
  styleUrls: ['./sucursales.component.css']
})
export class SucursalesComponent implements OnInit {
  mFormaEstado: string;
  enCRUD = enCRUD;
  sucursalList: Sucursal[] = [];
  sucursalSelected: Sucursal;
  myForm: FormGroup
  inPromise: boolean = false;
  constructor(
    private fb: FormBuilder,
    private _sucursalService: SucursalService,
    private _as: AlertsService
  ) {
    this.myForm = this.fb.group({
      nombre: ['', Validators.required],
      numeroContacto: ['', [Validators.required, Validators.pattern(new RegExp(/^[0-9]+$/))]],
      email: ['', [Validators.required, Validators.email]],
      direccion: ['', Validators.required]
    })
  }

  ngOnInit() {
    this.getSucursalList();

  }
  addSucursal() {
    this.inPromise = true;
    const myDataForm = this.myForm.value;

    const toSend: Sucursal = {
      nombreSucursal: myDataForm.nombre,
      telefonoSucursal: myDataForm.numeroContacto,
      direccionSucursal: myDataForm.direccion,
      emailSucursal: myDataForm.email,
    }
    this._sucursalService.addNew(toSend).then(resp => {
      this.getSucursalList();
      this._as.msg('OK', 'EXITO!', 'Datos Guardados.')
      this.inPromise = false;
      //Cerrando modal
      $('#nuevoSucursalModal').modal('hide');
      $('.modal-backdrop').hide();
    }).catch(err => {
      this.inPromise = false;
      console.log(err);
      // Parsear Object errors a Array de errores para poder mapearlos
      const mapped = Object.keys(err.error.errors).map(key => ({ type: key, value: err.error.errors[key] }));
      // Notificando Errores
      mapped ? mapped.map(e => { this._as.msg('ERR', 'ERROR', e.value) }) :
        err.error.message ? this._as.msg('ERR', 'ERROR', err.error.message) :
          this._as.msg('ERR', 'ERROR', 'Error al Guardar.')

    });

  }
  getSucursalList() {
    this.inPromise = true;

    this._sucursalService.getAll().then(resp => {
      console.log(resp);
      this.sucursalList = resp.suculsales;
      this.inPromise = false;
    }).catch(err => {
      this.inPromise = false;
      this._as.msg('ERR', 'ERROR', 'Error al Obtener Datos.')
    });

  }

}
