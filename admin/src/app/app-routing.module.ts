import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { NotificationappComponent } from './component/notificationapp/notificationapp.component';
import { AuthbackendComponent } from './component/authbackend/authbackend.component';
import { UsuariosComponent } from './component/usuarios/usuarios.component';
import { ForgetComponent } from './component/forget/forget.component';
import { PerfilComponent } from './component/perfil/perfil.component';
import { ConfigFooterComponent } from './component/config-footer/config-footer.component';
import { MailSuscribersComponent } from './component/mail-suscribers/mail-suscribers.component';

import { ConfigColorComponent } from './component/config-color/config-color.component';

import { SuscripcionComponent } from './component/suscripcion/suscripcion.component';

import { GestionPublicacionesComponent } from './component/gestion-publicaciones/gestion-publicaciones.component';



import { RegistroComponent } from './component/registro/registro.component';
import { PageComponent } from './component/layout/page/page.component';
import { PrincipalComponent } from './component/layout/principal/principal.component';

import { SucursalesComponent } from './component/sucursales/sucursales.component';


import { AuthGuard } from './services/auth.guard';

const routes: Routes = [
  {
    path: '',
    component: PrincipalComponent,
    canLoad: [],
    children: [
      {path: '', redirectTo: 'perfil', pathMatch: 'full' },
     
      { path: 'gestionar-usuarios', component: UsuariosComponent, canActivate: [AuthGuard] },
      { path: 'gestionar-publicaciones', component: GestionPublicacionesComponent, canActivate: [AuthGuard] },
      { path: 'mail-suscribers', component: MailSuscribersComponent, canActivate: [AuthGuard] },
      { path: 'perfil', component: PerfilComponent, canActivate: [AuthGuard] },
      { path: 'config-footer', component: ConfigFooterComponent, canActivate: [AuthGuard] },
      
      { path: 'sucursales', component: SucursalesComponent, canActivate: [AuthGuard] },

     
      { path: 'config-color', component: ConfigColorComponent, canActivate: [AuthGuard] },
      
    ]
  }, 
  { path: '', redirectTo: 'login', pathMatch: 'full' },
  {
    path: '',
    component: PageComponent,
    children: [
      { path: 'registro', component: RegistroComponent },
      { path: 'login', component: AuthbackendComponent }
    ]
  }  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

