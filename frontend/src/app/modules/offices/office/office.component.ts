import { Component, OnInit } from '@angular/core';
import { SucursalesService, ContactoService } from "src/app/servicios/servicios.index";
import { ActivatedRoute } from '@angular/router';
import { ISucursal, IContacto } from 'src/app/servicios/interfaces.index';
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators
} from "@angular/forms";

@Component({
  selector: 'app-office',
  templateUrl: './office.component.html',
  styleUrls: ['./office.component.scss']
})
export class OfficeComponent implements OnInit {
  gSucursal: ISucursal;
  mContacto: IContacto;
  status: boolean;
  mId: string;
  contactForm: FormGroup;
  successMensaje = false;
  submitted = false;
  errorMensaje = false;
  hideForm = false;
  mLoading = false;


  constructor(private _SucursalesService: SucursalesService, private _ContactoService: ContactoService,
    private _ActivatedRoute: ActivatedRoute, private _formBuilder: FormBuilder ) {
    this.gSucursal;
    this._ActivatedRoute.params.subscribe(param => {
      this.mId = param['ruta'];
    });
  }

  ngOnInit() {
    this.GetSucursalUrl();
    this.contactForm = this._formBuilder.group({
      nombres: ["", Validators.required],
      email: ["",[Validators.required, Validators.email]],
      telefono: ["", Validators.required],
      mensaje:["", Validators.required,],
      created_at:''
  });
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


  GetSucursalUrl() {
    this._SucursalesService.getSucursal(this.mId).then(data => {
      this.gSucursal = data;
      console.log(this.gSucursal)
    })

    
      .catch(error => {
        console.log(this.gSucursal);
        console.log(this.mId)
      });
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
  }



}