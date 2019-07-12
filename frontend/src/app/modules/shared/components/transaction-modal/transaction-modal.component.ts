import { Component,Input, OnInit } from '@angular/core';
import { IContacto, ICategoria } from "src/app/servicios/interfaces.index";
import { ContactoService } from "src/app/servicios/servicios.index";
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators
} from "@angular/forms";
import { NgbActiveModal, NgbModalRef  } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-transaction-modal',
  templateUrl: './transaction-modal.component.html',
  styleUrls: ['./transaction-modal.component.scss']
})
export class TransactionModalComponent implements OnInit {
  @Input() name;

  mContacto: IContacto;
  mCategorias: ICategoria[];
  contactForm: FormGroup;
  contactFormEstado: string;
  successMensaje = false;
  submitted = false;
  errorMensaje = false;
  hideForm = false;
  mLoading = false;
  closeResult: string;
  private modalRef: NgbModalRef;


  constructor(
    public activeModal: NgbActiveModal,
     private _formBuilder: FormBuilder,
     private _ContactoService: ContactoService,

    ) {     
      this.getAll();
    }

  ngOnInit() {
    this.contactForm = this._formBuilder.group({
      nombre_apellido: ["", Validators.required],
      email: ["",[Validators.required,Validators.email]],
      telefono: ["", [Validators.required, Validators.pattern(/[^.,]/)]],
      fk_tipoPropiedad: ["", Validators.required],
      titulo: ["",[Validators.required, Validators.pattern(/[a-z]/)]],
      descripcion: ["", Validators.required],
      imagen_1: ["", Validators.required],
      imagen_2: ["", Validators.required]

  });
  }

  /*
  generarFormulario() {
    // Estructura de nuestro formulario
    return this._formBuilder.group({
      id: '',
      nombres: ["", Validators.required],
      apellidos: ["", Validators.required],
      email: ["",[Validators.required, Validators.email]],
      tema: ["", Validators.required],
      mensaje:["", Validators.required,],
      created_at:''
    });
  }
  */

  

      get f() { return this.contactForm.controls; }

      onSubmit() {
          this.submitted = true;
  
          if (this.contactForm.invalid) {
              return;
          }

          this.mContacto = this.contactForm.value as IContacto;
          this.guardar();
      }

      getAll() {
        this._ContactoService
          .All()
            .then(res => {
            this.mCategorias = res.data;
            console.log(this.mCategorias);
    
          })
          .catch(error => {
            console.log(this.mCategorias);
          });
      }

  guardar() {
  this.mLoading = true;
  this.hideForm = true;
  console.log(this.mContacto)
  this._ContactoService
    .New(this.mContacto)
    .then(data => {
      this.successMensaje = true;
      this.mLoading = false;
      this.contactForm.reset();
    })
    .catch(error => {
        this.errorMensaje = true;
        this.mLoading = false;
    });
}
reintentar() {
  this.errorMensaje = false;
  this.hideForm = false;
  this.submitted = false;
}
submittedClose() {
  this.successMensaje = false;
  this.hideForm = false;
  this.submitted = false;
}
}



