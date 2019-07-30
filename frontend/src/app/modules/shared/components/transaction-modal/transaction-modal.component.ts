import { Component, Input, ElementRef, OnInit } from '@angular/core';
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
  selector: "app-transaction-modal",
  templateUrl: "./transaction-modal.component.html",
  styleUrls: ["./transaction-modal.component.scss"]
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
    private _ContactoService: ContactoService // private cd: ChangeDetectorRef,
  ) {
    this.getAll();
  }

  ngOnInit() {
    this.contactForm = this._formBuilder.group({
      nombre_apellido: ["", Validators.required],
      email: ["", [Validators.required, Validators.email]],
      telefono: ["", [Validators.required, Validators.pattern(/[^.,]/)]],
      fk_tipoPropiedad: ["", Validators.required],
      titulo: ["", [Validators.required, Validators.pattern(/[a-z]/)]],
      descripcion: ["", Validators.required],
      imagen_1: [null, Validators.required],
      imagen_2: [null, Validators.required]
    });
  }

  get f() {
    return this.contactForm.controls;
  }

  onSubmit() {
    this.submitted = true;
    console.log(this.contactForm);
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
      })
      .catch(error => {
        console.log(error);
      });
  }

  guardar() {
    this.mLoading = true;
    this.hideForm = true;
    console.log(this.mContacto);
    this._ContactoService
      .New(this.mContacto)
      .then(data => {
        console.log(data);
        this.successMensaje = true;
        this.mLoading = false;
        // this.contactForm.reset();
      })
      .catch(error => {
        console.log(error);
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
  onFileChange(event, image) {
    const reader = new FileReader();
    
    if (event.target.files && event.target.files.length > 0) {
      let file = event.target.files[0];
      reader.readAsDataURL(file);
      reader.onload = () => {
        
        if (image === "imagen_1"){
          this.contactForm
            .get("imagen_1")
            .patchValue(reader.result);
        }
        if (image === "imagen_2") {
          this.contactForm
            .get("imagen_2")
            .patchValue(reader.result);
        }

        // need to run CD since file load runs outside of zone
        // this.cd.markForCheck();
      };
    }
  }
}



