import { Component, OnInit, EventEmitter, Output } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ConfgFooterService } from 'src/app/services/confg-footer.service';
import { AlertsService } from 'src/app/services/alerts.service';

@Component({
  selector: 'app-mails',
  templateUrl: './mails.component.html',
  styleUrls: ['./mails.component.css']
})
export class MailsComponent implements OnInit {
  @Output() addMail = new EventEmitter();

  myForm: FormGroup;
  constructor(
    private fb: FormBuilder,
    private configFooterService: ConfgFooterService,
    private as: AlertsService
  ) {
    this.myForm = fb.group({
      correo: ['',[Validators.required, Validators.pattern(new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))]]
    })
  }

  ngOnInit() {
  }
  add() {
    const data: FormData = new FormData();
    const val= this.myForm.value;
    data.append('email',val.correo)
    this.configFooterService._addMail(data).subscribe(resp => {
      

      if (resp) {
        this.as.msg('OK', 'Exito!', 'Email Agregado')
        this.addMail.emit(false);
      } else {
        this.as.msg('ERR', 'ERROR', 'error al añadir email')
      }
    }, error => {
      this.as.msg('ERR', 'ERROR', 'error al añadir email')
    })
  }
  close() {
    this.addMail.emit(false);
  }
}