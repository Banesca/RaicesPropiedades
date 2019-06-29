import { Component } from '@angular/core';
import { GaleriaHomeService } from "src/app/servicios/servicios.index";
import { IGaleria } from "src/app/servicios/interfaces.index";


@Component({
  selector: 'app-propiertys-carousel',
  templateUrl: './propiertys-carousel.component.html',
  styleUrls: ['./propiertys-carousel.component.scss']
})
export class PropiertysCarouselComponent {
  mCategorias: IGaleria[];
 // images = [1, 2, 3, 4].map(() => `https://picsum.photos/1920/500?random&t=${Math.random()}`);

  constructor(private _GaleriaHomeService: GaleriaHomeService) {
    // customize default values of carousels used by this component tree
    this.getAll()
  }

  getAll() {
    this._GaleriaHomeService
      .All()
        .then(res => {
       this.mCategorias = res.data

      })
      .catch(error => {
        console.log(error);
      });
  }
}