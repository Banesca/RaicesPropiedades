import { Component } from '@angular/core';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { TransactionModalComponent } from '../transaction-modal/transaction-modal.component';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent {
  
  constructor(private modalService: NgbModal) {}

  openModal() {
    const modalRef = this.modalService.open(TransactionModalComponent);
    modalRef.componentInstance.name = 'World';
  }


}


