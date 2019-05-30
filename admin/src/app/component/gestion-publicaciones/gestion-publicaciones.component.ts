import { enCRUD } from "./../../misc/enums";
import { GestionPublicaciones } from './../../services/interfaces.index'
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { IGestionPublicaciones } from './../../services/gestion-publicaciones/gestion-publicaciones.interface'
import { GestionPublicacionesService } from './../../services/gestion-publicaciones/gestion-publicaciones.service'
import { AlertsService } from '../../services/alerts.service';


declare var $;
@Component({
  selector: 'app-gestion-publicaciones',
  templateUrl: './gestion-publicaciones.component.html',
  styleUrls: ['./gestion-publicaciones.component.css']
})
export class GestionPublicacionesComponent implements OnInit {
  mCategorias: IGestionPublicaciones[];
  mCategoriasSelect: IGestionPublicaciones;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _GestionPublicacionesService: GestionPublicacionesService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
    this.mCategoriasSelect = GestionPublicaciones.empy();
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
    this._GestionPublicacionesService
      .allCategorias()
      .then(data => {
        this.mCategorias = data.result;
        this.mLoading = false;
      })
      .catch(error => {
      });
  }

  modificar(pCategoria: IGestionPublicaciones) {
    this.mForma.setValue(pCategoria);
    this.mFormaEstado = enCRUD.Actualizar;
  }

  eliminar(pKey: string) {
    this.mLoading = true;
    this._GestionPublicacionesService
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }

  nuevo(pForma: NgForm) {
    this.mForma.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IGestionPublicaciones) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  accion() {
    this.mCategoriasSelect = this.mForma.value as IGestionPublicaciones;
    if (this.mFormaEstado === enCRUD.Crear) {
      this.guardar();
    } else if (this.mFormaEstado === enCRUD.Actualizar) {
      this.actualizar();
    }
  }

  guardar() {
    this.mLoading = true;
    this._GestionPublicacionesService
      .nuevaCategoria(this.mCategoriasSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }

  actualizar() {
    this.mLoading = true;
    this._GestionPublicacionesService
      .actualizarCategoria(this.mCategoriasSelect, this.mCategoriasSelect.id)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }
}
