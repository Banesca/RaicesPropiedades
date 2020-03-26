import {
  Component,
  OnInit
} from '@angular/core';
import { GaleriaHomeService } from 'src/app/servicios/servicios.index';
@Component({
  selector: 'app-carousel',
  templateUrl: './carousel.component.html',
  styleUrls: ['./carousel.component.scss']
})
export class CarouselComponent implements OnInit {
  ngOnInit() {
    this.getGaleria();
  }

  galeria: any;
  slideConfig:any;


  constructor(
    private _GaleriaHomeService: GaleriaHomeService
  ) {

    this.slideConfig = {"slidesToShow": 8, 
    "slidesToScroll": 1,
    "nextArrow":"<div class='nav-btn next-slide'></div>",
    "prevArrow":"<div class='nav-btn prev-slide'></div>",
    "dots":true,
    "infinite": false};
  }


  getGaleria() {
    this._GaleriaHomeService
      .AllCliente()
      .then(res => {
        this.galeria = res.banner;
      })
      .catch(error => {
        console.log(error);
      });
  }



}