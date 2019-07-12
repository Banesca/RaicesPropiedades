import { Component, OnInit } from '@angular/core';
import { GestionPublicacionesService } from 'src/app/services/gestion-publicaciones/gestion-publicaciones.service';
import { FormGroup, FormBuilder } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
   selector: 'app-form',
   templateUrl: './form.component.html'
})
export class FormComponent implements OnInit {

   loading: boolean = false

   formOne: FormGroup;
   formTwo: FormGroup;
   formThree: FormGroup;

   id: string

   publication: any
   constructor(
      private _gestionPublicacionService: GestionPublicacionesService,
      private activatedRoute: ActivatedRoute,
      private router: Router,
      private fb: FormBuilder
   ) { }

   ngOnInit(): void {
      /**
       * Colocar toda la carga de select en esta parte
       */
      this.activatedRoute.params.subscribe(params => {
         this.id = params.id
         if (this.id) {
            // EN  CASO DE EDICION CARGA LOS DATOS DEL REGISTRO A EDITAR
            this.createForm()
         } else {
            this.createForm()
         }
      })

   }

   createForm() {
      this.formOne = this.fb.group({
         name: ['']
      })
      this.formTwo = this.fb.group({
         name: ['']
      })
      this.formThree = this.fb.group({
         name: ['']
      })

   }

   show() { }
   delete() { }
}
