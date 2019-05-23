var height = 0;
var weight = 0;
var age = 0;
var bmr=0;

class Item
{

constructor(height,weight,age)
    {   this.height = height;
        this.weight = weight;
        this.age = age;
        this.bmr=10*this.weight+6.25*this.height-5*this.age+5;
   
        this.inColumn = false;
    }

}
var Items = [];

function buttonPress(){
var age = document.getElementById("age").value;
var height = document.getElementById("height").value;
var weight = document.getElementById("weight").value;


if(age <= 0 || height <= 0 || weight <= 0 ) {
    alert("Enter Values Greater Than Zero.");
} 
else {
    Items.push(new Item(height, weight, age));
    updateSite();
}

document.getElementById("height").value = '';
document.getElementById("weight").value = '';
document.getElementById("age").value = '';

}

function updateSite() {
    var rightColumn = document.getElementById("rightColumn");

    for(j in Item) {
    var i = Items[j];
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