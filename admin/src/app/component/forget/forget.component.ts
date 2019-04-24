import { Component, OnInit } from '@angular/core';
import { ForgetService } from '../../services/forget.service';
import { AlertsService } from '../../services/alerts.service';
import { Validators, FormBuilder, FormGroup } from '@angular/forms'

declare var $;

@Component({
  selector: 'app-forget',
  templateUrl: './forget.component.html',
  styleUrls: ['./forget.component.css']
})
export class ForgetComponent implements OnInit {

  myForm: FormGroup;  
  inPromise: boolean;
  showMsj: boolean;

  constructor(
    private _forgetService:ForgetService,
    private _alertsService:AlertsService,
    private fb:FormBuilder
  ) { 
    this.myForm = this.fb.group({
      'email' : ['',Validators.email]
    })
  }

  ngOnInit() {
  }

  newForget(){  
    this.inPromise = true;  
    this._forgetService._newForget({email:this.myForm.value.email}).subscribe(
      (resp:any) => {
        this.inPromise = false;
        this._alertsService.msg('OK',resp.msj);
        this.showMsj = true;
        $('#forgetModal').modal('hide'); //quitamos esto para mostrar el mensaje del spam
      },
      error => {      
        this.inPromise = false;
        if(error.error.errors.email != null){
          this._alertsService.msg('ERR',error.error.errors.email);  
        }
        this._alertsService.msg('ERR','algo salio mal');
      }
    )      
  }

}
