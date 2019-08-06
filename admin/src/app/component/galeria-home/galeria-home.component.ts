import { enCRUD } from "./../../misc/enums";
//import { Galeria } from './../../services/interfaces.index'
import {
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { IGaleria, Galeria } from './../../services/galeria-home/galeria-home.interface'
import { GaleriaHomeService } from './../../services/galeria-home/galeria-home.service'
import { AlertsService } from '../../services/alerts.service';
import { PublicacionesService } from "./../../services/publicaciones/publicaciones.service";


@Component({
    selector: 'app-galeria-home',
    templateUrl: './galeria-home.component.html',
    styleUrls: ['./galeria-home.component.css']
  })
  export class GaleriaHomeComponent implements OnInit {
  mCategorias: IGaleria[];
  mPublicaciones: any;
  mCategoriasSelect: IGaleria;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  submitted: boolean = false;
  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _GaleriaHomeService: GaleriaHomeService,
    private _AlertsService: AlertsService,
    private _PublicacionesService: PublicacionesService
  ) {
    this.mCategorias = [];
 //   this.mCategoriasSelect = MailSuscribers.empy();
    this.mForma = this.generarFormulario();
    this.mCategoriasSelect = Galeria.empy();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
    this.getPublicaciones();
  }

  ngOnInit() {}
  get f() {
    return this.mForma.controls;
  }
  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      titulo: ["", [Validators.required, Validators.minLength(3)]],
      descripcion: ["", [Validators.required,Validators.minLength(10)]],
      fk_publicaciones: ["", Validators.required]
    });
  }

  // desactivar cors chrome.exe --user-data-dir="C://Chrome dev session" --disable-web-security
  onSubmit() {
    this.submitted = true;
    if (this.mForma.invalid) {
      return;
    }

    this.mCategoriasSelect = this.mForma.value as IGaleria;
    this.guardar();
  }
  getPublicaciones() {
    this._PublicacionesService
      .All()
        .then(data => {
          this.mPublicaciones = data;

      })
      .catch(error => {
        console.log(error);
      });
  }
  getAll() {
    this.mLoading = true;
    this._GaleriaHomeService
      .allGalerias()
      .then(res => {
        
        this.mCategorias = res.data;
        this.mLoading = false;
      })
      .catch(error => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al cargar los datos.')
      });
  }

  modificar(pCategoria: IGaleria) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;

  }

  eliminar(pKey: number) {
    if(confirm('¿Está seguro de que quiere eliminar esta galería?')){
    this.mLoading = true;
    this._GaleriaHomeService
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg('OK', '!ÉXITO!', 'Galería eliminada Correctamente.')
      })
      .catch(err => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al eliminar la galería.')
      });
  }
}

  nuevo() {
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IGaleria) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  actualizar(pKey: number) {
    this.mCategoriasSelect = this.mForma.value as IGaleria;
    this.mLoading = true;
    this._GaleriaHomeService
      .actualizarCategoria(this.mCategoriasSelect, pKey)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.mCategoriasSelect = Galeria.empy();
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg('OK', '!ÉXITO!', 'Galería Actualizada Correctamente.')
      })
      .catch(err => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al Actualizar la galería.')
      });
  }


  guardar() {
    
    this.mLoading = true;
    this._GaleriaHomeService
      .nuevaCategoria(this.mCategoriasSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.mCategoriasSelect = Galeria.empy();
        this.getAll();
        this.mForma.reset();
        this.mLoading = false;
        this._AlertsService.msg('OK', '!ÉXITO!', 'Galería creada Correctamente.')
      })
      .catch(err => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al crear la galería.')
      });
  }
}