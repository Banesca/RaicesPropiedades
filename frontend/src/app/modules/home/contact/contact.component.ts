import { Component, OnInit } from '@angular/core';
import { IContacto } from "src/app/servicios/interfaces.index";
import { ContactoService } from "src/app/servicios/servicios.index";
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators
} from "@angular/forms";
import { NgbModalConfig, NgbModal, NgbModalRef } from '@ng-bootstrap/ng-bootstrap';


@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {
  contactForm: FormGroup;
  contactFormEstado: string;
  mContacto: IContacto;
  successMensaje = false;
  submitted = false;
  errorMensaje = false;
  hideForm = false;
  mLoading = false;
  closeResult: string;
  private modalRef: NgbModalRef;

  constructor(config: NgbModalConfig, private modalService: NgbModal,
     private _formBuilder: FormBuilder,
     private _ContactoService: ContactoService,

    ) {     
    /*  this.contactForm = this.generarFormulario();*/
    }

  ngOnInit() {
    this.contactForm = this._formBuilder.group({
      id: '',
      nombres: ["", Validators.required],
      apellidos: ["", Validators.required],
      email: ["",[Validators.required, Validators.email]],
      tema: ["", Validators.required],
      mensaje:["", Validators.required,],
      created_at:''
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

  
  open(content) {
    this.modalRef = this.modalService.open(content, { size: 'lg' });
    this.modalRef.result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed`;
    });
  }


  onSave() {
    this.modalRef.close();
  }


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
  this.onSave();
}
}
