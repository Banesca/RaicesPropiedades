import { enCRUD } from "./../../misc/enums";
import { ISuscriber, Suscriber } from './../../services/interfaces.index'
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { MailSuscribersService } from './../../services/mail-suscribers/mail-suscribers.service'
import { AlertsService } from '../../services/alerts.service';


@Component({
  selector: 'app-suscribers',
  templateUrl: './suscribers.component.html',
  styleUrls: ['./suscribers.component.css']
})
export class SuscribersComponent implements OnInit {
  activos: boolean = true;
  mCategorias: ISuscriber[];
  mCategoriasSelect: ISuscriber;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  searchResult: any [] = [];

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _MailSuscribersService: MailSuscribersService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
    this.mCategoriasSelect = Suscriber.empy();
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

  getAll() {
    this.mLoading = true;
    this._MailSuscribersService
      .allSuscribers()
      .then(data => {
        this.mCategorias = data.suscripcion;
        this.mLoading = false;
        console.log(this.mCategorias)
      })
      .catch(error => {
        console.log(error)
      });
  }

  modificar(pCategoria: ISuscriber) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
  }

  eliminar(pKey: number) {
    this.mLoading = true;
    this._MailSuscribersService
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

  ver(pCategoria: ISuscriber) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  actualizar(pKey: number) {
    this.mCategoriasSelect = this.mForma.value as ISuscriber;
    this.mLoading = true;
    this._MailSuscribersService
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

*/
  guardar() {
    this.mCategoriasSelect = this.mForma.controls["email"].value;
    this.mLoading = true;
    this._MailSuscribersService
      .search(this.mCategoriasSelect)
      .then(data => {
          this.mCategorias = data.suscripcion;
        this.mLoading = false;
        console.log(this.mCategoriasSelect,  this.mCategorias)
      })
      .catch(error => {
        this.mLoading = false;
        console.log(error)
        console.log(this.mCategoriasSelect)
      });
  }
}
