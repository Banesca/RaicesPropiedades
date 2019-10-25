import { enCRUD } from "./../../misc/enums";
import { MailSuscribers } from "./../../services/interfaces.index";
import { NgForm, FormGroup, FormBuilder, Validators } from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { IMailSuscriber } from "./../../services/mail-suscribers/mail-suscriber.interface";
import { MailSuscribersService } from "./../../services/mail-suscribers/mail-suscribers.service";
import { AlertsService } from "../../services/alerts.service";

@Component({
  selector: "app-mail-suscribers",
  templateUrl: "./mail-suscribers.component.html",
  styleUrls: ["./mail-suscribers.component.css"]
})
export class MailSuscribersComponent implements OnInit {
  mCategorias: IMailSuscriber[];
  mCategoriasSelect: IMailSuscriber;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  submitted = false;

  mForma: FormGroup;
  filterForm: FormGroup;

  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _MailSuscribersService: MailSuscribersService,
    private _AlertsService: AlertsService
  ) {}
  get f() {
    return this.mForma.controls;
  }
  ngOnInit() {
    this.mCategorias = [];
    this.mCategoriasSelect = MailSuscribers.empy();
    this.mForma = this.generarFormulario();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
    this.filterForm = this.getFilterForm();
  }
  getFilterForm() {
    return this._formBuilder.group({
      search: [""]
    });
  }
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
        this._AlertsService.msg(
          "ERR",
          "ERROR",
          "Ha ocurrido un problema al cargar los datos."
        );
      });
  }
  onSubmit() {
    this.submitted = true;
    if (this.mForma.invalid) {
      return;
    }

    this.mCategoriasSelect = this.mForma.value as IMailSuscriber;
    this.guardar();
  }

  nuevo() {
    this.mForma.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IMailSuscriber) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  guardar() {
    this.mLoading = true;
    this._MailSuscribersService
      .nuevaCategoria(this.mCategoriasSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
        this.submitted = false;
        this._AlertsService.msg("OK", "¡Éxito!", "Mail Enviado Correctamente.");
      })
      .catch(error => {
        this._AlertsService.msg(
          "ERR",
          "ERROR",
          "Hubo un problema al envíar el Mail."
        );
      });
  }
  filter() {
    // Buscar por título y descripción
    this._MailSuscribersService
      .suscripcionFilter(this.filterForm.value)
      .then(data => {
        this.mCategorias = data.request;
      })
      .catch(err => {
        console.log(err);
        this._AlertsService.msg("ERR", "ERROR", "Error al crear la galería.");
      });
  }
}
