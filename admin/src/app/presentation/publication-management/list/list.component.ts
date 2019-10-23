import { Component, OnInit } from '@angular/core';
import { PublicacionesService } from 'src/app/services/publicaciones/publicaciones.service';
import { AlertsService } from 'src/app/services/alerts.service';
import {
  NgForm,
  FormGroup,
  FormBuilder,
  Validators
} from "@angular/forms";

@Component({
   selector: 'app-list',
   templateUrl: './list.component.html'
})
export class ListComponent implements OnInit {

   data: any[] = []
   tiposPropiedades: any[] = [];

      filterForm: FormGroup;
      inPaperBin:boolean=false;
   loading: boolean = false
   constructor(
      private service: PublicacionesService,
      private alertService: AlertsService,
      private _formBuilder: FormBuilder
   ) { }

   ngOnInit(): void {
      this.loadData();
      this.filterForm = this.getFilterForm();
   }
      getFilterForm() {
            return this._formBuilder.group({
                  search: [""]
            });
      }

   loadData() {
      this.inPaperBin=false;
      this.service.getTipoPropiedad().then((res: any) => {
         this.tiposPropiedades = res;
      })

      this.loading = true
      // Es necesario crear todos los servicios para las publicaciones
      this.service.listarTodasPropiedades().then(
         res => {
            this.data = res;
            this.loading = false;
         }, error => {
            this.loading = false;
         });

   }

   getTipoPropiedad(idTipoPropiedad) {
      return this.tiposPropiedades.find(element => element.idTipoPropiedad == idTipoPropiedad).descripcion;
   }

   show() { }
   eliminarDePapelera(pKey: number) {
      if (confirm('Está seguro de que quiere eliminar esta publicación de la papelera?')) {
         this.loading = true;
         this.service
            .deletePropiedadFromPaperbin(pKey)
            .then(data => {
               this.loading = true
                  // Es necesario crear todos los servicios para las publicaciones
                  this.service.listarTodasPropiedades().then(
                  res => {
                        this.inPaperBin=false;
                        this.data = res;
                        this.loading = false;
                  }, error => {
                        this.loading = false;
                  });
               this.alertService.msg('OK', 'Eliminar Publicación', 'Publicación Eliminada de la papelera Correctamente.')
               this.loading = false;
            })
            .catch(error => {
               console.error(error);
               this.alertService.msg('ERR', 'Eliminar Publicación', 'Error al Eliminar Publicación.');
               this.loading = false;
            });
      }  
   }
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
   paperBin(){
      this.loading = true;
      this.service
            .paperBin()
            .then(data => {
                  this.data = data;
                  this.loading = false;
                  this.inPaperBin=true;
            })
            .catch(err => {
            console.log(err);
            });
  }
      filter() {
            // Buscar  por título, descripción, tipo
            this.service
                  .filter(this.filterForm.value)
                  .then(data => {
                        this.data = data.propiedades;
                  })
                  .catch(err => {
                  console.log(err);
                  this.alertService.msg("ERR", "ERROR", "Error al crear la galería.");
                  });
      }
}
