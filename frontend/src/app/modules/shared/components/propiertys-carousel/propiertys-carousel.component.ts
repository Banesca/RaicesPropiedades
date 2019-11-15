import { Component } from "@angular/core";
import {
  GaleriaHomeService,
  ConfiguracionGeneralService
} from "src/app/servicios/servicios.index";
import { IGaleria, IConfigG } from "src/app/servicios/interfaces.index";

@Component({
  selector: "app-propiertys-carousel",
  templateUrl: "./propiertys-carousel.component.html",
  styleUrls: ["./propiertys-carousel.component.scss"]
})
export class PropiertysCarouselComponent {
  config = { configGeneral: {} } as IConfigG;
  mCategorias: IGaleria[];
  ulClass: string = "nav flex-column d-md-block";
  // images = [1, 2, 3, 4].map(() => `https://picsum.photos/1920/500?random&t=${Math.random()}`);

  constructor(
    private _ConfiguracionGeneral: ConfiguracionGeneralService,
    private _GaleriaHomeService: GaleriaHomeService
  ) {
    // customize default values of carousels used by this component tree
    this.getAll();
    this.getAllConfigurations();
    this.assignUlClass(window.innerWidth);
    console.log("width:",window.innerWidth);
  }
  loadImageEmpty(galeries) {
    for (let i = 0; i < galeries.length; i++) {
      const element = galeries[i];
      if (element.imagenes.length == 0) {
        element.imagenes.push({
          imagen: "../../../../../assets/images/BANNER-2"
        });
      }
    }
  }
  getAll() {
    this._GaleriaHomeService
      .All()
      .then(res => {
        this.mCategorias = res.data;
        this.loadImageEmpty(this.mCategorias);
      })
      .catch(error => {
        console.log(error);
      });
  }
  getAllConfigurations() {
    this._ConfiguracionGeneral
      .All()
      .then(data => {
        this.config = data;
      })
      .catch(error => {
        console.log("Error en peticion de getAll");
        console.log(error);
      });
  }
  assignUlClass(width:number){
    if (width < 768) {
      this.ulClass = "list-group list-group-horizontal";
    } else {
      this.ulClass = "nav flex-column d-md-block";
    }
  }
  onResize(event) {
    this.assignUlClass(event.target.innerWidth);
  }
}
