import { Component, OnInit } from '@angular/core';
import { PatientService } from 'src/app/services/patient.service';
import { Patient } from 'src/app/models/patient';

@Component({
  selector: 'app-datos-paciente',
  templateUrl: './patient-data.component.html'
})
export class PatientDataComponent implements OnInit {
  private _patientService:PatientService;
  public patients:Array<Patient>;
  public message:string;
  public search:string;

  constructor(_patientService:PatientService) { 
    this._patientService = _patientService;
    this.patients = [new Patient('', '', '', '', '', '')];
    this.message = '';
    this.search = '';
  }

  ngOnInit(): void {
    console.log('patient-data component charged correctly')
    this.getPatients();
  }

  public getPatients(){
    this._patientService.getPatients(this.search).subscribe(
      response => {
        this.patients = response['patients'];
        this.message = response['message'];
      },
      error => {
        console.log(<any>error);
      }
    );
  }

  public deletePatient(id:string){
    this._patientService.deletePatient(id).subscribe(
      response => {
        this.message = response['message'];
        this.getPatients();
      }, 
      error => {
        console.log(<any>error);
      }
    );
  }
}
