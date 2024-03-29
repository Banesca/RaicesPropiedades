import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { UsuariosService } from '../../services/usuarios.service';
import { AlertsService } from '../../services/alerts.service';
import { RolPerfilService } from '../../services/rol-perfil.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms'

declare var $;

@Component({
   selector: 'app-gestion-usuario',
   templateUrl: './gestion-usuario.component.html',
   styleUrls: ['./gestion-usuario.component.css']
})
export class GestionUsuarioComponent implements OnInit {

   @ViewChild('image') image: ElementRef;
   @ViewChild('image') imageEdit: ElementRef;

   actualUser: string = localStorage.getItem('userName');
   userPerfil: any;
   userId: any;
   inPromiseMayorista: boolean = false;
   listUsers: any[] = []; list_rol: any; respContenedor: any[] = [];

   newUser: FormGroup;
   editUser: FormGroup;
   filterForm: FormGroup;

   datoMayorista: any;
   imgLoaded: File;
   inPromise: boolean;

   imageUrl: string;
   soloAprobados: boolean = false;
   filterAprobados: boolean = false;
   constructor(
      private UsuariosService: UsuariosService,
      private alertService: AlertsService,
      private rolPerfilService: RolPerfilService,
      private fb: FormBuilder
   ) {
      this.newUser = this.fb.group({
         name: ['', Validators.required],

         email: ['', [Validators.required, Validators.pattern(new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))]],

         password: ['', Validators.required],
         password_confirmation: ['', Validators.required],
      });

      this.editUser = this.fb.group({
         id: [''],
         name: ['', Validators.required],
         apellido: ['', Validators.required],
         email: ['', [Validators.required, Validators.pattern(new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))]],

         fk_idPerfil: ['', Validators.required]
      });
      this.filterForm = this.fb.group({
         filtro: [''],
         perfil: [''],
         aprobados: [''],

      });
      //userName : ['',[Validators.required, Validators.minLength(4), Validators.maxLength(32), Validators.pattern(new RegExp(/(^[a-zA-Z0-9._-]*$)/))]],
      //userName: ['',[Validators.required,  Validators.minLength(4), Validators.maxLength(32), Validators.pattern(new RegExp(/(^[a-zA-Z0-9._-]*$)/))]],
   }

   ngOnInit() {
      this.listaUser();
      this.getRolPerfil();
   }
   changeFilter() {
      const val = this.filterForm.value.aprobados;
      this.filterAprobados = (val == 'true' || val == 'false') ? true : false
      if (this.filterAprobados) {
         this.soloAprobados = val == 'true' ? true : false
         this.filtrarAprobados();
      }

      console.log(val);

   }
   filtrarAprobados() {
      if (!this.filterAprobados) {
         return;
      }
      this.listUsers = [];
      if (this.soloAprobados) {
         this.respContenedor.map(val => {
            val.statusUser == 1 && this.listUsers.push(val);
         })

      } else {
         this.respContenedor.map(val => {
            val.statusUser == 0 && this.listUsers.push(val);
         })
      }

      console.warn(this.listUsers);
   }
   ordenar(value: 'nombre' | 'apellido' | 'usuario' | 'email' | 'perfil') {
      let array = this.listUsers
      if (value == 'nombre') {
         this.listUsers = array.sort((a, b) => {
            if (a.name > b.name) {
               return 1;
            }
            if (a.name < b.name) {
               return -1;
            }
            return 0;
         });
      } else if (value == 'apellido') {
         this.listUsers = array.sort((a, b) => {
            if (a.apellido > b.apellido) {
               return 1;
            }
            if (a.apellido < b.apellido) {
               return -1;
            }
            return 0;
         });
      } else if (value == 'usuario') {
         this.listUsers = array.sort((a, b) => {
            if (a.userName > b.userName) {
               return 1;
            }
            if (a.userName < b.userName) {
               return -1;
            }
            return 0;
         });
      } else if (value == 'email') {
         this.listUsers = array.sort((a, b) => {
            if (a.email > b.email) {
               return 1;
            }
            if (a.email < b.email) {
               return -1;
            }
            return 0;
         });
      }

   }
   filtrar() {
      this.inPromise = true;
      const val = this.filterForm.value

      const data: FormData = new FormData()
      val.filtro && data.append('search', val.filtro);
      val.perfil && data.append('searchRol', val.perfil);

      this.UsuariosService.filtrarUsuarios(data).subscribe(
         (resp: any) => {
            this.respContenedor = resp;
            this.listUsers = resp
            console.warn(resp);
            //   this.filtrarAprobados();
            this.changeFilter();
            this.inPromise = false;

         }
      ), error => {
         console.log(error);
         this.alertService.msg('ERR', 'error', 'error al filtrar');
      }
   }

   listaUser() {
      this.UsuariosService.listaUsuarios().subscribe(
         (resp: any) => {
            this.respContenedor = resp.users
            this.listUsers = resp.users
            console.log(this.listUsers);
            this.filtrarAprobados();

         }
      )
   }

   getRolPerfil() {
      return this.rolPerfilService.getPerfil().subscribe(
         resp => {
            this.list_rol = resp;
            console.log(resp);
         }
      )
   }

   addUser() {
      const values = this.newUser.value;
      console.log(values);

      if (values.password.length <= 8) {
         this.alertService.msg("ERR", "Error", 'la contraseña debe ser mayor de 8 caracteres');
         return;
      }

      let user = new FormData();

      user.append("name", values.name);
      user.append("apellido", values.apellido);

      user.append("email", values.email);
      user.append("password", values.password);
      // user.append("userName",values.userName);
      user.append("fk_idPerfil", values.fk_idPerfil);
      user.append("siAdmin", "1");
      if (this.imgLoaded !== undefined) {
         user.append("fotoPerfil", this.imgLoaded, new Date().toString());
      }
      user.append("password_confirmation", values.password_confirmation);

      this.inPromise = true;
      this.UsuariosService._addUser(user).subscribe(
         resp => {
            console.log(user);
            if (resp) {
               this.inPromise = false;
               $("#newUserModal").modal('hide');
               this.alertService.msg("OK", "¡Éxito!", "Se ha guardado el registro");
               this.listaUser();
               this.newUser.reset();
               this.image.nativeElement.value = "";

            } else {
               this.alertService.msg("ERR", 'Error al guardar los datos');

            }

         },
         error => {
            this.alertService.msg("ERR", 'Error al guardar los datos');
            this.inPromise = false;
            if (error.error.errors.name != null) {
               this.alertService.msg("ERR", error.error.errors.email);
            }

            if (error.error.errors.email != null) {
               this.alertService.msg("ERR", error.error.errors.email);
            }

            if (error.error.errors.password != null) {
               this.alertService.msg("ERR", error.error.errors.password);
            }

            if (error.error.errors.password_confirmation != null) {
               this.alertService.msg("ERR", error.error.errors.password_confirmation);
            }

            if (error.error.errors.password_confirmation != null) {
               this.alertService.msg("ERR", error.error.errors.password_confirmation);
            } else {
               this.alertService.msg("ERR", 'Error al guardar los datos');

            }

         }
      )
   }

   set(user) {
      this.userPerfil = null;
      this.userId = null;
      setTimeout(() => {
         this.userPerfil = user.perfil_cliene ? user.perfil_cliene : "";
         this.userId = user.id ? user.id : null
         if (!this.userPerfil) { this.alertService.msg('ERR', 'err', 'no se encontro un perfil del cliente'); }
        console.log("gestion-usuario.component.ts set");
      }, 200);
      console.log(this.userId);
      console.log(this.userPerfil);
      this.editUser.patchValue({
         id: user.id,
         name: user.name,
         apellido: user.apellido,
         email: user.email,
         userName: user.userName,
         fk_idPerfil: user.fk_idPerfil,
      });
      console.log('user', user, 'form', this.editUser.value, 'form invalid?', this.editUser.invalid);
   }

   Aprobacion(user: any) {
      let data: FormData = new FormData();
      let status = user.statusUser == 0 ? 1 : 0;
      data.append('idUser', user.id);
      data.append('statusUser', status.toString());
      this.inPromise = true;
      this.UsuariosService._activeAcc(data).subscribe(resp => {
         console.log(resp);
         resp && this.alertService.msg('OK', 'STATUS', 'cambio exitoso');
         this.listaUser();
         this.inPromise = false;
      }, error => {
         this.alertService.msg('ERR', 'ERROR', 'Error al cambiar status del usuario' + error);
      })

   }
   upgradeUser() {
      const values = this.editUser.value;

      let user: FormData = new FormData();

      user.append("name", values.name);
      user.append("apellido", values.apellido);

      user.append("email", values.email);
      user.append("userName", values.userName);
      user.append("fk_idPerfil", values.fk_idPerfil);
      if (this.imgLoaded !== undefined) {
         user.append("fotoPerfil", this.imgLoaded, new Date().toString());
      }

      this.inPromise = true;
      this.UsuariosService.upgradeUsers(user, values.id).subscribe(
         resp => {
            $("#updateModal").modal('hide');
            this.alertService.msg("OK", "¡Éxito!", "Se ha actualizo el registro");
            this.listaUser();
            this.getRolPerfil();
            /*   if(this.imageEdit.nativeElement){
                this.imageEdit.nativeElement.value = "";
              } */

            this.inPromise = false;


         },
         error => {
            this.inPromise = false;

            if (error.error.errors.name != null) {
               this.alertService.msg("ERR", error.error.errors.email);
            }

            if (error.error.errors.email != null) {
               this.alertService.msg("ERR", error.error.errors.email);
            }

            if (error.error.errors.password != null) {
               this.alertService.msg("ERR", error.error.errors.password);
            }

            if (error.error.errors.password_confirmation != null) {
               this.alertService.msg("ERR", error.error.errors.password_confirmation);
            }

            if (error.error.errors.password_confirmation != null) {
               this.alertService.msg("ERR", error.error.errors.password_confirmation);
            }

         }
      )
   }

   showImage(user) {
      this.imageUrl = user.ruta_imagen;
      $('#imagen').modal('toggle');
   }

   onFileChange(event) {
      if (event.target.files && event.target.files.length) {
         const fileTo: File = event.target.files[0];

         if (!fileTo.type.includes('image/png')
            && !fileTo.type.includes('image/jpg')
            && !fileTo.type.includes('image/jpeg')) {
            this.alertService.msg('ERR', 'Error:', 'El archivo no es admitido o no es una imagen');
            this.newUser.patchValue({
               imagen: null
            });
            return;
         }

         if (fileTo.size > 5000000) {
            this.alertService.msg('ERR', 'Error:', 'El archivo es muy pesado');
            this.newUser.patchValue({
               imagen: null
            });
            return;
         }

         this.imgLoaded = fileTo;
         this.newUser.patchValue({
            imagen: fileTo
         });
      }
   }

   deleteUser() {
      const values = this.editUser.value;

      this.UsuariosService.deleteUser(values.id).subscribe(
         resp => {
            $("#deleteUserModal").modal('hide');
            this.listaUser();
            this.alertService.msg("OK", "¡Éxito!", "Se ha elimino correctamente");
         },
         error => {
            this.alertService.msg("ERR", "Error", 'Algo salio mal');
         }
      )
   }
}
