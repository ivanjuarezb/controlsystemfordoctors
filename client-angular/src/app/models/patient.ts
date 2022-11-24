export class Patient{
    public id:string;
    public method:string;
    public name:string;
    public age:string;
    public telephone:string;
    public address:string;

    constructor(id:string , method:string, name:string, age:string, telephone:string, address:string){
        this.id = id;
        this.method = method;
        this.name = name;
        this.age = age;
        this.telephone = telephone;
        this.address = address;
    }
}