import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, /*NgForm, ,  FormArray,*/ Validators} from "@angular/forms";
import {AlertsService} from "../../services/alerts.service";
import {enCRUD} from "./../../misc/enums";
import {Fichas, IFichas} from './../../services/ficha/ficha.interface';
import {FichaService} from './../../services/ficha/ficha.service';
import {environment} from '../../../environments/environment';


@Component({
  selector: 'app-ficha',
  templateUrl: './ficha.component.html',
  styleUrls: ['./ficha.component.css']
})

export class FichaComponent implements OnInit {

  fichas: any[];
  fichasSelect: IFichas;
  formEstado: string;
  images: any = [];
  length: number = 0;
  inPromise: boolean;
  host: string;
  img1fa:File;
  img2pr:File;
  img3pl:File;
  img4pl:File;
  img5sa:File;
  img6sa:File;
  imageNotFound = 'assets/not-found-publicaciones.png';



  public checkForm: FormGroup;
  public mLoading: boolean;

  form: FormGroup;
  filterForm: FormGroup;

  enCRUD = enCRUD;
  progressBar = false;

  constructor(
    private _formBuilder: FormBuilder,
    private _FichaService: FichaService,
    private _AlertsService: AlertsService
  )
  {
    this.form = this.generarFormulario();
    this.filterForm = this.generarFormulario();
    this.formEstado = enCRUD.Eliminar;
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
      img1fa: ['', Validators.required],
      img2pr: ['', Validators.required],
      img3pl: ['', Validators.required],
      img4pl: [''],
      img5sa: [''],
      img6sa: ['']
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

  guardar() {
    this.mLoading = true;

   let obj = this.getDataForm();

    let formData: FormData = new FormData();
    let keys = Object.keys(obj);

    for (let index = 0; index < keys.length; index++) {
        const element = keys[index];
        formData.append(element, obj[element]);
    }

     this._FichaService.agregarFicha(formData).then((resp: any) => {

         this.formEstado = enCRUD.Eliminar;
         this.getAll();
         this.mLoading = false;
         this._AlertsService.msg('OK', '¡Éxito!', 'Ficha Creada Correctamente.')
        }).catch(e => {
          console.error(e);
          this._AlertsService.msg("ERR", "ERROR", "Error al publicar los datos.");
      });
  }

  handleFileSelect(evt,section) {
    if (evt.target.files && evt.target.files.length) {
      const fileTo: File = evt.target.files[0];

       //Validamos el tipo de archivo
       if (!fileTo.type.includes('image/png')
       && !fileTo.type.includes('image/jpg')
       && !fileTo.type.includes('image/jpeg')) {
       this._AlertsService.msg('ERR', 'Error:', 'El archivo no es admitido o no es una imagen');
       return;
    }

    //Validamos el tamaño del archivo
    if (fileTo.size > 5000000) {
        this._AlertsService.msg('ERR', 'Error:', 'El archivo es muy pesado, peso máximo 5Mb');
        return;
    }

    //Obtenemos un fakeURL para mostrar un preview
    var reader = new FileReader();
    reader.readAsDataURL(evt.target.files[0]);


      //seteo imagenes
 switch (section) {
  case "img1fa":
    //Asignamos la imagen
    this.img1fa = fileTo;
    //Asignamos el fakeUrl
    reader.onload = (event) => {
        this.form.controls['img1fa'].setValue((<FileReader>event.target).result);
    }
    break;
  case "img2pr":
    //Asignamos la imagen
    this.img2pr = fileTo;
    //Asignamos el fakeUrl
    reader.onload = (event) => {
        this.form.controls['img2pr'].setValue((<FileReader>event.target).result);
    }
    break;
  case "img3pl":
    //Asignamos la imagen
    this.img3pl = fileTo;
    //Asignamos el fakeUrl
    reader.onload = (event) => {
        this.form.controls['img3pl'].setValue((<FileReader>event.target).result);
    }
    break;
  case "img4pl":
    //Asignamos la imagen
    this.img4pl = fileTo;
    //Asignamos el fakeUrl
    reader.onload = (event) => {
        this.form.controls['img4pl'].setValue((<FileReader>event.target).result);
    }
    break;
  case "img5sa":
    //Asignamos la imagen
    this.img5sa = fileTo;
    //Asignamos el fakeUrl
    reader.onload = (event) => {
        this.form.controls['img5sa'].setValue((<FileReader>event.target).result);
    }
    break;
  case "img6sa":
    //Asignamos la imagen
    this.img6sa = fileTo;
    //Asignamos el fakeUrl
    reader.onload = (event) => {
        this.form.controls['img6sa'].setValue((<FileReader>event.target).result);
    }
    break;
  default:
    break;
}


  }
  }

  goPdf(id){
    this._FichaService.goToPdf(id);
  }

  eliminar(id) {
    this.mLoading = true;
    this._FichaService.eliminarFicha(id).then(data => {
          this.formEstado = enCRUD.Eliminar;
          this.getAll();
          this.mLoading = false;
          this._AlertsService.msg('OK', '¡Éxito!', 'Ficha eliminada  Correctamente.')

          }).catch(error => {
            this.mLoading = false;
            this._AlertsService.msg("ERR", "Error", `Error: ${error.status} - ${error.statusText}`);

          });

}


getDataForm() {
  //Creamos el objeto que vamos a llenar totalmente vacio
  let obj: IFichas = {} as IFichas;

  //Creamos un objeto con los valores del formulario 1
  let data1 = this.form.value;

  obj.titulo = data1.titulo;
  obj.ubicacion = data1.ubicacion;
  obj.caracteristica = data1.caracteristica;
  obj.valor = data1.valor;
  obj.comision = data1.comision;
  this.img1fa ? obj.img1fa = this.img1fa : null;
  this.img2pr ? obj.img2pr = this.img2pr : null;
  this.img3pl ? obj.img3pl = this.img3pl : null;
  this.img4pl ? obj.img4pl = this.img4pl : null;
  this.img5sa ? obj.img5sa = this.img5sa : null;
  this.img6sa ? obj.img6sa = this.img6sa : null;


  return obj;

}




}
