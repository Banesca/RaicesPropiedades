import { enCRUD } from "./../../misc/enums";
import { MailSuscribers } from './../../services/interfaces.index'
import {
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { IMailSuscriber } from './../../services/mail-suscribers/mail-suscriber.interface'
import { MailSuscribersService } from './../../services/mail-suscribers/mail-suscribers.service'
import { AlertsService } from '../../services/alerts.service';


@Component({
<<<<<<< HEAD
    selector: 'app-galeria-home',
    templateUrl: './galeria-home.component.html',
    styleUrls: ['./galeria-home.component.css']
  })
  export class GaleriaHomeComponent implements OnInit {
  mCategorias: IMailSuscriber[];
  mCategoriasSelect: IMailSuscriber;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _MailSuscribersService: MailSuscribersService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
    this.mCategoriasSelect = MailSuscribers.empy();
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
      .allCategorias()
      .then(data => {
        this.mCategorias = data.suscripcion;
        this.mLoading = false;
      })
      .catch(error => {
        console.log(error)
      });
  }

  modificar(pCategoria: IMailSuscriber) {
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

  ver(pCategoria: IMailSuscriber) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  actualizar(pKey: number) {
    this.mCategoriasSelect = this.mForma.value as IMailSuscriber;
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


  guardar() {
    this.mCategoriasSelect = this.mForma.value as IMailSuscriber;
    this.mLoading = true;
    this._MailSuscribersService
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
=======
  selector: 'app-galeria-home',
  templateUrl: './galeria-home.component.html',
  styleUrls: ['./galeria-home.component.css']
})
export class GaleriaHomeComponent implements OnInit {
    myForm: FormGroup;
    
    constructor(
        private _alertService: AlertsService,
        private fb: FormBuilder
    ) {
        this.myForm = fb.group({
            titulo: ['',Validators.required],
            descripcion: ['',Validators.required],
        })


    }

    ngOnInit() {
     }
}
>>>>>>> origin/breiddy
