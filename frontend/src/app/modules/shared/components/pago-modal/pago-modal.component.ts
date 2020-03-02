import { Component, Input, ElementRef, OnInit } from "@angular/core";
import { IContacto, ICategoria, IPago } from "src/app/servicios/interfaces.index";
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
  selector: 'app-pago-modal',
  templateUrl: './pago-modal.component.html',
  styleUrls: ['./pago-modal.component.scss']
})
export class PagoModalComponent implements OnInit {

  @Input() name;

  mContacto: IPago;
  mCategorias: ICategoria[];
  contactForm: FormGroup;
  contactFormEstado: string;
  successMensaje = false;
  submitted = false;
  errorMensaje = false;
  hideForm = false;
  mLoading = false;
  closeResult: string;
  dir_adjunto={upload:false,format:false};

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
      nombre: [
        "",
        [Validators.required, Validators.pattern("^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ ]+$")]
      ],
      n_transferencia_deposito: [
        "",
        [Validators.required, Validators.pattern("^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ ]+$")]
      ],
      detalle: ["", Validators.required],
      dir_adjunto: [null]
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
    formData.append("nombre", this.mContacto.nombre);
    formData.append("n_transferencia_deposito", this.mContacto.n_transferencia_deposito);
    formData.append("detalle", this.mContacto.detalle);
    if(this.contactForm.get("dir_adjunto").value){
      formData.append("dir_adjunto", this.contactForm.get("dir_adjunto").value);
    }
   
    return formData;
  }
  guardar() {
    this.mLoading = true;
    this.hideForm = true;
    // registar tasacion
    this._ContactoService
      .NewPayment(this.getFormData())
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
        if (image === "dir_adjunto") {
          if ((/\.(jpg|jpeg|bmp|gif|png)$/i).test(file.name) === false) {
            this.dir_adjunto.format=true;
            this.dir_adjunto.upload = false;
          } else {
            this.contactForm.get("dir_adjunto").setValue(file);
            this.dir_adjunto.upload = true;
            this.dir_adjunto.format = false;
          }
        }
       
      }
    }
}
