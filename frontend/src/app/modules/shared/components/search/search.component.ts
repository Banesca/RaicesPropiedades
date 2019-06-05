import { Component, OnInit } from '@angular/core';
import { IComentario } from "../../../../servicios/interfaces.index";
import { ComentarioService } from "../../../../servicios/servicios.index";

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})

export class SearchComponent implements OnInit {
  mComentario: IComentario[];

  constructor(private _ComentariosService: ComentarioService) { 

    this.mComentario;
    this.getAll();
  }

  ngOnInit() {
  }

  getAll() {
    this._ComentariosService
      .All()
      .then(data => {
        this.mComentario = data.result;
        console.log(this.mComentario);
      })
      .catch(error => {
        console.log(this.mComentario);
      });
  }

}
