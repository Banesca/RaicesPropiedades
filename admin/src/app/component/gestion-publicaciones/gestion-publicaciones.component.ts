import { enCRUD } from "./../../misc/enums";
import { GestionPublicaciones } from './../../services/interfaces.index'
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators,
  FormControl
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
  isLinear = true;

  mTiposDePublicaciones: any[];
  mTiposDePropiedades: any[];

  mCategoriasSelect: IGestionPublicaciones;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  mEstados: any[] = [];

  isApareceEnLaGaleria = false;

  firstFormGroup: FormGroup;
  secondFormGroup: FormGroup;
  thirdFormGroup: FormGroup;

  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _GestionPublicacionesService: GestionPublicacionesService,
    private _AlertsService: AlertsService
  ) {
    this.mEstados = [];
    this.mTiposDePropiedades = [];
    this.mTiposDePublicaciones = [];

    // Inicializamos los combobox que utilizaremos

    this.mEstados = [{ value: 1, viewValue: "Activa" }, { value: 0, viewValue: "Inactiva" }];
    this.mTiposDePropiedades = [{ value: 1, viewValue: "Tipo 1" }, { value: 2, viewValue: "Tipo 2" }];
    this.mTiposDePublicaciones = [{ value: 1, viewValue: "Publicacion 1" }, { value: 2, viewValue: "Publicacion 2" }];
    this.mCategoriasSelect = GestionPublicaciones.empy();



    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
  }

  ngOnInit() {
    //Inicializamos los 3 form groups para el steeper
    this.firstFormGroup = this._formBuilder.group({
      titulo: [null, [Validators.required, Validators.minLength(5)]],
      estado: [null, Validators.required],
      descripcion: [null, Validators.required],
      tipoDePropiedad: [null, Validators.required],
      tipoDePublicacion: [null, Validators.required],
      apareceEnLaGaleria: [true, Validators.required]
    });


    this.secondFormGroup = this._formBuilder.group({

    });

    this.thirdFormGroup = this._formBuilder.group({

    });

  }


  getAll() {
    this.mLoading = true;
    /*
    this._GestionPublicacionesService
      .allCategorias()
      .then(data => {
        this.mTipoDePublicacion = data.result;
        this.mLoading = false;
      })
      .catch(error => {
      });*/
  }

  modificar(pCategoria: IGestionPublicaciones) {
    //  this.mForma.setValue(pCategoria);
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

  nuevo() {
    this.firstFormGroup.reset();
    this.secondFormGroup.reset();
    this.thirdFormGroup.reset();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IGestionPublicaciones) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  accion() {
    /*
    this.mCategoriasSelect = this.mForma.value as IGestionPublicaciones;
    if (this.mFormaEstado === enCRUD.Crear) {
      this.guardar();
    } else if (this.mFormaEstado === enCRUD.Actualizar) {
      this.actualizar();
    }*/
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

  print() {
    console.log(
      this.firstFormGroup.controls['apareceEnLaGaleria'].value
    );
  }
  
}
