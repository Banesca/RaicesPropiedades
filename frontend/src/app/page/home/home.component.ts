import { Component, Input, OnInit } from "@angular/core";
import { PublicacionesService,GaleriaHomeService } from "src/app/servicios/servicios.index";
import { ArticuloService } from "../../servicios/servicios.index";

@Component({
  selector: "app-home",
  templateUrl: "./home.component.html",
  styleUrls: ["./home.component.scss"]
})
export class HomeComponent implements OnInit {
  @Input() name;
  public baseUrl: string = "../buscador/detail/";

  mContacto: any[];
  mCategorias: any;
  galeriaHome: any;
  mLoading = false;
  totalNovedades: number = 0;
  searchClicked: boolean;
  constructor(
    private _PublicacionesService: PublicacionesService,
    public articuloService: ArticuloService,
    private _GaleriaHomeService: GaleriaHomeService
  ) {
    
  }

  ngOnInit() {
    this.getAll();
    this.getGaleriaHome();
    
    this.articuloService.search.subscribe(data => {
      this.searchClicked = data;
    });
  }
  getAll() {
    this._PublicacionesService.All().then(data => {
      this.mCategorias = data;
      data.forEach(element => {
        if (element.esUnaNovedad == 1) {
          this.totalNovedades++;
        }
      });
    });
  }
  getGaleriaHome() {
    this._GaleriaHomeService
      .All()
      .then(res => {
        this.galeriaHome = res.data;
      })
      .catch(error => {
        console.log(error);
      });
  }
}
