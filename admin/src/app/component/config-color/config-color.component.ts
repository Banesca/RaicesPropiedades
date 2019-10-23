import {Component, OnInit} from "@angular/core";
import {ConfigColorService} from "../../services/config-color.service";
import {AlertsService} from "../../services/alerts.service";
import { FormBuilder, Validators, FormGroup } from '@angular/forms'

@Component({
    selector: 'app-config-color',
    templateUrl: './config-color.component.html',
    styleUrls: ['./config-color.component.css']
})
export class ConfigColorComponent implements OnInit {

    colores: any = {colorOscuro: null, colorMedio: null, colorClaro: null};
    form: any = {colorOscuro: null, colorMedio: null, colorClaro: null}
    inPromise: boolean;
    myForm : FormGroup;

    constructor(private _coloresServices: ConfigColorService,
                private _alertServicices: AlertsService,
                private fb:FormBuilder,
                ) {
        this.myForm = this.fb.group({
            'colorOscuro'   : ['',[Validators.required, Validators.minLength(7)]],
            'colorMedio'    : ['',[Validators.required, Validators.minLength(7)]],
            'colorClaro'    : ['',[Validators.required, Validators.minLength(7)]],
        })
    }

    ngOnInit() {
        this.getColores();
    }

    getColores() {
        this._coloresServices._getColor().subscribe(
            (resp:any) => {   
                this.colores.idColor    = resp.idColor;             
                this.colores.colorOscuro = resp.colorOscuro;
                this.colores.colorMedio = resp.colorMedio;
                this.colores.colorClaro = resp.colorClaro; 
            }
        )
    }

    addColores() {
        const val = this.myForm.value;
        this.inPromise = true;        
        this._coloresServices.addColores(val).subscribe(
            resp => {
                this.inPromise = false;
                this.getColores();                    
                this.form = {colorOscuro: null, colorMedio: null, colorClaro: null}
                this._alertServicices.msg('OK', '¡Éxito!', 'Se guardo correctamente');
            },
            error => {
                this.inPromise = false;
                this._alertServicices.msg("ERR", "Error", `Error: ${error.status} - ${error.statusText}`);
            }
        )
    }

    eliminarColor(id) {
        this.inPromise = true;
        this._coloresServices.deleteColores(id).subscribe(
            resp => {
                this.inPromise = false;
                this._alertServicices.msg('OK', '¡Éxito!', 'Se actualizo correctamente');
                this.getColores();
            },
            error => {
                this.inPromise = false;
                this._alertServicices.msg("ERR", "Error", `Error: ${error.status} - ${error.statusText}`);
            }
        )
    }

}
