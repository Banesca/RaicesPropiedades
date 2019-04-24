import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { NotificationappComponent } from './component/notificationapp/notificationapp.component';
import { AuthbackendComponent } from './component/authbackend/authbackend.component';
import { GestionUsuarioComponent } from './component/gestion-usuario/gestion-usuario.component';
import { ForgetComponent } from './component/forget/forget.component';
;
import { PerfilComponent } from './component/perfil/perfil.component';
import { ConfigFooterComponent } from './component/config-footer/config-footer.component';

import { ConfigColorComponent } from './component/config-color/config-color.component';

import { SuscripcionComponent } from './component/suscripcion/suscripcion.component';


import { RegistroComponent } from './component/registro/registro.component';
import { PageComponent } from './component/layout/page/page.component';
import { PrincipalComponent } from './component/layout/principal/principal.component';

import { AuthGuard } from './services/auth.guard';

const routes: Routes = [
  {
    path: '',
    component: PrincipalComponent,
    canLoad: [],
    children: [
      {path: '', redirectTo: 'perfil', pathMatch: 'full' },
     
      { path: 'gestionar-usuarios', component: GestionUsuarioComponent, canActivate: [AuthGuard] },
      { path: 'perfil', component: PerfilComponent, canActivate: [AuthGuard] },
      { path: 'config-footer', component: ConfigFooterComponent, canActivate: [AuthGuard] },
     
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

