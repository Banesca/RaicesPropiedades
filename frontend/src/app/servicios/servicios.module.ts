import { NgModule, APP_INITIALIZER } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HttpClientModule } from '@angular/common/http';

import {
  AuthService,
  ArticuloService,
  CategoriaService,
  ContactoService,
  ImagenService,
  SuscripcionService,
  ConfigService,
  ConfiguracionGeneralService,
  SucursalesService,
  UrlGuard
} from './servicios.index';

export function configProviderFactoryStatic(pConfig: ConfigService) {
  return () => pConfig.loadAppConfigStatic();
}

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    HttpClientModule
  ],
  providers: [
    ConfigService,
    {
      provide: APP_INITIALIZER,
      useFactory: configProviderFactoryStatic,
      deps: [ConfigService],
      multi: true
    },
    ArticuloService,
    CategoriaService,
      ContactoService,
    ImagenService,
    SuscripcionService,
    UrlGuard,
    AuthService,
    ConfiguracionGeneralService,
    SucursalesService
  ]
})
export class ServiciosModule { }
