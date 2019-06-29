import { Component,Input, OnInit } from '@angular/core';
import { PublicacionesService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-search-blog',
  templateUrl: './search-blog.component.html',
  styleUrls: ['./search-blog.component.scss']
})
export class SearchBlogComponent implements OnInit {
  @Input() name;

  mContacto: any[];
  mCategorias: any;
  mLoading = false;

  constructor(
     private _PublicacionesService: PublicacionesService,

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




