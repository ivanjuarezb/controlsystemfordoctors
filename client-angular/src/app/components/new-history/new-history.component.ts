import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { History } from 'src/app/models/history';
import { Patient } from 'src/app/models/patient';
import { PatientService } from 'src/app/services/patient.service';

@Component({
  selector: 'app-new-history',
  templateUrl: './new-history.component.html'
})
export class NewHistoryComponent implements OnInit {

  private dateObject:Date;
  private _patientService:PatientService;
  private _route:ActivatedRoute;
  public date:string;
  public history:History;
  public patients:Array<Patient>;
  public search:string;
  public flag:boolean;
  public idPatient:string;
  public namePatient:string;



  constructor(_patientService:PatientService, _route:ActivatedRoute) {
    this.dateObject = new Date();
    this.date = this.dateObject.getDate() + '-' + (this.dateObject.getMonth() + 1) + '-' + this.dateObject.getFullYear()
    this.history = new History('', '', '', '', '', '', '', '', '', '', '', '', '', '');
    this.patients = null;
    this._patientService = _patientService;
    this._route = _route;
    this.flag = false;
    this.search = '';
    this.idPatient = '';
    this.namePatient = '';
  }

  ngOnInit(): void {
    console.log('new-history component charged correctly');
    this.getPatientUrl();
  }

  private getPatientUrl(){
    this._route.params.subscribe(
      params => {
        if(Number(params['id']) && params['name'] != null){
          this.flag = true;
          this.idPatient = params['id'];
          this.namePatient = params['name'];
        }
      }
    );
  }
  
  public getPatients(){
    this._patientService.getPatients(this.search).subscribe( response => {
        this.patients = response.patients;
        console.log(this.search);
        console.log(this.patients);
      }, error => {
        console.log(<any>error);
      }
    );
  }

}
  