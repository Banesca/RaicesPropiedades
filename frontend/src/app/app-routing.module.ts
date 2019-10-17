import {NgModule} from "@angular/core";
import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./page/home/home.component";
import {AboutComponent} from "./page/about/about.component";
import {PropiertysComponent} from "./page/propiertys/propiertys.component";
import {NopagefoundComponent} from "./page/nopagefound/nopagefound.component";

const routes: Routes = [
    {path: '', redirectTo: 'home', pathMatch: 'full'},
    {path: 'home', component: HomeComponent},
    {path: 'nosotros', component: AboutComponent},
    {path: 'oportunidades', component: PropiertysComponent},
    {
        path: 'buscador',
        loadChildren: './modules/blog/blog.module#BlogModule'
    },
    {
        path: 'sucursales',
        loadChildren: './modules/offices/offices.module#OfficesModule'
    },
    {path: '**', component: NopagefoundComponent}
];


@NgModule({
    imports: [RouterModule.forRoot(routes, {scrollPositionRestoration: 'top', useHash: true})],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
