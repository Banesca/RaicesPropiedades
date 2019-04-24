import { Component, OnInit } from '@angular/core';
import { ConfgFooterService } from '../../services/confg-footer.service';
import { AlertsService } from '../../services/alerts.service'

import { FormGroup, FormBuilder, Validators } from '@angular/forms'

declare var $;// para poder usar Jquery

@Component({
    selector: 'app-config-footer',
    templateUrl: './config-footer.component.html',
    styleUrls: ['./config-footer.component.css']
})
export class ConfigFooterComponent implements OnInit {
    myForm: FormGroup;
    mailList:any[]=[];
    addMail:boolean=false;
    constructor(
        private _confgFooterService: ConfgFooterService,
        private _alertService: AlertsService,
        private fb: FormBuilder
    ) {
        this.myForm = fb.group({
            quienesSomos: ['',Validators.required],
            direccion: ['',Validators.required],
            celular1: ['',Validators.required],
            celular2: ['',Validators.required],
            correo: ['',[Validators.required, Validators.pattern(new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))]],
            url_face: ['',Validators.required],
            url_intagram: ['',Validators.required],
            url_twitter: ['',Validators.required]

        })


    }

    ngOnInit() {
        this.getConfigFooter();
        this.getMails()
    }

    getConfigFooter() {
        this._confgFooterService._getConfigFooter().subscribe(
            (resp: any) => {
                if (resp) {
                    console.log(resp);
                     this.myForm.setValue({
                        quienesSomos: resp.configGeneral.quienesSomos,
                        direccion: resp.configGeneral.direccion,
                        celular1: resp.configGeneral.celular1,
                        celular2: resp.configGeneral.celular2,
                        correo: resp.configGeneral.correo,
                        url_face: resp.configGeneral.url_face,
                        url_intagram: resp.configGeneral.url_intagram,
                        url_twitter: resp.configGeneral.url_twitter
                    }) 
                }else{
                    this._alertService.msg('ERR','Error','Error al gargar datos')
                }
            },error=>{
                this._alertService.msg('ERR','Error','Error al gargar datos')

            }
        )
    }
    getMails() {
        this._confgFooterService._getMails().subscribe(
            (resp: any) => {
                if (resp) {
                    console.log(resp);
                    this.mailList= resp.mails;
                }else{
                    this._alertService.msg('ERR','Error','Error al gargar datos')
                }
            },error=>{
                this._alertService.msg('ERR','Error','Error al gargar datos')

            }
        )
    }


    adMails(){
        this.addMail=true;
    }




    upgradeCondigFooter() {
        console.log(this.myForm.value);
        const val = this.myForm.value
        const data: FormData = new FormData

        data.append('quienesSomos', val.quienesSomos);
        data.append('direccion', val.direccion);
        data.append('celular1', val.celular1);
        data.append('celular2', val.celular2);
        data.append('correo', val.correo);
        data.append('url_face', val.url_face);
        data.append('url_intagram', val.url_intagram);
        data.append('url_twitter', val.url_twitter);

        this._confgFooterService._upgradeConfigFooter(data).subscribe(
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
    addMailEvent(event){
        this.addMail=event;
        this.getMails();
    }


}