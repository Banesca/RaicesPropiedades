import { Component, OnInit } from '@angular/core';
import { IConfigG, ISucursal } from "src/app/servicios/interfaces.index";
import { ConfiguracionGeneralService, SucursalesService } from "src/app/servicios/servicios.index";
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { TransactionModalComponent } from '../transaction-modal/transaction-modal.component';
import { HeaderComponent } from '../header/header.component';


@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent {
  mCategoria = {configGeneral:{}} as IConfigG;
  mSucusales: ISucursal[];
  public baseUrl: string = 'sucursales'

  
  constructor(private _ConfiguracionGeneral: ConfiguracionGeneralService,private _SucursalesService: SucursalesService, private modalService: NgbModal) { 

    this.mCategoria;
    this.getAll();
    this.getAllSucusales()
  }

  ngOnInit() {
  }

  getAll() {
    this._ConfiguracionGeneral
      .All()
      .then(data => {
        this.mCategoria = data;
        // console.log("mCategoria footer:  ",this.mCategoria);
      })
      .catch(error => {
        console.log("Error en peticion de getAll");
        console.log(error);

      });
  }

  getAllSucusales() {
    this._SucursalesService
      .All()
      .then(data => {
        this.mSucusales = data.suculsales;
      })
      .catch(error => {
        console.log(error);
      });
  }


  openModal() {
    const modalRef = this.modalService.open(TransactionModalComponent);
    modalRef.componentInstance.name = 'World';
  }

}
