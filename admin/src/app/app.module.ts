import { BrowserModule } from '@angular/platform-browser';
import { NgModule,CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { ToastrModule } from 'ngx-toastr';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

//Social Login
import { SocialLoginModule, AuthServiceConfig } from "angularx-social-login";
import { FacebookLoginProvider } from "angularx-social-login";

// import {MatProgressSpinnerModule} from '@angular/material';
// import { UserIdleModule } from 'angular-user-idle';

//Pipes 
import { KeysPipe } from './pipes/keys.pipe';


import { AppComponent } from './app.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { MenuComponent } from './menu/menu.component';
import { SetingComponent } from './seting/seting.component';

import { NavUnoComponent } from './component/nav-uno/nav-uno.component';
import { NavDosComponent } from './component/nav-dos/nav-dos.component';

import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';


import { NotificationappComponent } from './component/notificationapp/notificationapp.component';
import { AuthbackendComponent } from './component/authbackend/authbackend.component';
import { GestionUsuarioComponent } from './component/gestion-usuario/gestion-usuario.component';
import { ForgetComponent } from './component/forget/forget.component';

import { NgxDatatableModule } from '@swimlane/ngx-datatable';

import { SuscripcionComponent } from './component/suscripcion/suscripcion.component';

import { PerfilComponent } from './component/perfil/perfil.component';
import { ConfigFooterComponent } from './component/config-footer/config-footer.component';

import { ConfigColorComponent } from './component/config-color/config-color.component';

import { RegistroComponent } from './component/registro/registro.component';
import { PageComponent } from './component/layout/page/page.component';
import { PrincipalComponent } from './component/layout/principal/principal.component';
import { AuthGuard } from './services/auth.guard';
import { MaterialUiModule } from './models/material/material-ui.module';




import { GooglePlaceModule } from "ngx-google-places-autocomplete";
import { NgSelectModule } from '@ng-select/ng-select';
import { MailsComponent } from './component/config-footer/mails/mails.component';
import { MailSuscribersComponent } from './component/mail-suscribers/mail-suscribers.component';
import { GestionPublicacionesComponent } from './component/gestion-publicaciones/gestion-publicaciones.component';
import { UsuariosComponent } from './component/usuarios/usuarios.component';
import { SucursalesComponent } from './component/sucursales/sucursales.component';
import { SuscribersComponent } from './component/suscribers/suscribers.component';
import { GaleriaHomeComponent } from './component/galeria-home/galeria-home.component';
import { TransaccionesComponent } from './component/transacciones/transacciones.component';
import { PublicacionesFacebookComponent } from './component/publicaciones-facebook/publicaciones-facebook.component';

let config = new AuthServiceConfig([
  {
    id: FacebookLoginProvider.PROVIDER_ID,
    provider: new FacebookLoginProvider("Facebook-App-Id")
  }
]);
 
export function provideConfig() {
  return config;
}

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    MenuComponent,
    SetingComponent,
    FooterComponent,
    NavUnoComponent,
    NavDosComponent,
    KeysPipe,
    NotificationappComponent,
    AuthbackendComponent,
    GestionUsuarioComponent,
    ForgetComponent,
    GestionPublicacionesComponent,
    SuscripcionComponent,
    
    SuscripcionComponent,
 
    PerfilComponent,
    ConfigFooterComponent,

    ConfigColorComponent,

    RegistroComponent,
    PageComponent,
    PrincipalComponent,
    MailsComponent,
    MailSuscribersComponent,
    UsuariosComponent,
    SucursalesComponent,
    SuscribersComponent,
    GaleriaHomeComponent,
    TransaccionesComponent,
    PublicacionesFacebookComponent,  

  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    ToastrModule.forRoot(),
    NgxDatatableModule,
    MaterialUiModule,
    GooglePlaceModule,
    NgSelectModule,
    SocialLoginModule
  ],
  providers: [
    AuthGuard,
    {
      provide: AuthServiceConfig,
      useFactory: provideConfig
    }
  ],
  bootstrap: [AppComponent],
  schemas: [
    CUSTOM_ELEMENTS_SCHEMA
  ],
})
export class AppModule { }
