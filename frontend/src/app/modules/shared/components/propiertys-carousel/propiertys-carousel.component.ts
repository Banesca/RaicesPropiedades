import { Component } from '@angular/core';
import { NgbCarouselConfig } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-propiertys-carousel',
  templateUrl: './propiertys-carousel.component.html',
  styleUrls: ['./propiertys-carousel.component.scss']
})
export class PropiertysCarouselComponent {
  images = [1, 2, 3, 4].map(() => `https://picsum.photos/1920/1200?random&t=${Math.random()}`);

  constructor(config: NgbCarouselConfig) {
    // customize default values of carousels used by this component tree
    config.interval = 10000;
    config.wrap = false;
    config.keyboard = false;
    config.pauseOnHover = false;
  }
}