import { Component, OnInit } from '@angular/core';
import { ArticuloService } from "../../../../../servicios/servicios.index";
import { ActivatedRoute } from '@angular/router';
import { IArticulo } from 'src/app/servicios/interfaces.index';


@Component({
  selector: 'app-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.scss']
})
export class LayoutComponent implements OnInit  {
  gArticulo: IArticulo;
  status: boolean;
  mId: string;


  constructor(private _ArticuloService: ArticuloService,
    private _ActivatedRoute: ActivatedRoute, ) {
    this.gArticulo;
    this._ActivatedRoute.params.subscribe(param => {
      this.mId = param['id'];
    });
  }

  ngOnInit() {
    this.GetArticleUrl();
  }

  GetArticleUrl() {
    this._ArticuloService.getArticle(this.mId).then(data => {
      this.gArticulo = data;
      console.log(this.gArticulo)
    })

    
      .catch(error => {
        console.log(this.gArticulo);
        console.log(this.mId)
      });
  }





}