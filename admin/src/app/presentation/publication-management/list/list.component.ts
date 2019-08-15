import { Component, OnInit } from '@angular/core';
import { PublicacionesService } from 'src/app/services/publicaciones/publicaciones.service';
import { AlertsService } from 'src/app/services/alerts.service';

@Component({
   selector: 'app-list',
   templateUrl: './list.component.html'
})
export class ListComponent implements OnInit {

   data: any[] = []
   tiposPropiedades: any[] = [];

   loading: boolean = false
   constructor(
      private service: PublicacionesService,
      private alertService: AlertsService
   ) { }

   ngOnInit(): void {
      this.loadData()
   }

   loadData() {

      this.service.getTipoPropiedad().then((res: any) => {
         this.tiposPropiedades = res;
      })

      this.loading = true
      // Es necesario crear todos los servicios para las publicaciones
      this.service.listarTodasPropiedades().then(
         res => {
            this.data = res;
            console.log(res);

            this.loading = false;
         }, error => {
            this.loading = false;
         });

   }

   getTipoPropiedad(idTipoPropiedad) {
      return this.tiposPropiedades.find(element => element.idTipoPropiedad == idTipoPropiedad).descripcion;
   }

   show() { }

   eliminar(pKey: number) {
      if (confirm('Está seguro de que quiere eliminar esta publicación?')) {
         this.loading = true;
         this.service
            .deletePropiedad(pKey)
            .then(data => {
               this.loadData();
               this.alertService.msg('OK', 'Eliminar Publicación', 'Publicación Eliminada Correctamente.')
               this.loading = false;
            })
            .catch(error => {
               console.error(error);
               this.alertService.msg('ERR', 'Eliminar Publicación', 'Error al Eliminar Publicación.');
               this.loading = false;
            });
      }
   }

}
