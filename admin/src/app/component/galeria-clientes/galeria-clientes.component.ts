import { enCRUD } from "./../../misc/enums";
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { Component, OnInit } from "@angular/core";
import { GaleriaHomeService } from "./../../services/galeria-home/galeria-home.service";
import { AlertsService } from "../../services/alerts.service";
import { PublicacionesService } from "./../../services/publicaciones/publicaciones.service";
import { NgbCarouselConfig } from "@ng-bootstrap/ng-bootstrap";
import { IGaleriaClientes, GaleriaClientes } from "src/app/services/galeria-clientes/galeria-clientes.interface";
import { GaleriaClientesService } from "src/app/services/galeria-clientes/galeria-clientes.service";

@Component({
  selector: 'app-galeria-clientes',
  templateUrl: './galeria-clientes.component.html',
  styleUrls: ['./galeria-clientes.component.css']
})
export class GaleriaClientesComponent implements OnInit{

mCategorias: IGaleriaClientes[];
mPublicaciones: any;
mCategoriasSelect: IGaleriaClientes;
mLoading: boolean;
mMostrarForma = false;
mNuevo = false;
images: any = [];
length: number = 0;
submitted: boolean = false;

mForma: FormGroup;
filterForm: FormGroup;

mFormaEstado: string;
enCRUD = enCRUD;
formData = new FormData();

width: number = null;
height: number = null;
constructor(
  private _formBuilder: FormBuilder,
  private _GaleriaClienteService: GaleriaClientesService,
  private _AlertsService: AlertsService,
  private config: NgbCarouselConfig
) {}

ngOnInit() {
  this.mCategorias = [];
  // this.mCategoriasSelect = MailSuscribers.empy();
  this.mForma = this.generarFormulario();
  this.mCategoriasSelect = GaleriaClientes.empy();
  this.mFormaEstado = enCRUD.Eliminar;
  this.getAll();
  this.config.interval = 5000;
  this.config.wrap = true;
  this.config.keyboard = false;
  this.config.pauseOnHover = false;
  this.config.showNavigationIndicators = false;
  this.filterForm = this.getFilterForm();
}

get f() {
  return this.mForma.controls;
}
getFilterForm() {
  return this._formBuilder.group({
    search: [""]
  });
}
generarFormulario() {
  // Estructura de nuestro formulario
  return this._formBuilder.group({

    orden: [null, [Validators.required]],
    //fk_publicaciones: ["", Validators.required],
    images: null
  });
}

// desactivar cors chrome.exe --user-data-dir="C://Chrome dev session" --disable-web-security
onSubmit() {
  this.submitted = true;
  if (this.mForma.invalid) {
    return;
  }

  this.mCategoriasSelect = this.mForma.value as IGaleriaClientes;
  this.guardar();
}
getFormData() {
  this.formData.append("orden", this.mCategoriasSelect.orden+"");
  this.formData.append("dir_imagen", this.images[0]);
  this.formData.append("fk_idUser","1");
  return this.formData;
}

getAll() {
  this.mLoading = true;
  this._GaleriaClienteService
    .allGalerias()
    .then(res => {
      this.mCategorias = res.banner;
      console.log(this.mCategorias)

      this.mLoading = false;
    })
    .catch(error => {
      console.log(error);
      this._AlertsService.msg("ERR", "ERROR", "Error al cargar los datos.");
    });
}

modificar(pCategoria: IGaleriaClientes) {
  this.mCategoriasSelect = pCategoria;
  this.mFormaEstado = enCRUD.Actualizar;
}

eliminar(pKey: number) {
  if (confirm("¿Está seguro de que quiere eliminar el cliente?")) {
    this.mLoading = true;
    this._GaleriaClienteService
      .eliminarCategoria(pKey)
      .then(data => {
        this.getAll();
        this.mLoading = false;
        this._AlertsService.msg(
          "OK",
          "¡Éxito!",
          "Galería eliminada Correctamente."
        );
      })
      .catch(err => {
        this._AlertsService.msg(
          "ERR",
          "ERROR",
          "Error eliminar el cliente."
        );
      });
  }
}

nuevo() {
  this.mCategoriasSelect = GaleriaClientes.empy();
  this.mFormaEstado = enCRUD.Crear;
}

ver(pCategoria: any) {
  this.mCategoriasSelect = pCategoria;
  this.mFormaEstado = enCRUD.Leer;
}

actualizar(pKey: number) {
  this.mCategoriasSelect = this.mForma.value as IGaleriaClientes;
  this.mLoading = true;
  this._GaleriaClienteService
    .actualizarCategoria(this.mCategoriasSelect, pKey)
    .then(data => {
      this.mFormaEstado = enCRUD.Eliminar;
      this.mCategoriasSelect = GaleriaClientes.empy();
      this.getAll();
      this.mLoading = false;
      this.submitted = false;
      this._AlertsService.msg(
        "OK",
        "¡Éxito!",
        "Galería Actualizada Correctamente."
      );
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
  this._GaleriaClienteService
    .nuevaCategoria(this.getFormData())
    .then(data => {
      this.mFormaEstado = enCRUD.Eliminar;
      this.mCategoriasSelect = GaleriaClientes.empy();
      this.getAll();
      this.mForma.reset();
      this.mLoading = false;
      this.submitted = false;

      this.formData = new FormData();


      this._AlertsService.msg(
        "OK",
        "¡Éxito!",
        "Galería creada Correctamente."
      );
    })
    .catch(err => {
      console.log(err);
      this._AlertsService.msg("ERR", "ERROR", "Error al crear la galería.");
      this._AlertsService.msg("ERR", "ERROR", err);
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
    let reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = function(theFile: Event) {
      var image = new Image();
      image.src = `${reader.result}`;
      image.onload = function() {
        // access image size here
        let errorMsj: string = "";
        /*if (image.width < 2000 || image.height < 700) {
          if (image.width < 2000) {
            errorMsj +=
              "<div type='alert' class='invalid-feedback d-block'>El ancho mínimo de la imagen debe ser de : 2000  px</div>" +
              "<div type='alert' class='invalid-feedback d-block'>Ancho de la imagen: " +
              image.width +
              " px </div>";
          }
          if (image.height < 700) {
            errorMsj +=
              "<div type='alert' class='invalid-feedback d-block'>El alto mínimo de la imagen debe ser de : 700  px</div>" +
              "<div type='alert' class='invalid-feedback d-block'>Alto de la imagen: " +
              image.height +
              " px</div>";
          }
          document.getElementById("files-errors").innerHTML = errorMsj;
        } else {*/
          document.getElementById("files-errors").innerHTML = "";
          let span = document.createElement("span");
          span.innerHTML = [
            '<img class="thumb" style="height:150px;" src="',
            reader.result,
            '" title="',
            escape(image.name),
            '"/>'
          ].join("");
          document.getElementById("list").insertBefore(span, null);
        //}
      };
    };
    reader.readAsDataURL(f);
  }
}

}
