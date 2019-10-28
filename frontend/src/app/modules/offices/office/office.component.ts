import { Component, OnInit } from "@angular/core";
import {
  SucursalesService,
  ContactoService,
  ArticuloService
} from "src/app/servicios/servicios.index";
import {
  ActivatedRoute,
  Router,
  Event,
  NavigationStart
} from "@angular/router";
import { ISucursal, IContacto } from "src/app/servicios/interfaces.index";
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators
} from "@angular/forms";

@Component({
  selector: "app-office",
  templateUrl: "./office.component.html",
  styleUrls: ["./office.component.scss"]
})
export class OfficeComponent implements OnInit {
  gSucursal: ISucursal;
  mContacto: IContacto;
  status: boolean;
  mId: string;
  contactForm: FormGroup;
  successMensaje = false;
  submitted = false;
  errorMensaje: any = null;
  hideForm = false;
  mLoading = false;
  searchClicked: boolean;

  constructor(
    private router: Router,
    private _SucursalesService: SucursalesService,
    private _ContactoService: ContactoService,
    public articuloService: ArticuloService,
    private _ActivatedRoute: ActivatedRoute,
    private _formBuilder: FormBuilder
  ) {}
  getParams() {
    this._ActivatedRoute.params.subscribe(param => {
      this.mId = param["ruta"];
      this.GetSucursalUrl();
    });
  }
  ngOnInit() {
    this.getParams();

    this.articuloService.search.subscribe(data => {
      this.searchClicked = data;
    });

    this.contactForm = this._formBuilder.group({
      nombre: [
        "",
        [
          Validators.required,
          Validators.pattern("^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ ]+$"),
          Validators.minLength(6)
        ]
      ],
      email: [
        "",
        [
          Validators.required,
          Validators.email,
          Validators.pattern("^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$")
        ]
      ],
      telefono: [
        "",
        [Validators.required, Validators.pattern("^[0-9]{10,12}$")]
      ],
      mensaje: ["", Validators.required]
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

    this.mContacto = this.contactForm.value as IContacto;
    this.guardar();
  }

  GetSucursalUrl() {
    this._SucursalesService
      .getSucursal(this.mId)
      .then(data => {
        this.gSucursal = data.suculsales;
      })
      .catch(error => {
        console.log(error);
      });
  }

  guardar() {
    this.mLoading = true;
    this.hideForm = true;
    this._ContactoService
      .NewContact(this.mContacto)
      .then(data => {
        console.log("data:", data);
        this.successMensaje = true;
        this.mLoading = false;
        this.submitted = false;
        this.contactForm.reset();
      })
      .catch(error => {
        console.log(error);
        this.errorMensaje = error;
        this.mLoading = false;
      });
  }
  reintentar() {
    this.errorMensaje = null;
    this.hideForm = false;
    this.submitted = false;
  }
  submittedClose() {
    this.successMensaje = false;
    this.hideForm = false;
    this.submitted = false;
  }
}
