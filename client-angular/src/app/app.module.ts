import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './modules/header/header.component';
import { CrearPacienteComponent } from './modules/crear-paciente/crear-paciente.component';
import { DatosPacienteComponent } from './modules/datos-paciente/datos-paciente.component';
import { NuevoHistorialComponent } from './modules/nuevo-historial/nuevo-historial.component';
import { HistorialPacienteComponent } from './modules/historial-paciente/historial-paciente.component';
import { ExpedienteComponent } from './modules/expediente/expediente.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    CrearPacienteComponent,
    DatosPacienteComponent,
    NuevoHistorialComponent,
    HistorialPacienteComponent,
    ExpedienteComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
