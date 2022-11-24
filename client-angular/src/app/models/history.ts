export class History {
    public id:string;
    public id_patient:string;
    public job:string;
    public weight:string;
    public height:string;
    public temperature:string;
    public heart_rate:string;
    public family_history:string;
    public pathological_personal_history:string;
    public non_pathological_personal_history:string;
    public allergies:string;
    public date:string;
    public next_appointment:string;
    public treatment:string;

    constructor(id:string, id_patient:string, job:string, weight:string, height:string, temperature:string, heart_rate:string, family_history:string, pathological_personal_history:string, non_pathological_personal_history:string, allergies:string, date:string, next_appointment:string, treatment:string){
        this.id = id;
        this.id_patient = id_patient;
        this.job = job;
        this.weight = weight;
        this.height = height;
        this.temperature = temperature;
        this.heart_rate = heart_rate;
        this.family_history = family_history;
        this.pathological_personal_history = pathological_personal_history;
        this.non_pathological_personal_history = non_pathological_personal_history;
        this.allergies = allergies;
        this.date = date;
        this.next_appointment = next_appointment;
        this.treatment = treatment;
    }
}