import { Component, OnInit } from '@angular/core';
import { LoginService } from '../../services/login.service';
import { AlertsService } from '../../services/alerts.service';
import { Router, ActivatedRoute } from '@angular/router';

declare var $:any;

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  
  email:any; password:any; 
  errors:any;
  constructor(
    private _loginService:LoginService,
    private route: ActivatedRoute,
    private router: Router,
    private _alertService: AlertsService
  ) { }

  ngOnInit() {
  }

  ingresarLogin( ):void{
  
    const data:any = {email: this.email, password : this.password}; 
    
    this._loginService.ingresarLogin(data).subscribe(
      (resp:any) =>{
        console.log(resp)
        // localStorage.setItem('access_token',resp.access_token)
        // $("#loginModal").modal('hide');
        // location.href="/home";
      },
      (error:any) => {
        console.log(error);
        if(error.status == '422' ){
          this._alertService.listError(error.error) // LIsta de errores
        }

        if(error.status == '401'){
          this._alertService.Erros(error.error.msj) // no autorizado | cuando hay error 
        }
        
      }
    );   

   
  }
}
