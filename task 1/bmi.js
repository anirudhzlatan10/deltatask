let height = 0;
let weight = 0;
let age = 0;
let bmr=0;
let _gender = '';
class Item
{

constructor(_gender,height,weight,age)
    {   this.height = height;
        this.weight = weight;
        this.age = age;
        this.bmr=10*this.weight+6.25*this.height-5*this.age+5;
        this._gender = 'male';
        this.inColumn = false;
    }

}
var Items = [];

function buttonPressb(){
var age = document.getElementById("age").value;
var height = document.getElementById("height").value;
var weight = document.getElementById("weight").value;


if(age <= 0 || height <= 0 || weight <= 0 ) {
    alert("Enter Values Greater Than Zero.");
} 
else {
    Items.push(new Item(_gender, height, weight, age));
    updateSiteb();
}
document.getElementById("_gender").value = '';
document.getElementById("height").value = '';
document.getElementById("weight").value = '';
document.getElementById("age").value = '';

}

function updateSiteb() {
    var rightColumn = document.getElementById("rightColumn");

    for(j in Item) {
    var i = Item[j];
    if(i.inColumn === false) {
        var card = document.createElement("div");
        card.id = "card" + j;
        card.className = "card";
        var cardBody = document.createElement("div");
        cardBody.className = "card-body";
        console.log(bmr);
        var cardText = document.createElement("p");
        cardText.className = "card-text";
        cardText.innerHTML = " BMR = " + i.bmr ;
        cardBody.appendChild(cardText);
        card.appendChild(cardBody);
        rightColumn.appendChild(card);
        i.inColumn = true;
        } 
    }
}