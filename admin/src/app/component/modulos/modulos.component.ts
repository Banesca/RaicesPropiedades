import { enCRUD } from "./../../misc/enums";
import {
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { ModulosService } from './../../services/modulos/modulos.service'
import { AlertsService } from '../../services/alerts.service';
import { IModulos, Modulos } from './../../services/modulos/modulos.interface'
/*
  Creado Por Breiddy Monterrey 17/6/2019
*/

@Component({
  selector: 'app-modulos',
  templateUrl: './modulos.component.html',
  styleUrls: ['./modulos.component.css']
})
export class ModulosComponent implements OnInit {
  mModulos: IModulos[];
  mModulosSelect: IModulos;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  mId: number;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _ModuloService: ModulosService,
    private _AlertsService: AlertsService
  ) {
    this.mModulos = [];
    this.mForma = this.generarFormulario();
    this.mModulosSelect = Modulos.empy();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
  }

  ngOnInit() {}

  generarFormulario() {
     //Estructura de nuestro formulario
     return this._formBuilder.group({
       modulo: ["", Validators.required],
       descripcion: ["", Validators.required],
       url: ["", Validators.required],
       iconomodulo: ["", Validators.required]
     });
  }

  nuevo() {
    this.mForma.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  getAll() {
    this.mLoading = true;
    this._ModuloService
      .All()
       .then(res => {
        this.mModulos = res.modulos;
         this.mLoading = false;
       })
       .catch(error => {
         console.log(error)
       });
  }

  modificar(pModulo: IModulos) {
    
     this.mModulosSelect = pModulo;
     this.mFormaEstado = enCRUD.Actualizar;
   }

  eliminar(pKey: number) {
    this.mLoading = true;
     this._ModuloService
     .eliminarModulos(pKey)
      .then(data => {
         this.getAll();
         this.mLoading = false;
       })
       .catch(error => {
       });
   }

   ver(pModulo: IModulos) {
     this.mModulosSelect = pModulo;
     this.mFormaEstado = enCRUD.Leer;
   }


   guardar() {
    this.mModulosSelect = this.mForma.value as IModulos;
    this.mLoading = true;
     this._ModuloService
       .nuevoModulo(this.mModulosSelect)
       .then(data => {
         this.mFormaEstado = enCRUD.Eliminar;
         this.getAll();
         this.mLoading = false;
         this._AlertsService.msg('OK', 'EXITO!', 'Módulo Creado Correctamente.')
       })
       .catch(error => {
       });
  }

    actualizar(pKey: number) {
     
      this.mModulosSelect = this.mForma.value as IModulos;
      this.mLoading = true;
      this._ModuloService
        .actualizarModulos(this.mModulosSelect, pKey)
        .then(data => {
         this.mFormaEstado = enCRUD.Eliminar;
          this.getAll();
          this.mLoading = false;
          this._AlertsService.msg('OK', 'EXITO!', 'Módulo Actualizado Correctamente.')
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

