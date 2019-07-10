import { Component,Input, OnInit } from '@angular/core';
import { PublicacionesService } from "src/app/servicios/servicios.index";
import { ArticuloService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-search-blog',
  templateUrl: './search-blog.component.html',
  styleUrls: ['./search-blog.component.scss']
})
export class SearchBlogComponent implements OnInit {
  @Input() name;
  public baseUrl: string = 'detail/'

  mContacto: any[];
  mCategorias: any;
  mLoading = false;
  filter;

  constructor(
     private _PublicacionesService: PublicacionesService,
     public _ArticuloService: ArticuloService

    ) {     
      this.getAll();
    }

  ngOnInit() {
  }
      getAll() {
        this._PublicacionesService
          .All()
            .then(data => {
            this.mCategorias = data;
            console.log(this.mCategorias);
    
          })
          .catch(error => {
            console.log(this.mCategorias);
          });
      }
}




