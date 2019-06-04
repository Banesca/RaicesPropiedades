import { Component, OnInit } from '@angular/core';
//import { ConfgFooterService } from '../../services/confg-footer.service';
import { AlertsService } from '../../services/alerts.service'

import { FormGroup, FormBuilder, Validators } from '@angular/forms'

@Component({
  selector: 'app-galeria-home',
  templateUrl: './galeria-home.component.html',
  styleUrls: ['./galeria-home.component.css']
})
export class GaleriaHomeComponent implements OnInit {
    myForm: FormGroup;
    
    constructor(
        private _alertService: AlertsService,
        private fb: FormBuilder
    ) {
        this.myForm = fb.group({
            titulo: ['',Validators.required],
            descripcion: ['',Validators.required],
        })


    }

    ngOnInit() {
     }
}