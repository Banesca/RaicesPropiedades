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
      titulo: ["", [Validators.required, Validators.minLength(3)]],
      descripcion: ["", Validators.required],
      fk_publicaciones: ["", Validators.required]
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
        this._AlertsService.msg('ERR', 'ERROR', 'Error al cargar los datos.')
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
        this._AlertsService.msg('OK', '!EXITO!', 'Galería eliminada Correctamente.')
      })
      .catch(err => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al eliminar la galería.')
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
    console.log(this.mCategoriasSelect)
    this._GaleriaHomeService
      .actualizarCategoria(this.mCategoriasSelect, pKey)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg('OK', '!EXITO!', 'Galería Actualizada Correctamente.')
      })
      .catch(err => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al Actualizar la galería.')
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
        this._AlertsService.msg('OK', '!EXITO!', 'Galería creada Correctamente.')
      })
      .catch(err => {
        this._AlertsService.msg('ERR', 'ERROR', 'Error al crear la galería.')
      });
  }
}
