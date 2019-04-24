import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { RegistroService } from '../../services/registro.service';
import { AlertsService } from '../../services/alerts.service';
import { Router, ActivatedRoute } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

declare var $: any;

@Component({
  selector: 'app-registro',
  templateUrl: './registro.component.html',
  styleUrls: ['./registro.component.css']
})
export class RegistroComponent implements OnInit {
  @Output() cambio: EventEmitter<any> = new EventEmitter();

  rows: any;
  banderaTipo: boolean = false;
  form: FormGroup;

  constructor(
    private _registroService: RegistroService,
    private route: ActivatedRoute,
    private router: Router,
    private _alertService: AlertsService,
    private fb: FormBuilder
  ) { }

  ngOnInit() {
    this.form = this.fb.group({
      // Email_Cliente: [''],
      nameUser: [''],
      nombreApellidoCliente: [''],
      numeroDocumento: [''],
      domicilio: [''],
      codigoPostal: [''],
      localidad: [''],
      provincia: [''],
      email: [''],
      telefono: [''],
      idCliente: ['']
    });
  }

  onSearchChange(searchValue: string) {
    console.log("searchValue",searchValue);
    if (searchValue) {
      this._registroService.verificarRegistro(this.form.value).subscribe(
        (resp?: any) => {
          console.log("respuesta del verifica", resp.body);
          if (resp.body != null) {
            console.log("entro en el primer if modificar");
            this.banderaTipo = true;
            this.rows = resp.body[0];
            console.log(this.rows);
            this.form.patchValue(this.rows);
            console.log("this.form",this.form.value);

          } else {
            console.log("entro en el primer else guardar");
            this.banderaTipo = false;
          }
        },
        (error: any) => {
          console.log(error);
          if (error.status == '422') {
            this._alertService.msg("ERR", 'Hubo un Error 422');
          }
          if (error.status == '401') {
            this._alertService.msg("ERR", 'Hubo un Error 401');
          }
          if (error.status == '500') {
            this._alertService.msg("ERR", 'Hubo un Error 500');
          }
        }
      )
    }

  }

  ingresarRegistro(): void {
    console.log(this.form);
    this._registroService.ingresarRegistro(this.form.value).subscribe(
      (resp: any) => {
        console.log("Nuevo registro resp",resp);
        this._alertService.msg("OK", 'Registro Agregado Exitosamente');
      },
      (error: any) => {
        console.log("Error registro error",error);
        this._alertService.msg("ERR", 'Hubo un Error');
      });
  }

  modificarRegistro(): void {
    console.log(this.form);
    this._registroService.modificarRegistro(this.form.value).subscribe(
      (resp: any) => {
        console.log("Modificado registro",resp);
        this._alertService.msg("OK", 'Registro Modificado Exitosamente');
      },
      (error: any) => {
        console.log("Error registro",error);
        this._alertService.msg("ERR", 'Hubo un Error');
      });
  }

  change() {
    this.cambio.emit()
  }


}
