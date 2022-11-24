import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { HttpClientModule } from '@angular/common/http';
import { AppComponent } from './app.component';
import { CreatePatientComponent } from './components/create-patient/create-patient.component';
import { NewHistoryComponent } from './components/new-history/new-history.component';
import { PatientHistoryComponent } from './components/patient-history/patient-history.component';
import { ExpedienteComponent } from './components/expediente/expediente.component';
import { EditPatientComponent } from './components/edit-patient/edit-patient.component';
import { PatientDataComponent } from './components/patient-data/patient-data.component';



@NgModule({
  declarations: [
    AppComponent,
    CreatePatientComponent,
    EditPatientComponent,
    PatientDataComponent,
    NewHistoryComponent,
    ExpedienteComponent,
    PatientHistoryComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
