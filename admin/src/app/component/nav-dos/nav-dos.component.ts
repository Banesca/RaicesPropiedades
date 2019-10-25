import { Component, OnInit } from '@angular/core';
import { ConfigHomeService } from '../../services/config-home.service';

declare var $:any;

@Component({
  selector: 'app-nav-dos',
  templateUrl: './nav-dos.component.html',
  styleUrls: ['./nav-dos.component.css']
})
export class NavDosComponent implements OnInit {
  
  c_h:any = {
    set_logo: null
  };

  constructor(
    private _configHomeService:ConfigHomeService
  ) { }

  ngOnInit() {
    this.getConfigHome()
  }

  getConfigHome(){
    this._configHomeService._getConfigHome().subscribe(
      (resp:any) => {

        if(resp){
          this.c_h.set_logo = resp.set_logo;
        }else{
          this.c_h.set_logo = null;
        }
        
        
      }
    )
  }

  buscar(){ 
    $("#nav-dos").css('display','none');
    $("#searchInput").css('display','block');
  }

  close_buscar(){
    $("#searchInput").css('display','none');
    $("#nav-dos").css('display','block');
  }
}
