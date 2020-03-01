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

  guardar() {
    this.fichasSelect = this.form.value as IFichas;
    this.mLoading = true;
     this._FichaService.agregarFicha(this.fichasSelect)
       .then(data => {

        console.log("Nuevo registro resp", data);
         this.formEstado = enCRUD.Eliminar;
         this.getAll();
         this.mLoading = false;
         this._AlertsService.msg('OK', '¡Éxito!', 'Módulo Creado Correctamente.')
       })
       .catch(error => {
       });
  }


}
