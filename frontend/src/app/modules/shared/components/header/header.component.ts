import { Component } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap'
import { ISucursal } from "src/app/servicios/interfaces.index";
import { SucursalesService } from "src/app/servicios/servicios.index";
import { TransactionModalComponent } from '../transaction-modal/transaction-modal.component';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent {
  mCategoria: ISucursal[];
  status = false;
  public baseUrl: string = 'sucursales'
  
  constructor(private _SucursalesService: SucursalesService, private modalService: NgbModal) {
    
    this.mCategoria;
    this.getAll();
  }

  ngOnInit() {
  }

  getAll() {
    this._SucursalesService
      .All()
      .then(data => {
        this.mCategoria = data.suculsales;
        console.log("menu:",this.mCategoria);
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