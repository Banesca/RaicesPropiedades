import { Component, OnInit, } from '@angular/core';
import { ISuscripcion } from "src/app/servicios/interfaces.index";
import { SuscripcionService } from "src/app/servicios/servicios.index";
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators
} from "@angular/forms";
import { NgbModalConfig, NgbModal, NgbModalRef  } from '@ng-bootstrap/ng-bootstrap';


@Component({
  selector: 'app-suscrit',
  templateUrl: './suscrit.component.html',
  styleUrls: ['./suscrit.component.scss'],
  providers: [NgbModalConfig, NgbModal]
})


export class SuscritComponent implements OnInit {
  suscritForm: FormGroup;
  suscritFormEstado: string;
  mSuscripcion: ISuscripcion;
  hideModal = true;
  successMensaje = false;
  errorMensaje = false;
  submitted = false;
  mLoading = false;
  closeResult: string;
  private modalRef: NgbModalRef;

  constructor(config: NgbModalConfig, private modalService: NgbModal,
     private _formBuilder: FormBuilder,
     private _SuscripcionService: SuscripcionService,

    ) {     
    }

    ngOnInit() {
      this.suscritForm = this._formBuilder.group({
        email: ["",[Validators.required,Validators.email]],
    });
    } 


  get f() { return this.suscritForm.controls; }

  onSubmit() {
      this.submitted = true;

      if (this.suscritForm.invalid) {
          return;
      }
      this.mSuscripcion = this.suscritForm.value as ISuscripcion;
      this.guardar();
      
  }

  open(content) {
    this.modalRef = this.modalService.open(content);
    this.modalRef.result.then((result) => {
      this.closeResult = `Closed with: ${result}`;
    }, (reason) => {
      this.closeResult = `Dismissed`;
    });
  }


  onSave() {
    this.modalRef.close();
  }

  guardar() {
    this.mLoading = true;
    this.hideModal = false;
    this._SuscripcionService
    .New(this.mSuscripcion)
    .then(data => {
      this.mLoading = false;
      this.successMensaje = true;
      this.suscritForm.reset();
    })
    .catch(error => {
      this.errorMensaje = true;
      console.log(error)
      this.mLoading = false;
    });
}

submittedClose() {
  this.successMensaje = false;
  this.errorMensaje = false;
  this.submitted = false;
  this.onSave();
}

}



