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
      email: ["", [Validators.required, Validators.email]]
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
        this._AlertsService.msg('ERR', 'ERROR', 'Error al cargar los datos.')

      });
  }

  modificar(pCategoria: ISuscriber) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
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
