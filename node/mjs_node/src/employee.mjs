import Person from "./person.mjs";

class Employee extends Person{
    constructor(name="", age=20, employee_id= ""){
        super(name, age);
        this.employee_id = employee_id;
    }
    toJSON(){
        const {name, age, employee_id} = this;
        return{
            name, age, employee_id
        };
    }
}
export default Person;