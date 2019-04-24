import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms'
import { AlertsService } from '../../services/alerts.service'
import { SuscripcionService } from  '../../services/suscripcion.service'
import { StatusSistemaService } from '../../services/status-sistema.service'

declare var $;

@Component({
  selector: 'app-suscripcion',
  templateUrl: './suscripcion.component.html',
  styleUrls: ['./suscripcion.component.css']
})
export class SuscripcionComponent implements OnInit {

  list_suscrito:any[] = []; 
  list_suscrito_canceladas:any[] = [];
  
  idDelete:number;

  motivo: FormGroup; list_status:any; 
  
  constructor(
    private sus:SuscripcionService,
    private al: AlertsService,
    private fb: FormBuilder,
    private statusSistemaService : StatusSistemaService
    ) { 
    this.motivo = this.fb.group({
      'motivoDeCancelacion' : ['',Validators.required]
    })
  }

  ngOnInit() {
    this.getS();
    this.getSC();
    this.getStatusSistema();

    $("#nav-sus").click(function(){        
      $("#nav-sus-ca").removeClass('active');      
      $("#nav-sus").addClass('active');
      
      $("#list-sus-ca").css('display','none')
      $("#list-sus").css('display','block')
    })

    $("#nav-sus-ca").click(function(){
      $("#nav-sus").removeClass('active');      
      $("#nav-sus-ca").addClass('active');
      
      $("#list-sus").css('display','none')
      $("#list-sus-ca").css('display','block')
    })

  }

  getS(){
    this.sus._getSuscripciones().subscribe(
      (resp:any) => {
        this.list_suscrito = resp.suscripcion
      }
    )
  }

  getSC(){
    this.sus._getSuscripcionesCanceladas().subscribe(
      (resp:any) => {
        this.list_suscrito_canceladas = resp.suscripcion
      }
    )
  }

  getStatusSistema(){
    this.statusSistemaService._getStatusSistema().subscribe(
      resp => {
        this.list_status = resp
      }
    )
  }

  changeStatus(event,idSuscr){
    this.sus._changeStatus(idSuscr,event.target.value).subscribe(
      (resp:any) =>{
        this.al.msg('OK',resp.msj)        
      },
      error => {
        this.al.msg('ERR','Algo salio mal')    
      }
    )
  }

  deleteSPregunta(id:number){
    this.idDelete = id;
    $("#exampleModal").modal('show');
  }

  deleteS(){
    const data:any = { id: this.idDelete, motivoDeCancelacion: this.motivo.value.motivoDeCancelacion } 
    this.sus._deleteSuscripciones(data).subscribe(
      (resp:any) => {
        
        this.getS();
        this.getSC();
        $("#exampleModal").modal('hide');
        this.al.msg('OK',resp.msj)
        this.motivo.get('motivoDeCancelacion').reset();
      },
      error => {
        this.al.msg('ERR',error.error.errors)
      }
    )
  }

}
