import { Component, OnInit } from '@angular/core';
import { GestionPublicacionesService } from 'src/app/services/gestion-publicaciones/gestion-publicaciones.service';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { AlertsService } from 'src/app/services/alerts.service';
import { PublicacionesService } from 'src/app/services/publicaciones/publicaciones.service';
import { IPublicacion } from 'src/app/services/publicaciones/publicaciones.interface';

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
   arrayMonedas: any[] = [];
   arrayEstadoDePropiedad: any[] = [];
   arrayPais: any[] = [];
   arrayProvincia: any[] = [];
   arrayPartido: any[] = [];
   arrayRegion: any[] = [];
   arrayLocalidad: any[] = [];
   arrayCiudad: any[] = [];
   arrayBarrio: any[] = [];
   arraySubBarrio: any[] = [];
   arrayCalle: any[] = [];

   arrayMedidasDeAmbientes: { label: string, selected: boolean, medidas: any }[] = [];
   arrayAmbientes: { label: string, selected: boolean }[] = [];

   constructor(
      private service: PublicacionesService,
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

      //cargamos los checks de las medidas y de los ambientes
      this.loadData();
   }

   loadSelects() {

      this.service.getEstadoPublicacion().then((resp: any) => {
         this.arrayEstadoPublicacion = resp;
      });

      this.service.getTipoPropiedad().then((resp: any) => {
         this.arrayTipoDePropiedad = resp;
      });

      this.service.getTipoOperacion().then((resp: any) => {
         this.arrayTipoDeOperacion = resp;
      });

      this.service.getEstadoPropiedad().then((resp: any) => {
         this.arrayEstadoDePropiedad = resp;
      });

      this.service.getMonedas().then((resp: any) => {
         this.arrayMonedas = resp;
      });

      this.service.getPaises().then((resp: any) => {
         this.arrayPais = resp.Paises;
      });

      this.service.getProvincias().then((resp: any) => {
         this.arrayProvincia = resp.Provincias;
      });

      this.service.getRegiones().then((resp: any) => {
         this.arrayRegion = resp.Regiones;
      });


   }

   createForm() {
      this.formOne = this.fb.group({
         titulo: ['', Validators.required],
         fk_estado_publicacion: [null, Validators.required],
         descipcion: ['', Validators.required], //Descripcion --> se coloca descipcion por motivo de concordar con el error de backend
         fk_tipoPropiedad: [null, Validators.required],
         esUnaOportunidad: ["0", Validators.required],
         esUnaNovedad: ["0", Validators.required],
         aparece_en_galeria: ["1", Validators.required],
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
         fk_idTipoOperaion: ['', Validators.required], // se coloca fk_idTipoOperaion para coincidir con el campo del backend
         precio: ['', Validators.required],
         fk_idMonedas: ['', Validators.required],
         no_publicar_precio_inter: [false],
         fk_Estado: ['', Validators.required],
         //Compartir comision
         comision: ["50", Validators.required],
         //Ubicación
         //fk_Direccion_Pais_Id: ['', Validators.required],
         fk_Direccion_Provincia_Id: ['', Validators.required],
         fk_Direccion_Partido_Id: ['', Validators.required],
         fk_Direccion_Region_Id: ['', Validators.required],
         fk_Direccion_Localidad_Id: ['', Validators.required],
         fk_Direccion_Ciudad_Id: [''],
         fk_Direccion_Barrio_Id: [''],
         fk_Direccion_SubBarrio_Id: [''],
         Direccion_Nombrecalle: [''],
         Direccion_Numero: [''],
         Direccion_Piso: [''],
         Direccion_Departamento: [''],
         //Caracteristicas

         altura: ['', Validators.required],
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

      this.loadSelects();
   }

   getDataForm() {
      //Creamos el objeto que vamos a llenar totalmente vacio
      let obj: IPublicacion = {} as IPublicacion;

      //Creamos un objeto con los valores del formulario 1
      let data1 = this.formOne.value;

      //Asignamos los datos del 1er Step
      obj.titulo = data1.titulo;
      obj.fk_estado_publicacion = data1.fk_estado_publicacion;
      obj.descipcion = data1.descipcion;
      obj.fk_tipoPropiedad = data1.fk_tipoPropiedad;
      obj.esUnaOportunidad = +data1.esUnaOportunidad;
      obj.esUnaNovedad = +data1.esUnaNovedad;
      obj.aparece_en_galeria = +data1.aparece_en_galeria;

      //Asignamos los datos del 2do Step
      this.imageGalery ? obj.imagen_para_galeria = this.imageGalery : null;
      this.image1 ? obj.imagen1 = this.image1 : null;
      this.image2 ? obj.imagen2 = this.image2 : null;
      this.image3 ? obj.imagen3 = this.image3 : null;
      this.image4 ? obj.imagen4 = this.image4 : null;
      this.image5 ? obj.imagen5 = this.image5 : null;
      this.image6 ? obj.imagen6 = this.image6 : null;
      this.image7 ? obj.imagen7 = this.image7 : null;

      //Asignamos los datos del 3er Step
      //Obetenemos el objeto del 3er formulario
      let data3 = this.formThree.value;
      //Obtenemos la data de Datos Generales
      //Asignamos el tipo de unidad
      switch (obj.fk_tipoPropiedad) {
         //Asignamos el tipo de unidad segun el tipo de propiedad seleccionado
         case 1: //Departamento
            obj.fk_TipoUnidadDepartamento = data3.tipoDeUnidad;
            break;
         case 3: //Casa
            obj.fk_TipoUnidadCasa = data3.tipoDeUnidad;
            break;
         case 4: //Quinta
            obj.fk_TipoUnidadCasa = data3.tipoDeUnidad;
            break;
         case 5: //Cochera
            obj.fk_TipoCochera = data3.tipoDeUnidad;
            break;
         case 6: //Local
            obj.fk_TipoLocal = data3.tipoDeUnidad;
            break;
         case 7: //Hotel
            obj.fk_TipoHotel = data3.tipoDeUnidad;
            break;
         case 8: //Terreno
            obj.fk_TipoTerreno = data3.tipoDeUnidad;
            break;
         case 10: //Campo
            obj.fk_TipoCampo = data3.tipoDeUnidad;
            break;
         case 11: //Fondo de Comercio
            obj.fk_TipoFondoComercio = data3.tipoDeUnidad;
            break;

         case 2: //Departamento Tipo Casa
         case 9: //Oficina
         case 12: //Galpón
         case 13: //Negocio Especial
         default: //Cuando se ingrese algo desconocido
            //No posee tipo de unidad
            break;
      }

      obj.fk_idTipoOperaion = data3.fk_idTipoOperaion;
      obj.precio = data3.precio;
      obj.fk_idMonedas = data3.fk_idMonedas;
      obj.no_publicar_precio_inter = data3.no_publicar_precio_inter ? 1 : 0;
      obj.fk_Estado = data3.fk_Estado;

      //Obtenemos la data de comision
      obj.comision = data3.comision;

      //Obtenemos la data de Ubicacion
      obj.fk_Direccion_Pais_Id = 1; //Por Default Argentina
      obj.fk_Direccion_Provincia_Id = data3.fk_Direccion_Provincia_Id;
      obj.fk_Direccion_Partido_Id = data3.fk_Direccion_Partido_Id;
      obj.fk_Direccion_Region_Id = data3.fk_Direccion_Region_Id;
      obj.fk_Direccion_Localidad_Id = data3.fk_Direccion_Localidad_Id;
      obj.fk_Direccion_Ciudad_Id = data3.fk_Direccion_Ciudad_Id ? data3.fk_Direccion_Ciudad_Id : '';
      obj.fk_Direccion_Barrio_Id = data3.fk_Direccion_Barrio_Id ? data3.fk_Direccion_Barrio_Id : '';
      obj.fk_Direccion_SubBarrio_Id = data3.fk_Direccion_SubBarrio_Id ? data3.fk_Direccion_SubBarrio_Id : '';
      obj.Direccion_Nombrecalle = data3.Direccion_Nombrecalle ? data3.Direccion_Nombrecalle : '';
      obj.Direccion_Numero = data3.Direccion_Numero ? data3.Direccion_Numero : '';
      obj.Direccion_Piso = data3.Direccion_Piso ? data3.Direccion_Piso : '';
      obj.Direccion_Departamento = data3.Direccion_Departamento ? data3.Direccion_Departamento : '';

      console.log(obj);

   }

   changeApareceEnGaleria() {
      if (this.formOne.value.aparece_en_galeria == '1') {
         this.formTwo.controls['imageGalery'].enable();
      } else {
         this.formTwo.controls['imageGalery'].disable();
      }

   }

   changeTipoPropiedad(event) {
      //Validamos que tipo de propiedad se selecciona para cargar los tipos de unidad que se van a mostrar
      //Segun la api de argen prod https://inmuebles.atlassian.net/wiki/spaces/PUB/pages/39813246/3.2.2.3+Objeto+Propiedad
      switch (event.value) {
         case 1: //Departamento
            this.service.getTipoUnidadDepartamento().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoUnidadDepartamento, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;
         case 3: //Casa
            this.service.getTipoUnidadCasa().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoUnidadCasa, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;
         case 4: //Quinta
            this.service.getTipoUnidadCasa().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoUnidadCasa, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;
         case 5: //Cochera
            this.service.getTipoCochera().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoCochera, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;
         case 6: //Local
            this.service.getTipoLocal().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoLocal, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;
         case 7: //Hotel
            this.service.getTipoHotel().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoHotel, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;
         case 8: //Terreno
            this.service.getTipoTerreno().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoTerreno, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;

         case 10: //Campo
            this.service.getTipoCampo().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoCampo, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;
         case 11: //Fondo de Comercio
            this.service.getTipoFondoComercio().then((resp: any) => {
               //parseamos el array a uno con valores en común para el select
               let array = [];
               for (let index = 0; index < resp.length; index++) {
                  const element = resp[index];
                  array.push({ id: element.idTipoFondoComercio, descripcion: element.descripcion });
               }
               this.arrayTipoDeUnidad = array;
            });
            break;

         case 2: //Departamento Tipo Casa
         case 9: //Oficina
         case 12: //Galpón
         case 13: //Negocio Especial
         default: //Cuando se ingrese algo desconocido
            //No posee tipo de unidad
            this.arrayTipoDeUnidad = [{ id: 0, descripcion: "Otro" }]
            break;

      }
      //Luego de cambiar el array eliminamos el posible valor seleccionado
      this.formThree.controls['tipoDeUnidad'].setValue(null);

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

   reloadPartidos(event) {
      this.formThree.controls['fk_Direccion_Partido_Id'].setValue('');
      if (event.value >= 0) {
         this.service.getPartidos(event.value).then((resp: any) => {
            this.arrayPartido = resp.Partidos;
         });
      }
   }

   reloadLocalidades(event) {
      this.formThree.controls['fk_Direccion_Localidad_Id'].setValue('');
      if (event.value >= 0) {
         this.service.getLocalidades(event.value).then((resp: any) => {
            this.arrayLocalidad = resp.Localidades;
         });
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
