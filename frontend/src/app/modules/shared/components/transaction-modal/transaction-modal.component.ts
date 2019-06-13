import { Component,Input, OnInit } from '@angular/core';
import { IContacto } from "src/app/servicios/interfaces.index";
import { ContactoService } from "src/app/servicios/servicios.index";
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators
} from "@angular/forms";
import { NgbActiveModal, NgbModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-transaction-modal',
  templateUrl: './transaction-modal.component.html',
  styleUrls: ['./transaction-modal.component.scss']
})
export class TransactionModalComponent implements OnInit {
  @Input() name;

  contactForm: FormGroup;
  contactFormEstado: string;
  mContacto: IContacto;
  successMensaje = false;
  submitted = false;
  errorMensaje = false;
  hideForm = false;
  mLoading = false;
  closeResult: string;

  constructor(
    public activeModal: NgbActiveModal,
     private _formBuilder: FormBuilder,
     private _ContactoService: ContactoService,

    ) {     
    /*  this.contactForm = this.generarFormulario();*/
    }

  ngOnInit() {
    this.contactForm = this._formBuilder.group({
      nombre_apellido: ["", Validators.required],
      telefono: ["", Validators.required],
      fk_tipoPropiedad: ["", Validators.required],
      titulo: ["", Validators.required],
      descripcion: ["", Validators.required]
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



