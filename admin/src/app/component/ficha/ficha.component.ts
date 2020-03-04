import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, /*NgForm, ,  FormArray,*/ Validators} from "@angular/forms";
import {AlertsService} from "../../services/alerts.service";
import {enCRUD} from "./../../misc/enums";
import {Fichas, IFichas} from './../../services/ficha/ficha.interface';
import {FichaService} from './../../services/ficha/ficha.service';


@Component({
  selector: 'app-ficha',
  templateUrl: './ficha.component.html',
  styleUrls: ['./ficha.component.css']
})

export class FichaComponent implements OnInit {

  fichas: any[];
  fichasSelect: IFichas;
  formEstado: string;

  imgTitulo: string = 'Imagen de la Fachada de la Propiedad';

  public checkForm: FormGroup;
  public mLoading: boolean;
  
  form: FormGroup;
  filterForm: FormGroup;
  
  enCRUD = enCRUD;
  progressBar = false;

  images: any = [];
  length: number = 0;
  
  constructor(
    private _formBuilder: FormBuilder,
    private _FichaService: FichaService,
    private _AlertsService: AlertsService
  ) 
  {
    this.form = this.generarFormulario();
    this.filterForm = this.generarFormulario();
    this.formEstado = enCRUD.Crear;
  }



  ngOnInit() {
    this.fichas = [];
    this.getAll();

    this.fichasSelect = Fichas.empy();
    this.form.reset();
  }


  generarFormulario() {
    //Estructura de nuestro formulario
    return this._formBuilder.group({
      titulo: ["", Validators.required],
      ubicacion: ["", Validators.required],
      caracteristica: ["", Validators.required],
      valor: ["", Validators.required],
      comision: ["", Validators.required],
      img: [{}],
    });
 }

  nuevo() {
    this.form.reset();
    this.formEstado = enCRUD.Crear;
  }

  getAll() {
    this.mLoading = true;
    this._FichaService.All().subscribe(
      (res) => {
        this.fichas = res;
        this.mLoading = false;
        console.log('Lista:');
        console.log(this.fichas);
      },
      (error) =>{
        console.log(error);
      }
    );

  }

  getFormData() {

    for (let i = 0; i < this.length; i++) {
      this.fichasSelect.img = this.images[i];
    } 

  }


  guardar() {
    this.fichasSelect = this.form.value as IFichas;
    this.mLoading = true;
    this.getFormData();
    console.log(this.fichasSelect);
     this._FichaService.agregarFicha(this.fichasSelect)
       .then(data => {

        console.log("Nuevo registro resp", data);
         this.formEstado = enCRUD.Eliminar;
         this.getAll();
         this.mLoading = false;
         this._AlertsService.msg('OK', '¡Éxito!', 'Módulo Creado Correctamente.')
       })
       .catch(error => {
         console.log(error);
       });
  }


  handleFileSelect(evt) {
    this.images = this.images.push(evt.target.files[0]); // FileList object
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
          if (image.width < 2000 || image.height < 700) {
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
          } else {
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
          }
        };
      };
      reader.readAsDataURL(f);
    }

    console.log(this.images);
  }

}
