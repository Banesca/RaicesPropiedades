import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {AuthbackendComponent} from './component/authbackend/authbackend.component';
import {ConfigColorComponent} from './component/config-color/config-color.component';
import {ConfigFooterComponent} from './component/config-footer/config-footer.component';
import {FichaComponent} from './component/ficha/ficha.component';
import {GaleriaHomeComponent} from './component/galeria-home/galeria-home.component';
import {PageComponent} from './component/layout/page/page.component';
import {PrincipalComponent} from './component/layout/principal/principal.component';
import {MailSuscribersComponent} from './component/mail-suscribers/mail-suscribers.component';
import {ModulosComponent} from './component/modulos/modulos.component';
import {PerfilComponent} from './component/perfil/perfil.component';
import {RegistroComponent} from './component/registro/registro.component';
import {SucursalesComponent} from './component/sucursales/sucursales.component';
import {SuscribersComponent} from './component/suscribers/suscribers.component';
import {TransaccionesComponent} from './component/transacciones/transacciones.component';
import {UsuariosComponent} from './component/usuarios/usuarios.component';
import {AuthGuard} from './guards/auth.guard';
import {RandomGuard} from './guards/random.guard';
import { GaleriaClientesComponent } from './component/galeria-clientes/galeria-clientes.component';
//import { PublicacionesFacebookComponent } from './component/publicaciones-facebook/publicaciones-facebook.component';
//import { GestionPublicacionesComponent } from './component/gestion-publicaciones/gestion-publicaciones.component';

const routes: Routes = [
   {
      path: '',
      component: PrincipalComponent,
      canActivate: [RandomGuard],
      canLoad: [RandomGuard],
      children: [
         { path: '', redirectTo: 'perfil', pathMatch: 'full' },
         { path: 'gestionar-usuarios', component: UsuariosComponent, canActivate: [RandomGuard] },
         { path: 'galeria-home', component: GaleriaHomeComponent, canActivate: [RandomGuard] },
         { path: 'galeria-clientes', component: GaleriaClientesComponent, canActivate: [RandomGuard] },
         // { path: 'gestionar-publicaciones', component: GestionPublicacionesComponent, canActivate: [RandomGuard] },
         //{ path: 'publicaciones-facebook', component: PublicacionesFacebookComponent, canActivate: [RandomGuard] },
         { path: 'mail-suscribers', component: MailSuscribersComponent, canActivate: [RandomGuard] },
         { path: 'perfil', component: PerfilComponent, canActivate: [RandomGuard] },
         { path: 'config-footer', component: ConfigFooterComponent, canActivate: [RandomGuard] },
         { path: 'ficha', component: FichaComponent, canActivate: [RandomGuard] },
         { path: 'sucursales', component: SucursalesComponent, canActivate: [RandomGuard] },
         { path: 'suscribers', component: SuscribersComponent, canActivate: [RandomGuard] },
         { path: 'tasaciones', component: TransaccionesComponent, canActivate: [RandomGuard] },
         { path: 'modulos', component: ModulosComponent, canActivate: [RandomGuard] },
         { path: 'config-color', component: ConfigColorComponent, canActivate: [RandomGuard] },
         {
            path: 'gestionar-publicaciones',
            loadChildren: './presentation/publication-management/publication-management.module#PublicationManagementModule'
         }

      ]
   },
   { path: '', redirectTo: 'login', pathMatch: 'full' },
   {
      path: '',
      component: PageComponent,
      canActivate: [AuthGuard],
      children: [
         { path: 'registro', component: RegistroComponent },
         { path: 'login', component: AuthbackendComponent }
      ]
   }
];

@NgModule({
   imports: [RouterModule.forRoot(routes, { useHash: true })],
   exports: [RouterModule]
})
export class AppRoutingModule { }
