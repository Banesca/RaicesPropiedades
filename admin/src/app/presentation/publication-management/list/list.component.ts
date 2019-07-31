import { Component, OnInit } from '@angular/core';
import { GestionPublicacionesService } from 'src/app/services/gestion-publicaciones/gestion-publicaciones.service';

@Component({
   selector: 'app-list',
   templateUrl: './list.component.html'
})
export class ListComponent implements OnInit {

   data: any = []
   loading: boolean = false
   constructor(
      private _gestionPublicacionService: GestionPublicacionesService
   ) { }

   ngOnInit(): void {
      this.loadData()
   }

   loadData() {
      this.loading = true
      // Es necesario crear todos los servicios para las publicaciones
      this._gestionPublicacionService.all().subscribe(
         res => {
            this.loading = false;
         }, error => {
            this.loading = false;
         });

   }

   show() { }
   delete() { }
}
