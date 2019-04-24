import { Component, OnInit } from '@angular/core';
import { ConfigColorService } from '../../services/config-color.service';

@Component({
  selector: 'app-nav-uno',
  templateUrl: './nav-uno.component.html',
  styleUrls: ['./nav-uno.component.css']
})
export class NavUnoComponent implements OnInit {

  colorUno:any =  null;

  constructor(
    private _color: ConfigColorService
  ) { }

  ngOnInit() {
    this._color._paletaColor().subscribe(
      (resp:any) => {
        if(resp){
          this.colorUno = resp.colorOscuro;
          console.log(this.colorUno)
        }        
      }
    ) 
  } 
}
