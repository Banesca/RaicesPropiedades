import { enCRUD } from "./../../misc/enums";
//import { Galeria } from './../../services/interfaces.index'
import {
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { IGaleria } from './../../services/galeria-home/galeria-home.interface'
import { GaleriaHomeService } from './../../services/galeria-home/galeria-home.service'
import { AlertsService } from '../../services/alerts.service';


@Component({
    selector: 'app-galeria-home',
    templateUrl: './galeria-home.component.html',
    styleUrls: ['./galeria-home.component.css']
  })
  export class GaleriaHomeComponent implements OnInit {
  mCategorias: IGaleria[];
  mCategoriasSelect: IGaleria;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _GaleriaHomeService: GaleriaHomeService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
 //   this.mCategoriasSelect = MailSuscribers.empy();
    this.mForma = this.generarFormulario();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
  }

  ngOnInit() {}

  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      id: [""],
      titulo: ["", [Validators.required, Validators.minLength(5)]],
      descripcion: ["", Validators.required],
      estado: [""]
    });
  }

  // desactivar cors chrome.exe --user-data-dir="C://Chrome dev session" --disable-web-security

  getAll() {
    this.mLoading = true;
    this._GaleriaHomeService
      .allGalerias()
      .then(res => {
        this.mCategorias = res.data;
        this.mLoading = false;
      })
      .catch(error => {
        console.log(error)
      });
  }

  modificar(pCategoria: IGaleria) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
  }

  eliminar(pKey: number) {
    this.mLoading = true;
    this._GaleriaHomeService
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }

  nuevo() {
    this.mForma.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IGaleria) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  actualizar(pKey: number) {
    this.mCategoriasSelect = this.mForma.value as IGaleria;
    this.mLoading = true;
    this._GaleriaHomeService
      .actualizarCategoria(this.mCategoriasSelect, pKey,)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg('OK', 'EXITO!', 'Sucursal Actualizada Correctamente.')
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
    this.mCategoriasSelect = this.mForma.value as IGaleria;
    this.mLoading = true;
    this._GaleriaHomeService
      .nuevaCategoria(this.mCategoriasSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }
}
