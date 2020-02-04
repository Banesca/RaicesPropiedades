import { Component, OnInit } from "@angular/core";
import { ConfgFooterService } from "../../services/confg-footer.service";
import { AlertsService } from "../../services/alerts.service";

import { FormGroup, FormBuilder, Validators } from "@angular/forms";

declare var $; // para poder usar Jquery

@Component({
  selector: "app-config-footer",
  templateUrl: "./config-footer.component.html",
  styleUrls: ["./config-footer.component.css"]
})
export class ConfigFooterComponent implements OnInit {
  myForm: FormGroup;
  mailList: any[] = [];
  addMail: boolean = false;
  submitted: boolean = false;
  constructor(
    private _confgFooterService: ConfgFooterService,
    private _alertService: AlertsService,
    private fb: FormBuilder
  ) {}
  get f() {
    return this.myForm.controls;
  }
  ngOnInit() {
    this.getConfigFooter();
    this.getMails();
    this.myForm = this.fb.group({
      quienesSomos: ["", [Validators.required, Validators.minLength(10)]],
      direccion: ["", [Validators.required, Validators.minLength(10)]],
      celular1: [
        null,
        [Validators.required, Validators.pattern("^[0-9]{10,12}$")]
      ],
      celular2: [
        null,
        [Validators.required, Validators.pattern("^[0-9]{10,12}$")]
      ],
      correo: [
        "",
        [
          Validators.required,
          Validators.pattern(
            new RegExp(
              /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            )
          )
        ]
      ],
      url_face: ["", Validators.required],
      url_intagram: ["", Validators.required],
      //url_twitter: ["", Validators.required]
    });
  }

  getConfigFooter() {
    this._confgFooterService._getConfigFooter().subscribe(
      (resp: any) => {
        if (resp.configGeneral) {
          this.myForm.setValue({
            quienesSomos: resp.configGeneral.quienesSomos
              ? resp.configGeneral.quienesSomos
              : "",
            direccion: resp.configGeneral.direccion
              ? resp.configGeneral.direccion
              : "",
            celular1: resp.configGeneral.celular1
              ? resp.configGeneral.celular1
              : null,
            celular2: resp.configGeneral.celular2
              ? resp.configGeneral.celular2
              : null,
            correo: resp.configGeneral.correo ? resp.configGeneral.correo : "",
            url_face: resp.configGeneral.url_face
              ? resp.configGeneral.url_face
              : "",
            url_intagram: resp.configGeneral.url_intagram
              ? resp.configGeneral.url_intagram
              : "",
            /*url_twitter: resp.configGeneral.url_twitter
              ? resp.configGeneral.url_twitter
              : ""*/
          });
        }
      },
      error => {
        console.log(error);
        this._alertService.msg("ERR", "Error", "Error al cargar datos");
      }
    );
  }
  getMails() {
    this._confgFooterService._getMails().subscribe(
      (resp: any) => {
        if (resp) {
          this.mailList = resp.mails;
        } else {
          this._alertService.msg("ERR", "Error", "Error al cargar datos");
        }
      },
      error => {
        console.log(error);
        this._alertService.msg("ERR", "Error", "Error al cargar datos");
      }
    );
  }

  adMails() {
    this.addMail = true;
  }

  eliminar(pKey: any) {
    if (confirm("¿Está seguro de que quiere eliminar este email?")) {
      this._confgFooterService
        .eliminarCategoria(pKey)
        .then(data => {
          if (data) {
            this._alertService.msg("OK", "¡Éxito!", "Email eliminado");
            this.getMails();
          } else {
            this._alertService.msg("ERR", "ERROR", "error al eliminar email");
          }
        })
        .catch(error => {
          console.log(error);
        });
    }
  }

  onSubmit() {
    this.submitted = true;
    if (this.myForm.invalid) {
      return;
    }

    this.upgradeCondigFooter();
  }

  upgradeCondigFooter() {
    const val = this.myForm.value;

    this._confgFooterService._upgradeConfigFooter(val).subscribe(
      (resp: any) => {
        this.getConfigFooter();
        this._alertService.msg("OK", resp.msj);
      },
      error => {
        this._alertService.msg("ERR", error);

        if (error.error.errors.direccion != null) {
          this._alertService.msg("ERR", error.error.errors.direccion);
        }

        if (error.error.errors.nroContacto != null) {
          this._alertService.msg("ERR", error.error.errors.nroContacto);
        }

        if (error.error.errors.mail1 != null) {
          this._alertService.msg("ERR", error.error.errors.mail1);
        }

        if (error.error.errors.latitud != null) {
          this._alertService.msg("ERR", error.error.errors.latitud);
        }

        if (error.error.errors.longitud != null) {
          this._alertService.msg("ERR", error.error.errors.longitud);
        }

        if (error.error.errors.whatsApp1 != null) {
          this._alertService.msg("ERR", error.error.errors.whatsApp1);
        }

        if (error.error.errors.horarios != null) {
          this._alertService.msg("ERR", error.error.errors.horarios);
        }

        if (error.error.errors.subtes != null) {
          this._alertService.msg("ERR", error.error.errors.subtes);
        }

        if (error.error.errors.colectivos != null) {
          this._alertService.msg("ERR", error.error.errors.colectivos);
        }

        if (error.error.errors.avenidas != null) {
          this._alertService.msg("ERR", error.error.errors.avenidas);
        }

        if (error.error.errors.listaPrecio != null) {
          this._alertService.msg("ERR", error.error.errors.listaPrecio);
        }

        if (error.error.errors.desde != null) {
          this._alertService.msg("ERR", error.error.errors.desde);
        }

        if (error.error.errors.hasta != null) {
          this._alertService.msg("ERR", error.error.errors.listaPrecio);
        }

        if (error.error.errors.url_mercado_libre != null) {
          this._alertService.msg("ERR", error.error.errors.url_mercado_libre);
        }
      }
    );
  }
  addMailEvent(event) {
    this.addMail = event;
    this.getMails();
  }
}
