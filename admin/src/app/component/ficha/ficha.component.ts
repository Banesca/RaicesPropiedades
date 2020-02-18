 import { enCRUD } from "./../../misc/enums";
import {Component, OnInit} from '@angular/core';
import { /*NgForm, ,  FormArray,*/Validators, FormGroup, FormBuilder} from "@angular/forms";
import { AlertsService } from "../../services/alerts.service";
import { FichaService } from './../../services/ficha/ficha.service'
import { IFichas, Fichas } from './../../services/ficha/ficha.interface'


@Component({
  selector: 'app-ficha',
  templateUrl: './ficha.component.html',
  styleUrls: ['./ficha.component.css']
})

export class FichaComponent implements OnInit {

  fichas: IFichas[];
  fichasSelect: IFichas;
  formEstado: string;

  public checkForm: FormGroup;
  public mLoading: boolean;
  
  form: FormGroup;
  enCRUD = enCRUD;

  constructor(
    private _formBuilder: FormBuilder,
    private _FichaService: FichaService,
    private _AlertsService: AlertsService
  ) 
  {
    this.fichas = [];
    this.form = this.generarFormulario();

  }



  ngOnInit() {
  }


  generarFormulario() {
    //Estructura de nuestro formulario
    return this._formBuilder.group({
      titulo: ["", Validators.required],
      ubicacion: ["", Validators.required],
      caracteristica: ["", Validators.required],
      valor: ["", Validators.required],
      comision: ["", Validators.required],
      img: [{}, Validators.required],
    });
 }

  getAll() {
    this.mLoading = true;
    this._FichaService.All().subscribe(
      (res: any) => 
      {
        this.fichas = res.fichas;
        this.mLoading = false;
      },
      (error) => {
        console.log(error)
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
