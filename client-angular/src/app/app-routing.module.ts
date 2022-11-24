import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CreatePatientComponent } from './components/create-patient/create-patient.component';
import { PatientDataComponent } from './components/patient-data/patient-data.component';
import { EditPatientComponent } from './components/edit-patient/edit-patient.component';
import { PatientHistoryComponent } from './components/patient-history/patient-history.component';
import { NewHistoryComponent } from './components/new-history/new-history.component';

const routes: Routes = [
  { path: 'create-patient',     component: CreatePatientComponent },
  { path: 'patient-data',     component: PatientDataComponent },
  { path: 'patient-history', component: PatientHistoryComponent },
  { path: 'new-history/:id/:name',    component: NewHistoryComponent },
  { path: 'edit-patient/:id/:name/:age/:telephone/:address',    component: EditPatientComponent},
  { path: '**', redirectTo: 'patient-data' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, { relativeLinkResolution: 'legacy' })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
