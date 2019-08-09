import { Component, OnInit } from '@angular/core';
import { GestionPublicacionesService } from 'src/app/services/gestion-publicaciones/gestion-publicaciones.service';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertsService } from 'src/app/services/alerts.service';

@Component({
   selector: 'app-form',
   templateUrl: './form.component.html',
   styleUrls: ['./form.component.css']
})
export class FormComponent implements OnInit {

   loading: boolean = false

   formOne: FormGroup;
   formTwo: FormGroup;
   formThree: FormGroup;

   id: string

   publication: any

   //Variables del 1er Step
   arrayEstadoPublicacion: any[] = [];
   arrayTipoDePropiedad: any[] = [];
   arrayTipoDePublicacion: any[] = [];

   //Variables del 2do Step
   imageNotFound = 'assets/not-found-publicaciones.png';
   imageGalery: File;
   image1: File;
   image2: File;
   image3: File;
   image4: File;
   image5: File;
   image6: File;
   image7: File;

   //Variables del 3er Step
   arrayTipoDeUnidad: any[] = [];
   arrayTipoDeOperacion: any[] = [];
   arrayEstadoDePropiedad: any[] = [];
   arrayPais: any[] = [];
   arrayProvincia: any[] = [];
   arrayPartido: any[] = [];
   arrayLocalidad: any[] = [];
   arrayBarrio: any[] = [];
   arraySubBarrio: any[] = [];

   arrayMedidasDeAmbientes: { label: string, selected: boolean, medidas: any }[] = [];
   arrayAmbientes: { label: string, selected: boolean }[] = [];

   constructor(
      private _gestionPublicacionService: GestionPublicacionesService,
      private activatedRoute: ActivatedRoute,
      private router: Router,
      private fb: FormBuilder,
      private alertService: AlertsService
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

      this.arrayEstadoPublicacion = [{ value: 1, label: "Activo" }, { value: 0, label: "Inactivo" }];
      this.arrayTipoDePropiedad = [{ value: 1, label: "Apartamento" }, { value: 0, label: "Casa" }];
      this.arrayTipoDePublicacion = [{ value: 1, label: "Normal" }, { value: 0, label: "Otro" }];

      //cargamos los checks de las medidas y de los ambientes
      this.loadData();
   }

   createForm() {
      this.formOne = this.fb.group({
         titulo: ['', Validators.required],
         estado: [null, Validators.required],
         descripcion: ['', Validators.required],
         tipoDePropiedad: [null, Validators.required],
         tipoDePublicacion: [null, Validators.required],
         apareceEnGaleria: ["1", Validators.required],
         esUnaOportunidad: ["1", Validators.required],
         esUnaNovedad: ["1", Validators.required],
         enviarArgenProd: ["1", Validators.required]
      })
      this.formTwo = this.fb.group({
         imageGalery: ['', Validators.required],
         image1: ['', Validators.required],
         image2: [''],
         image3: [''],
         image4: [''],
         image5: [''],
         image6: [''],
         image7: ['']
      })
      this.formThree = this.fb.group({
         //Datos Basicos
         tipoDeUnidad: ['', Validators.required],
         tipoDeOperacion: ['', Validators.required],
         precio: ['', Validators.required],
         moneda: ["1", Validators.required],
         publicarPrecioInternet: [false],
         estadoDePropiedad: ['', Validators.required],
         //Compartir comision
         compartirComision: ["1", Validators.required],
         //Ubicación
         pais: ['', Validators.required],
         provincia: ['', Validators.required],
         partido: ['', Validators.required],
         localidad: ['', Validators.required],
         barrio: ['', Validators.required],
         subBarrio: ['', Validators.required],
         calle: ['', Validators.required],
         altura: ['', Validators.required],
         piso: ['', Validators.required],
         dto: ['', Validators.required],
         cp: ['', Validators.required],
         //Caracteristicas
         antiguedad: ['', Validators.required],
         aEstrenar: [false],
         cantAmbientes: ['', Validators.required],
         cantBanios: ['', Validators.required],
         cDormitorios: ['', Validators.required],
         mDormitorios: ['', Validators.required],
         cantToillets: ['', Validators.required],
         longFrente: ['', Validators.required],
         longFondo: ['', Validators.required],
         estadoProp: ['', Validators.required],
         tipoDeTecho: ['', Validators.required],
         tipoDeVista: ['', Validators.required],
         tipoDePendiente: ['', Validators.required],
         dependencia: [false]
      })

   }

   changeApareceEnGaleria() {
      if (this.formOne.value.apareceEnGaleria == '1') {
         this.formTwo.controls['imageGalery'].enable();
      } else {
         this.formTwo.controls['imageGalery'].disable();
      }

   }
   onFileChange(event, section?: string) {
      if (event.target.files && event.target.files.length) {
         const fileTo: File = event.target.files[0];

         //Validamos el tipo de archivo
         if (!fileTo.type.includes('image/png')
            && !fileTo.type.includes('image/jpg')
            && !fileTo.type.includes('image/jpeg')) {
            this.alertService.msg('ERR', 'Error:', 'El archivo no es admitido o no es una imagen');
            return;
         }

         //Validamos el tamaño del archivo
         if (fileTo.size > 1250000) {
            this.alertService.msg('ERR', 'Error:', 'El archivo es muy pesado, peso máximo 1Mb');
            return;
         }

         //Obtenemos un fakeURL para mostrar un preview
         var reader = new FileReader();
         reader.readAsDataURL(event.target.files[0]);
         //cargar imagenes
         switch (section) {
            case "imageGalery":
               //Asignamos la imagen
               this.imageGalery = fileTo;
               //Asignamos el fakeUrl
               reader.onload = (event) => {
                  this.formTwo.controls['imageGalery'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image1":
               this.image1 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image1'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image2":
               this.image2 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image2'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image3":
               this.image3 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image3'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image4":
               this.image4 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image4'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image5":
               this.image5 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image5'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image6":
               this.image6 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image6'].setValue((<FileReader>event.target).result);
               }
               break;
            case "image7":
               this.image7 = fileTo;
               reader.onload = (event) => {
                  this.formTwo.controls['image7'].setValue((<FileReader>event.target).result);
               }
               break;
            default:
               break;
         }
      }
   }

   loadData() {
      this.arrayMedidasDeAmbientes = [
         {
            label: "Hall",
            medidas: "",
            selected: false
         },
         {
            label: "Living",
            medidas: "",
            selected: false
         },
         {
            label: "Comedor",
            medidas: "",
            selected: false
         },
         {
            label: "Escritorio",
            medidas: "",
            selected: false
         },
         {
            label: "Playroom",
            medidas: "",
            selected: false
         },
         {
            label: "Cocina",
            medidas: "",
            selected: false
         },
         {
            label: "Comedor",
            medidas: "",
            selected: false
         },
         {
            label: "Balcón",
            medidas: "",
            selected: false
         },
         {
            label: "Terraza",
            medidas: "",
            selected: false
         },
         {
            label: "Lavandero",
            medidas: "",
            selected: false
         },
         {
            label: "Patio",
            medidas: "",
            selected: false
         },
         {
            label: "Quincho",
            medidas: "",
            selected: false
         },
         {
            label: "Pileta",
            medidas: "",
            selected: false
         },
      ];

      this.arrayAmbientes = [
         {
            label: "Altillo",
            selected: false
         },
         {
            label: "Ante cocina",
            selected: false
         },
         {
            label: "Antesala",
            selected: false
         },
         {
            label: "Azotea",
            selected: false
         },
         {
            label: "Baño",
            selected: false
         },
         {
            label: "Bar",
            selected: false
         },
         {
            label: "Baulera",
            selected: false
         },
         {
            label: "Biblioteca",
            selected: false
         },
         {
            label: "Bodega",
            selected: false
         },
         {
            label: "C. herramientas",
            selected: false
         },
         {
            label: "C. de planchar",
            selected: false
         },
         {
            label: "Depend. servicio",
            selected: false
         },
         {
            label: "Dormitorio",
            selected: false
         },
         {
            label: "Galpón",
            selected: false
         },
         {
            label: "Garage",
            selected: false
         },
         {
            label: "Jardín frente",
            selected: false
         },
         {
            label: "Jardín fondo",
            selected: false
         },
         {
            label: "Fondo libre",
            selected: false
         },
         {
            label: "Local",
            selected: false
         },
         {
            label: "Oficina",
            selected: false
         },
         {
            label: "Palier",
            selected: false
         },
         {
            label: "Sala",
            selected: false
         },
         {
            label: "Sótano",
            selected: false
         },
         {
            label: "Suite",
            selected: false
         },
         {
            label: "Vestíbulo",
            selected: false
         },
         {
            label: "Vestidor",
            selected: false
         },
         {
            label: "Vestuario",
            selected: false
         },
      ]
   }

   show() { }
   
   delete() { }
}
