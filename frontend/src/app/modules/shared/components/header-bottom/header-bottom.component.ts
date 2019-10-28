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
  constructor(private _ConfiguracionGeneral: ConfiguracionGeneralService) {}

  ngOnInit() {
    this.getAllConfigurations();
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
}
