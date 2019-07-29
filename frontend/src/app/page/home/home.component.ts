import { Component, Input, OnInit } from "@angular/core";
import { PublicacionesService } from "src/app/servicios/servicios.index";
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
  mLoading = false;
  searchClicked: boolean;
  constructor(
    private _PublicacionesService: PublicacionesService,
    public articuloService: ArticuloService
  ) {
    this.getAll();
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
}
