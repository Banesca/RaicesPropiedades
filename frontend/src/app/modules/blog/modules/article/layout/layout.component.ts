import { Component, OnInit } from '@angular/core';
import {
  PublicacionesService,
  ContactoService,
  ArticuloService,
} from 'src/app/servicios/servicios.index';
import { ActivatedRoute } from '@angular/router';
import { NgbCarouselConfig } from '@ng-bootstrap/ng-bootstrap';
import { VistaPublicaciones } from 'src/app/servicios/publicaciones/publicaciones.interface';
import { DataByTipoPropiedad } from '../../../../../presentation/publication-management/form/datosPorTipoPropiedad';
import { IContacto } from 'src/app/servicios/interfaces.index';
import {
  NgForm,
  FormGroup,
  FormControl,
  FormBuilder,
  Validators,
} from '@angular/forms';
import {
  NgbModalConfig,
  NgbModal,
  NgbModalRef,
} from '@ng-bootstrap/ng-bootstrap';
@Component({
  selector: 'app-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.scss'],
})
export class LayoutComponent implements OnInit {
  gPropiedades: any;
  status: boolean;
  mId: string;
  successMensaje: boolean = false;
  errorMensaje: any = null;
  submitted: boolean = false;
  mLoading: boolean = false;
  mContacto: IContacto;
  contactForm: FormGroup;
  contactFormSection: boolean = false;
  images: any[] = [];
  searchClicked: boolean;
  //Inicializamos la vista en blanco
  vista: VistaPublicaciones = {
    caracteristicas: {},
    ambientes: [],
    instalaciones: [],
    servicios: [],
    edificio: {
      caracteristicas: [],
      instalaciones: [],
      servicios: [],
    },
  };
  constructor(
    private _PublicacionesService: PublicacionesService,
    config: NgbCarouselConfig,
    private _ActivatedRoute: ActivatedRoute,
    private articuloService: ArticuloService,
    private _formBuilder: FormBuilder,
    private _ContactoService: ContactoService,
    private modalService: NgbModal
  ) {
    this._ActivatedRoute.params.subscribe((param) => {
      this.mId = param['ruta'];
    });
    config.interval = 10000;
    config.wrap = false;
    config.keyboard = true;
    config.pauseOnHover = false;
    config.showNavigationIndicators = true;
    this.searchClicked = false;
  }

  ngOnInit() {
    this.contactForm = this.getContactForm();
    this.GetPublicacionUrl();
    this.articuloService.search.subscribe((data) => {
      this.searchClicked = data;
    });
  }
  get f() {
    return this.contactForm.controls;
  }
  open(content) {
    this.modalService.open(content);
  }
  onSubmit() {
    this.submitted = true;

    if (this.contactForm.invalid) {
      return;
    }

    this.contactForm.controls['fk_idPropiedad'].setValue(this.mId);
    this.guardar();
  }
  guardar() {
    this.mLoading = true;
    this.submitted = true;
    this._ContactoService
      .NewContactPropiedad(this.contactForm.value)
      .then((data) => {
        this.successMensaje = true;
        this.mLoading = false;
        this.submitted = false;
        this.contactForm.reset();
      })
      .catch((error) => {
        console.log(error);
        this.errorMensaje = error;
        this.mLoading = false;
      });
  }
  getContactForm() {
    return this._formBuilder.group({
      nombre: [
        '',
        [
          Validators.required,
          Validators.pattern('^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚ ]+$'),
          Validators.minLength(6),
        ],
      ],
      email: [
        '',
        [
          Validators.required,
          Validators.email,
          Validators.pattern('^[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$'),
        ],
      ],
      telefono: [
        '',
        [Validators.required, Validators.pattern('^[0-9]{10,12}$')],
      ],
      mensaje: ['', Validators.required],
      fk_idPropiedad: [''],
    });
  }
  setVistaValue(idTipoVivienda) {
    //Validamos que tipo de propiedad se selecciona para cargar los tipos de unidad que se van a mostrar
    //Segun la api de argen prod https://inmuebles.atlassian.net/wiki/spaces/PUB/pages/39813246/3.2.2.3+Objeto+Propiedad
    switch (idTipoVivienda) {
      case 1: //Departamento
        this.vista = DataByTipoPropiedad.Departamento;
        break;
      case 2: //Departamento Tipo Casa
        this.vista = DataByTipoPropiedad.DepartamentoTipoCasa;
        break;
      case 3: //Casa
        this.vista = DataByTipoPropiedad.Casa;
        break;
      case 4: //Quinta
        this.vista = DataByTipoPropiedad.Quinta;
        break;
      case 5: //Cochera
        this.vista = DataByTipoPropiedad.Cochera;
        break;
      case 6: //Local
        this.vista = DataByTipoPropiedad.Local;
        break;
      case 7: //Hotel
        this.vista = DataByTipoPropiedad.Hotel;
        break;
      case 8: //Terreno
        this.vista = DataByTipoPropiedad.Terreno;
        break;
      case 9: //Oficina
        this.vista = DataByTipoPropiedad.Oficina;
        break;
      case 10: //Campo
        this.vista = DataByTipoPropiedad.Campo;
        break;
      case 11: //Fondo de Comercio
        this.vista = DataByTipoPropiedad.FondoComercio;
        break;

      case 12: //Galpón
        this.vista = DataByTipoPropiedad.Galpon;
        break;
      case 13: //Negocio Especial
        this.vista = DataByTipoPropiedad.NegocioEspecial;
        break;
      default:
        //Cuando se ingrese algo desconocido
        break;
    }
  
  }
  GetPublicacionUrl() {
    this._PublicacionesService
      .getPublicacion(this.mId)
      .then((data) => {

        this.gPropiedades = data;

        this.setVistaValue(this.gPropiedades.tipo_propiedad.idTipoPropiedad);
        
        if (this.vista.ambientes) {
          this.vista.ambientes.forEach((element) => {
            element.selected =
              this.gPropiedades[element.variableName] == '1' ? true : false;
          });
        }

        //Obtenemos y llenamos los selects de Instalaciones
        if (this.vista.instalaciones) {
          this.vista.instalaciones.forEach((element) => {
            element.selected =
              this.gPropiedades[element.variableName] == '1' ? true : false;
          });
        }


        //Obtenemos y llenamos los selects de Servicios
        if (this.vista.servicios) {
          this.vista.servicios.forEach((element) => {
            element.selected =
              this.gPropiedades[element.variableName] == '1' ? true : false;
          });
        }

        //Obtenemos y llenamos los selects de Edificios
        if (this.vista.edificio) {
          //Servicios
          this.vista.edificio.servicios.forEach((element) => {
            element.selected =
              this.gPropiedades[element.variableName] == '1' ? true : false;
          });
        }



        //Obtenemos y llenamos los selects de Caracteristicas
        if (this.vista.caracteristicas) {
          this.vista.caracteristicas.forEach((element) => {
            element.selected =
              this.gPropiedades[element.variableName] >=1 ? true : false;

              if(this.gPropiedades[element.variableName] > 1){
                element.value = this.gPropiedades[element.variableName];
              }


              if(this.gPropiedades[element.variableName] != null){
                if(this.gPropiedades[element.variableName].descripcion != null){
                  element.selected = true
                   element.value = this.gPropiedades[element.variableName].descripcion;
                }
                
                if(this.gPropiedades[element.variableName] > 0 && this.gPropiedades[element.variableName].descripcion == null){
                  element.selected = true
                  element.value = this.gPropiedades[element.variableName];
          
                }
                
              }
          });
        }


        if (this.gPropiedades.imagenes.imagen_para_galeria)
          this.images.push(this.gPropiedades.imagenes.imagen_para_galeria);
        if (this.gPropiedades.imagenes.imagen1)
          this.images.push(this.gPropiedades.imagenes.imagen1);
        if (this.gPropiedades.imagenes.imagen2)
          this.images.push(this.gPropiedades.imagenes.imagen2);
        if (this.gPropiedades.imagenes.imagen3)
          this.images.push(this.gPropiedades.imagenes.imagen3);
        if (this.gPropiedades.imagenes.imagen4)
          this.images.push(this.gPropiedades.imagenes.imagen4);
        if (this.gPropiedades.imagenes.imagen5)
          this.images.push(this.gPropiedades.imagenes.imagen5);
        if (this.gPropiedades.imagenes.imagen6)
          this.images.push(this.gPropiedades.imagenes.imagen6);
        if (this.gPropiedades.imagenes.imagen7)
          this.images.push(this.gPropiedades.imagenes.imagen7);
        if (this.gPropiedades.imagenes.imagen8)
          this.images.push(this.gPropiedades.imagenes.imagen8);
        if (this.gPropiedades.imagenes.imagen9)
          this.images.push(this.gPropiedades.imagenes.imagen9);
        if (this.gPropiedades.imagenes.imagen10)
          this.images.push(this.gPropiedades.imagenes.imagen10);
        if (this.gPropiedades.imagenes.imagen11)
          this.images.push(this.gPropiedades.imagenes.imagen11);
        if (this.gPropiedades.imagenes.imagen12)
          this.images.push(this.gPropiedades.imagenes.imagen12);
        if (this.gPropiedades.imagenes.imagen13)
          this.images.push(this.gPropiedades.imagenes.imagen13);
        if (this.gPropiedades.imagenes.imagen14)
          this.images.push(this.gPropiedades.imagenes.imagen14);
        if (this.gPropiedades.imagenes.imagen15)
          this.images.push(this.gPropiedades.imagenes.imagen15);
        if (this.gPropiedades.imagenes.imagen16)
          this.images.push(this.gPropiedades.imagenes.imagen16);
        if (this.gPropiedades.imagenes.imagen17)
          this.images.push(this.gPropiedades.imagenes.imagen17);
        if (this.gPropiedades.imagenes.imagen18)
          this.images.push(this.gPropiedades.imagenes.imagen18);
        if (this.gPropiedades.imagenes.imagen19)
          this.images.push(this.gPropiedades.imagenes.imagen19);
        if (this.gPropiedades.imagenes.imagen20)
          this.images.push(this.gPropiedades.imagenes.imagen20);
        if (
          
          !this.gPropiedades.imagenes.imagen_para_galeria &&
          !this.gPropiedades.imagenes.imagen1 &&
          !this.gPropiedades.imagenes.imagen2 &&
          !this.gPropiedades.imagenes.imagen3 &&
          !this.gPropiedades.imagenes.imagen4 &&
          !this.gPropiedades.imagenes.imagen5 &&
          !this.gPropiedades.imagenes.imagen6 &&
          !this.gPropiedades.imagenes.imagen7 &&
          !this.gPropiedades.imagenes.imagen8 &&
          !this.gPropiedades.imagenes.imagen9 &&
          !this.gPropiedades.imagenes.imagen10 &&
          !this.gPropiedades.imagenes.imagen11 &&
          !this.gPropiedades.imagenes.imagen12 &&
          !this.gPropiedades.imagenes.imagen13 &&
          !this.gPropiedades.imagenes.imagen14 &&
          !this.gPropiedades.imagenes.imagen15 &&
          !this.gPropiedades.imagenes.imagen16 &&
          !this.gPropiedades.imagenes.imagen17 &&
          !this.gPropiedades.imagenes.imagen18 &&
          !this.gPropiedades.imagenes.imagen19 &&
          !this.gPropiedades.imagenes.imagen20
        ) {
          this.images.push('https://picsum.photos/id/539/900/500');
        }
      })

      .catch((error) => {
        console.log(error);
      });
  }
  contact() {
    this.errorMensaje = null;
    this.successMensaje = false;
    if (this.contactFormSection) {
      this.contactFormSection = false;
    } else {
      this.contactFormSection = true;
    }
  }
  submittedClose() {
    this.successMensaje = false;
    this.submitted = false;
  }
  volver() {
    this.errorMensaje = null;
    this.submitted = false;
  }
}
