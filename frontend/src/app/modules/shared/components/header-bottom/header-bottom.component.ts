import { Component, OnInit } from "@angular/core";
import {
  ConfiguracionGeneralService,
  SucursalesService
} from "src/app/servicios/servicios.index";
import { IConfigG } from "src/app/servicios/interfaces.index";

@Component({
  selector: "app-header-bottom",
  templateUrl: "./header-bottom.component.html",
  styleUrls: ["./header-bottom.component.scss"]
})
export class HeaderBottomComponent implements OnInit {
  config = { configGeneral: {} } as IConfigG;
  ulClass: string = "nav flex-column d-md-block";
  constructor(private _ConfiguracionGeneral: ConfiguracionGeneralService) {}

  ngOnInit() {
    this.getAllConfigurations();
    this.assignUlClass(window.innerWidth);
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
  assignUlClass(width: number) {
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
