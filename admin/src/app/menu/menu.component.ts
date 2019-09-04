import { Component, OnInit } from '@angular/core';
import { AlertsService } from '../services/alerts.service';
import { AuthGuard } from '../services/auth.guard';

import { Router} from '@angular/router'
declare var $
@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {
  
  dataUser:any ={ userName: localStorage.getItem('userName'), userEmail:localStorage.getItem('userEmail') } 
   hideUser:boolean=false;
  constructor(
    private alertS: AlertsService,
    private route:Router,
    private auth:AuthGuard
  ) { }

  ngOnInit() {

    this.auth.canReload.subscribe(val=>{
      if(val){
        this.auth.sourceReload.next(false);
        /* location.reload(); */
        setTimeout(() => {
            this.route.navigate(['']);
            console.log('menu.component.ts ngOnInit');
        }, 250);
      }
    })
   
    this.alertS.toggleMenu.subscribe(val=>{
      if(val){
        this.hideUser = this.hideUser?false:true;
        this.alertS.sourceToggleMenu.next(false);
      }
    })
  }
 toggle(){

  this.hideUser= this.hideUser? false: true;
  }

}
