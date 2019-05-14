import { Component, OnInit } from '@angular/core';
import { ICategoria } from "../../../../servicios/interfaces.index";
import { CategoriaService } from "../../../../servicios/servicios.index";


@Component({
  selector: 'app-search-blog',
  templateUrl: './search-blog.component.html',
  styleUrls: ['./search-blog.component.scss']
})
export class SearchBlogComponent implements OnInit {
  mCategoria: ICategoria[];

  constructor(private _CategoriasService: CategoriaService) { 

    this.mCategoria;
    this.getAll();
  }

  ngOnInit() {
  }

  getAll() {
    this._CategoriasService
      .All()
      .then(data => {
        this.mCategoria = data.result;
        console.log(this.mCategoria);
      })
      .catch(error => {
        console.log(this.mCategoria);
      });
  }

}
