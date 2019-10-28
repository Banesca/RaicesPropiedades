import { Component, Input, ElementRef, OnInit } from "@angular/core";
import { IContacto, ICategoria } from "src/app/servicios/interfaces.index";
import { ContactoService } from "src/app/servicios/servicios.index";
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators
} from "@angular/forms";
import { NgbActiveModal, NgbModalRef } from "@ng-bootstrap/ng-bootstrap";

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
  image1={upload:false,format:false};
  image2={upload:false,format:false};

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
      nombre_apellido: [
        "",
        [Validators.required, Validators.pattern("^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ ]+$")]
      ],
      email: ["", [Validators.required, Validators.email]],
      telefono: [
        "",
        [Validators.required, Validators.pattern("^[0-9]{10,12}$")]
      ],
      fk_tipoPropiedad: ["", Validators.required],
      direccion: [
        "",
        [Validators.required, Validators.pattern("[ña-zA-Z _]*")]
      ],
      descripcion: ["", Validators.required],
      imagen_1: [null],
      imagen_2: [null]
    });
  }

  get f() {
    return this.contactForm.controls;
  }

  onSubmit() {
    this.submitted = true;
    if (this.contactForm.invalid) {
      return;
    }
    this.mContacto = this.contactForm.value;
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
  getFormData() {
    const formData = new FormData();
    formData.append("nombre_apellido", this.mContacto.nombre_apellido);
    formData.append("email", this.mContacto.email);
    formData.append("telefono", this.mContacto.telefono);
    formData.append(
      "fk_tipoPropiedad",
      this.contactForm.get("fk_tipoPropiedad").value
    );
    formData.append("direccion", this.mContacto.direccion);
    formData.append("descripcion", this.mContacto.descripcion);
    if(this.contactForm.get("imagen_1").value){
      formData.append("imagen_1", this.contactForm.get("imagen_1").value);
    }
    if (this.contactForm.get("imagen_2").value) {
      formData.append("imagen_2", this.contactForm.get("imagen_2").value);
    }
    return formData;
  }
  guardar() {
    this.mLoading = true;
    this.hideForm = true;
    // registar tasacion
    this._ContactoService
      .New(this.getFormData())
      .then(data => {
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
    if (event.target.files && event.target.files.length > 0) {
      let file = event.target.files[0];
        if (image === "imagen_1") {
          if ((/\.(jpg|jpeg|bmp|gif|png)$/i).test(file.name) === false) {
            this.image1.format=true;
            this.image1.upload = false;
          } else {
            this.contactForm.get("imagen_1").setValue(file);
            this.image1.upload = true;
            this.image1.format = false;
          }
        }
        if (image === "imagen_2") {
          if ((/\.(jpg|jpeg|bmp|gif|png)$/i).test(file.name) === false) {
            this.image2.format = true;
            this.image2.upload = false;
          } else {
            this.contactForm.get("imagen_2").setValue(file);
            this.image2.upload = true;
            this.image1.format = false;
          }
        }
      }
    }
}
