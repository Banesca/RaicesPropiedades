import { enCRUD } from "./../../misc/enums";
//import { Galeria } from './../../services/interfaces.index'
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import {
  IGaleria,
  Galeria
} from "./../../services/galeria-home/galeria-home.interface";
import { GaleriaHomeService } from "./../../services/galeria-home/galeria-home.service";
import { AlertsService } from "../../services/alerts.service";
import { PublicacionesService } from "./../../services/publicaciones/publicaciones.service";
import { NgbCarouselConfig } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: "app-galeria-home",
  templateUrl: "./galeria-home.component.html",
  styleUrls: ["./galeria-home.component.css"]
})
export class GaleriaHomeComponent implements OnInit {
  mCategorias: IGaleria[];
  mPublicaciones: any;
  mCategoriasSelect: IGaleria;
  mLoading: boolean;
  mMostrarForma = false;
  mNuevo = false;
  images: any = [];
  length: number = 0;
  submitted: boolean = false;
  mForma: FormGroup;
  mFormaEstado: string;
  enCRUD = enCRUD;
  formData = new FormData();

  constructor(
    private _formBuilder: FormBuilder,
    private _GaleriaHomeService: GaleriaHomeService,
    private _AlertsService: AlertsService,
    private _PublicacionesService: PublicacionesService,
    private config: NgbCarouselConfig,
  ) {
    this.mCategorias = [];
    // this.mCategoriasSelect = MailSuscribers.empy();
    this.mForma = this.generarFormulario();
    this.mCategoriasSelect = Galeria.empy();
    this.mFormaEstado = enCRUD.Eliminar;
    this.getAll();
    this.getPublicaciones();
    config.interval = 5000;
    config.wrap = true;
    config.keyboard = false;
    config.pauseOnHover = false;
    config.showNavigationIndicators = false;
  }

  ngOnInit() {
  }

  get f() {
    return this.mForma.controls;
  }
  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      titulo: ["", [
        Validators.required, 
        Validators.minLength(3),
        Validators.pattern("[ña-zA-Z _]*")
      ]],
      descripcion: ["", [
        Validators.required, 
        Validators.minLength(10),
        Validators.maxLength(40),
      ]],
      orden: [null, [
        Validators.required
      ]],
      fk_publicaciones: ["", Validators.required],
      images: null
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
  getFormData() {
    this.formData.append("titulo", this.mCategoriasSelect.titulo);
    this.formData.append("descripcion", this.mCategoriasSelect.descripcion);
    this.formData.append("fk_publicaciones",this.mCategoriasSelect.fk_publicaciones);
    this.formData.append("orden", `${this.mCategoriasSelect.orden}`);
    for (let i = 0; i < this.length; i++) {
      this.formData.append("images[" + i + "]", this.images[i]);
    }
    return this.formData;
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
        console.log(error);
        this._AlertsService.msg("ERR", "ERROR", "Error al cargar los datos.");
      });
  }

  modificar(pCategoria: IGaleria) {
    this.mCategoriasSelect = pCategoria;
    this.mFormaEstado = enCRUD.Actualizar;
  }

  eliminar(pKey: number) {
    if (confirm("¿Está seguro de que quiere eliminar esta galería?")) {
      this.mLoading = true;
      this._GaleriaHomeService
        .eliminarCategoria(pKey)
        .then(data => {
          this.getAll();
          this.mLoading = false;
          this._AlertsService.msg(
            "OK",
            "!ÉXITO!",
            "Galería eliminada Correctamente."
          );
        })
        .catch(err => {
          this._AlertsService.msg(
            "ERR",
            "ERROR",
            "Error al eliminar la galería."
          );
        });
    }
  }

  nuevo() {    
    this.mCategoriasSelect = Galeria.empy();
    this.mFormaEstado = enCRUD.Crear;
  }

  ver(pCategoria: any) {
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
        this.submitted = false;
        this._AlertsService.msg('OK', '!ÉXITO!', 'Galería Actualizada Correctamente.')
      })
      .catch(err => {
        this._AlertsService.msg(
          "ERR",
          "ERROR",
          "Error al Actualizar la galería."
        );
      });
  }

  guardar() {
    this.mLoading = true;
    this._GaleriaHomeService
      .nuevaCategoria(this.getFormData())
      .then(data => {
        this.mFormaEstado = enCRUD.Eliminar;
        this.mCategoriasSelect = Galeria.empy();
        this.getAll();
        this.mForma.reset();
        this.mLoading = false;
        this.submitted = false;
        this._AlertsService.msg('OK', '!ÉXITO!', 'Galería creada Correctamente.');
      })
      .catch(err => {
        console.log(err);
        this._AlertsService.msg("ERR", "ERROR", "Error al crear la galería.");
      });
  }
  handleFileSelect(evt) {
    this.images = evt.target.files; // FileList object
    this.length = evt.target.files.length;
    for (let i = 0, f; (f = this.images[i]); i++) {
      // Only process image files.
      if (!f.type.match("image.*")) {
        continue;
      }
      if (f.size<300000){
        this._AlertsService.msg("ERR", "ERROR", "Las dimensiones de la imagen "+f.name+ " son demasiado pequeñas para subirla a la galería.");
      }else{
        let reader = new FileReader();
        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            let span = document.createElement("span");
            span.innerHTML = [
              '<img class="thumb" style="height:150px;" src="',
              e.target.result,
              '" title="',
              escape(theFile.name),
              '"/>'
            ].join("");
            document.getElementById("list").insertBefore(span, null);
          };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
      
    }
  }
}
