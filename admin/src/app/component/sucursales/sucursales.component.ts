import { enCRUD } from "./../../misc/enums";
import { Sucursales } from './../../services/interfaces.index'
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { ISucursales } from './../../services/sucursales/sucursales-interface'
import { SucursalesService } from './../../services/sucursales/sucursales-service'
import { AlertsService } from '../../services/alerts.service';


@Component({
  selector: 'app-sucursales',
  templateUrl: './sucursales.component.html',
  styleUrls: ['./sucursales.component.css']
})
export class SucursalesComponent implements OnInit {

  mCategorias: ISucursales[];
  mCategoriasSelect: ISucursales;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;

  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private sucursales: SucursalesService,
    private _AlertsService: AlertsService
  ) {
    this.mCategorias = [];
    this.mCategoriasSelect = Sucursales.empy();
    this.mForma = this.generarFormulario();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
  }

  ngOnInit() {}

  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      nombreSucursal: ['', Validators.required],
      telefonoSucursal:['',Validators.required],
      emailSucursal: ['', [Validators.required, Validators.email]],
      direccionSucursal: ['', Validators.required]
    })
  }

  checkPassword(group: FormGroup) {
  let pass = group.controls.password.value;
  let confirmPass = group.controls.password_confirmation.value;

  return pass === confirmPass ? null : { notSame: true }     
}

  getAll() {
    this.mLoading = true;
    this.sucursales
      .allCategorias()
      .then(data => {
        this.mCategorias = data.suculsales;
        this.mLoading = false;
        console.log(data)
      })
      .catch(error => {
        console.log(error)
      });
  }


  modificar() {
    this.mFormaEstado = enCRUD.Actualizar;
  }

  eliminar(pKey: string) {
    this.mLoading = true;
    this.sucursales
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

  ver(pCategoria: ISucursales) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  accion() {
    this.mCategoriasSelect = this.mForma.value as ISucursales;
    if (this.mFormaEstado === enCRUD.Crear) {
      this.guardar();
    } else if (this.mFormaEstado === enCRUD.Actualizar) {
      this.actualizar();
    }
  }

  guardar() {
    this.mLoading = true;
    this.sucursales
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
    this.sucursales
      .actualizarCategoria(this.mCategoriasSelect, this.mCategoriasSelect.idSucursal)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
      })
      .catch(error => {
      });
  }
}
