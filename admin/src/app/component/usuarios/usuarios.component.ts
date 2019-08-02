import { enCRUD } from "./../../misc/enums";
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators,
  FormArray
} from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import {
  IUsuarios,
  Usuarios
} from "./../../services/usuarios/usuarios-interface";
import { _UsuariosService } from "./../../services/usuarios/_usuarios-service";
import { AlertsService } from "../../services/alerts.service";
import { IModulos, Modulos } from "./../../services/modulos/modulos.interface";
import { ModulosService } from "./../../services/modulos/modulos.service";
import { ConfirmService } from "src/app/services/confirm.service";

@Component({
  selector: "app-usuarios",
  templateUrl: "./usuarios.component.html",
  styleUrls: ["./usuarios.component.css"]
})
export class UsuariosComponent implements OnInit {
  mCategorias: IUsuarios[];
  mCategoriasSelect: IUsuarios;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  id: number;
  searchResult: any[] = [];
  mModulos: IModulos[];
  mForma: FormGroup;
  mFormM: FormGroup;
  filterForm: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;
  modulo = new FormArray([]);
  public requirePasssword: boolean;

  constructor(
    private _formBuilder: FormBuilder,
    private _usuarios: _UsuariosService,
    private _AlertsService: AlertsService,
    private _ModuloService: ModulosService,
    private confirm: ConfirmService
  ) {}

  ngOnInit() {
    this.mCategorias = [];
    this.mFormaEstado = enCRUD.Eliminar;
    this.mCategoriasSelect = Usuarios.empy();
    this.getAll();
    this.mForma = this._formBuilder.group({
      name: ["", Validators.required],
      password: [""],
      password_confirmation: [""],
      email: ["", [Validators.required, Validators.email]]
    });
    this.mFormM = this._formBuilder.group({
      modulo: [""]
    });
    this.filterForm = this._formBuilder.group({
      search: [""],
      searchRol: [""],
      aprobados: [""]
    });
    this.rulesPassword();
  }

  getAll() {
    this.mLoading = true;
    this._usuarios
      .allCategorias()
      .then(data => {
        this.mCategorias = data.users;
        this.mLoading = false;
      })
      .catch(error => {
        console.log(error);
        this._AlertsService.msg("ERR", "ERROR", "Error al cargar los datos");
      });
  }

  modificar(pCategoria: IUsuarios) {
    this.mCategoriasSelect = pCategoria;
    console.log(this.mCategoriasSelect);
    this.mFormaEstado = enCRUD.Actualizar;
    this.id = pCategoria.id;
    this.rulesPassword();
  }

  modulos(idUsuario) {
    this.mFormaEstado = enCRUD.Asignar;
    this._ModuloService
      .All()
      .then(res => {
        console.log(res);
        this.mModulos = res.modulos;
        this.mLoading = false;
      })
      .catch(error => {
        console.log(error);
      });
    this.id = idUsuario.id;
  }

  asignarModulo() {}

  eliminar(pKey: number) {
    const obj = {
      title: "Gestión de Usuarios",
      info: "Está seguro de que quiere eliminar este usurio?"
    };

    this.confirm
      .openConfirmDialog(obj)
      .afterClosed()
      .subscribe(res => {
        if (res) {
          this.mLoading = true;
          this._usuarios
            .eliminarCategoria(pKey)
            .then(data => {
              this.getAll();
              console.log(pKey);
              this.mLoading = false;
              this._AlertsService.msg(
                "OK",
                "¡EXITO!",
                "Usuario eliminado correctamente"
              );
            })
            .catch(error => {
              this._AlertsService.msg(
                "ERR",
                "ERROR",
                "Error al eliminar el usuario"
              );
            });
        }
      });
  }

  nuevo() {
    this.mCategoriasSelect = Usuarios.empy();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: IUsuarios) {
    console.log(pCategoria);
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Leer;
  }

  guardar() {
    this.mCategoriasSelect = this.mForma.value as IUsuarios;
    this.mLoading = true;
    this._usuarios
      .nuevaCategoria(this.mCategoriasSelect)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg(
          "OK",
          "¡EXITO!",
          "Usuario creado correctamente"
        );
      })
      .catch(err => {
        var msj = err;

        // console.log(err)
        // if (error.message) {
        //    msj = `${error.message} . \n`
        // }

        // if (error.errors) {
        //    let keysError = Object.keys(error.errors)
        //    keysError.forEach(key => {
        //       msj += `${error.errors[key]} . \n`
        //    });
        // }

        this._AlertsService.msg(
          "ERR",
          "ERROR",
          "Error al crear el usuario. \n" + msj
        );
      });
  }

  filtrar() {
    this.mLoading = true;
    const val = this.filterForm.value;
    console.log(val);
    this._usuarios
      .filtrarUsuarios(val)
      .then(res => {
        this.searchResult = res;
        this.mCategorias = this.searchResult;
        this.mLoading = false;
        console.log(this.searchResult, this.mCategorias);
      })
      .catch(error => {
        console.log(error);
        this._AlertsService.msg("ERR", "error", "error al filtrar");
      });
  }

  actualizar() {
    this.mCategoriasSelect = this.mForma.value as IUsuarios;
    this.mLoading = true;
    console.log(this.id);
    if (
      (this.mCategoriasSelect.password ||
        this.mCategoriasSelect.password_confirmation) &&
      this.mCategoriasSelect.password !==
        this.mCategoriasSelect.password_confirmation
    ) {
      this._AlertsService.msg("ERR", "ERROR", "La contraseña no coinciden");
      return;
    }
    this._usuarios
      .actualizarCategoria(this.mCategoriasSelect, this.id)
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg(
          "OK",
          "¡EXITO!",
          "Usuario actualizado correctamente"
        );
      })
      .catch(error => {
        this._AlertsService.msg(
          "ERR",
          "ERROR",
          "Error al actualizar el usuario"
        );
      });
  }

  rulesPassword() {
    this.requirePasssword = true;
    if (this.mCategoriasSelect.id) {
      if (
        !this.mForma.get("password").value ||
        !this.mForma.get("password_confirmation").value
      ) {
        this.requirePasssword = false;
      }
    }
  }
}
