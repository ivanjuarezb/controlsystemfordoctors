import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Patient } from 'src/app/models/patient';
import { History } from 'src/app/models/history';

@Injectable({
  providedIn: 'root'
})
export class PatientService {
  private _http:HttpClient;
  private url:string;

  constructor(_http:HttpClient){
    this._http = _http;
    this.url = 'http://medicalcenter.devel';
  }
  
  //Create patients
  public createPatient(patient:Patient): Observable<any> {
    let json = 'json=' + JSON.stringify(patient);
    let headers:HttpHeaders = new HttpHeaders().set("content-type",'application/x-www-form-urlencoded');
    return this._http.post(this.url,json, {headers:headers});
  }

  //Get patients
  public getPatients(search:string): Observable<any>{
    let headers:HttpHeaders = new HttpHeaders().set("content-type",'application/x-www-form-urlencoded') ;
    return this._http.get(this.url+'/?method=getPatients'+'&search='+search, {headers:headers});
  }

  public updatePatient(patient:Patient): Observable<any>{
    let json = 'json='+JSON.stringify(patient);
    let headers:HttpHeaders = new HttpHeaders().set("content-type",'application/x-www-form-urlencoded');
    return this._http.post(this.url, json, {headers:headers});
  }

  public deletePatient(id:string){
    let headers:HttpHeaders = new HttpHeaders().set("content-type",'application/x-www-form-urlencoded');
    return this._http.get(this.url+'/?method=deletePatient&id='+id, {headers:headers});
  }

  /*Create patient history
  public createPatientHistory(history:History): Observable<any> {
    let json = 'json=' + JSON.stringify(history);
    let headers:HttpHeaders = new HttpHeaders().set("content-type",'application/x-www-form-urlencoded');
    return this._http.post(this.url,json, {headers:headers});
  }*/
}
