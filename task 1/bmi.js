let height = 0;
let weight = 0;
let age = 0;
let bmr = 0;
let gender = document.getElementById("myInput").value;
class parameter
{

constructor(height,weight,age)
    {this.height = height;
        this.weight = weight;
        this.age = age;
        
    }
if (gender='male') 
    { 
        bmr= 10*this.weight+6.25*this.height-5*this.age+5;
    }
if(gender='female'){
    bmr= 10*this.weight+6.25*this.height-5*this.age-161;
    }
}
 
console.log(bmr);
