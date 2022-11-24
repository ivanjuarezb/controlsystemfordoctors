import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Patient } from 'src/app/models/patient';
import { PatientService } from 'src/app/services/patient.service';

@Component({
  selector: 'app-edit-patient',
  templateUrl: './edit-patient.component.html'
})
export class EditPatientComponent implements OnInit {
  public patient:Patient;
  private _route:ActivatedRoute;
  private _router:Router;
  private _patientService:PatientService;
  public message:string;
  constructor(_route:ActivatedRoute, _patientService:PatientService, _router:Router) {
    this._route = _route;
    this._router = _router;
    this._patientService = _patientService;
    this.patient = new Patient('', '', '', '', '', '');
    this.message = '';
  }

  ngOnInit(): void {
    this.getPatientUrl();
  }
  
  private getPatientUrl(){
    this._route.params.subscribe(
      params => {
        this.patient.id = params['id'];
        this.patient.method = 'updatePatient';
        this.patient.name = params['name'];
        this.patient.age = params['age'];
        this.patient.telephone = params['telephone'];
        this.patient.address = params['address'];
      }
    );
  }
  
  public updatePatient(){
    this._patientService.updatePatient(this.patient).subscribe(
      response => {
        this.message = response['message'];
        this._router.navigate(['patient-data']);
      }, error => {
        console.log(<any>error)
      }
    );
  }

}
