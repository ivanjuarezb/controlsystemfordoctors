import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Patient } from 'src/app/models/patient';
import { PatientService } from 'src/app/services/patient.service';


@Component({
  selector: 'app-crear-paciente',
  templateUrl: './create-patient.component.html'
})
export class CreatePatientComponent implements OnInit {
  private _patientService:PatientService;
  public patient:Patient;
  private router:Router;
  public message:string;

  constructor(_patientService:PatientService, router:Router) {
    this._patientService = _patientService;
    this.patient = new Patient('', 'createPatient', '', '', '', '');
    this.router = router;
    this.message = '';
  }

  ngOnInit(): void {
    console.log('create-patient component charged correctly');
  }

  public createPatient(){
    this._patientService.createPatient(this.patient).subscribe(
      response=> {
        if(response['status'] == 'success'){
          this.message = response['message'];
          this.router.navigate(['patient-data']);
        }else if(response['status'] == 'error'){
          this.message = response['message'];
        }
      },
      error => {
        console.log(<any>error);
      }
    );
  }

}
