import { Component, OnInit } from '@angular/core';
import { IArticulo } from "../../../../servicios/interfaces.index";
import { ArticuloService } from "../../../../servicios/servicios.index";


@Component({
  selector: 'app-articles',
  templateUrl: './articles.component.html',
  styleUrls: ['./articles.component.scss']
})
export class ArticlesComponent implements OnInit {
  mArticulo: IArticulo[];
  selectedCategory: string = 'Prgramación';

  constructor(private _ArticuloService: ArticuloService) { 

    this.mArticulo;
    this.getAll();
  }

  ngOnInit() {
  }

  getAll() {
    this._ArticuloService
      .All()
        .then(data => {
        this.mArticulo = data.result;
        console.log(this.mArticulo);

      })
      .catch(error => {
        console.log(this.mArticulo);
      });
  }
  

}
/*import { Component, OnInit, Input } from '@angular/core';
import { IArticulo } from "../../../../servicios/interfaces.index";
import { ArticuloService } from "../../../../servicios/servicios.index";
import { ActivatedRoute } from '@angular/router';



@Component({
  selector: 'app-articles',
  templateUrl: './articles.component.html',
  styleUrls: ['./articles.component.scss']
})
export class ArticlesComponent implements OnInit {
  
  @Input() article: IArticulo;

  constructor(    private route: ActivatedRoute,
    private _ArticuloService: ArticuloService) { 
    this.article;
  }

  ngOnInit(): void {
    this.getArticle();
  }


  getArticle(): void {
    const id  = +this.route.snapshot.paramMap.get('id');
    this._ArticuloService.All(id)
      .subscribe(article => this.article = article);
  }


}*/