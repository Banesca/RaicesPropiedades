import { Component, OnInit } from '@angular/core';
import { ConfgFooterService } from '../../services/confg-footer.service'

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent implements OnInit {

  footer_data:any = {
    direccion: null, 
    nro_contacto: null, 
    email: null
  };
  
  constructor( private _configFooterService:ConfgFooterService) { }

  ngOnInit() {
    this.getConfigFooter();
  }

  getConfigFooter(){
    this._configFooterService._getConfigFooter().subscribe(
      resp => {
        if(resp){
          this.footer_data = resp;
        }
      }
    );
  }
}
