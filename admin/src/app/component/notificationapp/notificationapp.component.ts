import { Component, OnInit, ViewChild } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { SeccionAppService } from 'src/app/services/seccion-app.service';
import { AlertsService } from 'src/app/services/alerts.service';
import { NotificacionesService } from 'src/app/services/notificaciones.service';

declare var $: any;
@Component({
  selector: 'app-notificationapp',
  templateUrl: './notificationapp.component.html',
  styleUrls: ['./notificationapp.component.css']
})
export class NotificationappComponent implements OnInit {

  @ViewChild('table') table;
  rows: any;
  columns: any = [
    { prop: 'titleNotification'},
    { prop: 'descriptionNotification'},
    { prop: 'fk_idSecctionApp'}
  ]
  notifications: any[];
  newNotificacionForm : FormGroup;
  inPromise: boolean;
  editNotificacionForm:FormGroup
  limit: number;
  secciones: any[];
  constructor(
    private fb: FormBuilder, 
    private seccionAppService: SeccionAppService,
    private as: AlertsService,
    private notificationService: NotificacionesService
  ) { 
    this.limit = 5;
    this.newNotificacionForm = this.fb.group({
      titulo: ['', Validators.required],
      descripcion: ['', Validators.required],
      seccionApp: ['', Validators.required]
    })
    this.editNotificacionForm = this.fb.group({
      id:[''],
      titulo: ['', Validators.required],
      descripcion: ['', Validators.required],
      seccionApp: ['', Validators.required]
    })
  }

  ngOnInit() {
    this.seccionAppService.getAll().subscribe((resp) => {
      if(resp.ok && resp.status === 202){
        this.secciones = resp.body.users;
        this.listNotifications();
      }else{
        console.error(resp);
        this.as.msg('ERR','Ha ocurrido un error interno');
      }
    }, error => {
      console.log(error);
      this.as.msg('ERR','Ha ocurrido un error interno');
    })
  }
  
  listNotifications(){
    this.notificationService.getAll().subscribe((resp) => {
      if(resp.ok && resp.status === 201){
        this.notifications = resp.body.notifi
        this.rows = [...this.notifications];
      }else{
        this.as.msg('ERR','Ha ocurrido un error interno');
        console.error(resp)
      }
    }, error => {
      this.as.msg('ERR','Ha ocurrido un error interno');
      console.error(error);
    })
  }
  updateFilter(event){
    const val = event.target.value.toLowerCase();

    const temp = this.notifications.filter(function(d) {
      return (d.titleNotification.toLowerCase().indexOf(val) !== -1 || !val) 
      || (d.descriptionNotification.toLowerCase().indexOf(val) !== -1 || !val);
    });

    this.rows = temp;
    this.table.offset = 0;//Requerido*/
  }

  getSeccionAppById(id): {idSecctionApp: number, tag: string}{
    return this.secciones.filter((value) => value.idSecctionApp === id)[0] as any;
  }

  save(){
    const value = this.newNotificacionForm.value;
    this.inPromise = true;
    this.notificationService.persist(
      {
        titleNotification: value.titulo,
        descriptionNotification: value.descripcion,
        fk_idSecctionApp: value.seccionApp
      })
      .subscribe((resp)=> {
      if(resp.ok && resp.status === 201){
        this.as.msg('OK', '¡Éxito!', 'Notificación enviada');
        this.newNotificacionForm.reset();
        $('#nuevo').modal('hide');
      }else{
        this.as.msg('ERR','Ha ocurrido un error interno');
        console.error(resp);
      }
      this.listNotifications();
      this.inPromise = false;
    }, error => {
      console.error(error);
      this.inPromise = false;
      this.as.msg('ERR','Ha ocurrido un error interno');      
    })

  }
  set(row:any){
   /*  this.cuponToUpdate = row; */
     this.editNotificacionForm.patchValue({
      titulo: row.titleNotification,
      seccionApp:row.fk_idSecctionApp,
      descripcion: row.descriptionNotification,
      id:row.idNotification,
 
    }) 
  }
  update(){
    const value = this.editNotificacionForm.value;


    let toSend = new FormData();
  
    
 
    toSend.append('titleNorificacion', value.titulo);
    toSend.append('descriptionNotificacion', value.descripcion);
    toSend.append('fk_idSectionApp', value.fechaExp);


    this.inPromise = true; 
    this.notificationService.update(value.id, {
      titleNotification: value.titulo,
      descriptionNotification: value.descripcion,
      fk_idSecctionApp: value.seccionApp
    }).subscribe(resp => {
      if(resp.ok ){
        this.inPromise = false;
        $('#modificarNoti').modal('hide');
        this.as.msg('OK', '¡Éxito!', 'Se ha actualizado la Notificacion');
        this.listNotifications();
      }else{
        console.error(resp);
        this.inPromise = false;
        this.as.msg('ERR', 'Error', 'Ha ocurrido un error interno');
      }
     // this.listNotifications();
    }, error => {
      console.error(error);
      this.inPromise = false;
      this.as.msg("ERR", "Error", 'Ha ocurrido un error interno');
    }); 
  }
  delete(){
    this.inPromise = true;

     this.notificationService.delete(this.editNotificacionForm.value.id).subscribe((resp) => {
      if(resp.ok){
        $('#eliminar').modal('hide');
        this.as.msg('OK', '¡Éxito!', 'Se ha eliminado la Notificacion');
        this.listNotifications();
      }else{
        console.error(resp);
        this.as.msg("ERR", "Error", 'Ha ocurrido un error interno');
      }
      this.inPromise = false;

    }, error => {
      console.error(error);
      this.inPromise = false;
      this.as.msg("ERR", "Error", 'Ha ocurrido un error interno');
    }); 
  
  }

}
