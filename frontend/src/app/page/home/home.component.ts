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
  searchClicked: boolean;
  constructor(
    private _PublicacionesService: PublicacionesService,
    public articuloService: ArticuloService,
    private _GaleriaHomeService: GaleriaHomeService
  ) {
    this.getAll();
    this.getGaleriaHome();
  }

  ngOnInit() {
    this.articuloService.search.subscribe(data => {
      this.searchClicked = data;
    });
  }
  getAll() {
    this._PublicacionesService.All().then(data => {
      this.mCategorias = data;
    });
  }
  getGaleriaHome(){
    this._GaleriaHomeService
      .All()
        .then(res => {
       this.galeriaHome = res.data
      })
      .catch(error => {
        console.log(error);
      });
  }
}
