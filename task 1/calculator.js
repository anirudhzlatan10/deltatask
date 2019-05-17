let totcal = 0;
let totfat = 0;
let totcho = 0;
let spnumber = 0;
class Item {
  constructor(name, quantity, calories, fat, cholestrol) {
    this.name = name;
    this.quantity = quantity/100;
    this.calories = calories;
    this.fat = fat;
    this.cholestrol = cholestrol;
    this.inColumn = false;
  }
  get Name(){
    return this.name;
  }
  
function calcconsumed()  {
    return this.quantity*spnumber;
  }
}
var Items = [];
function buttonPress(){
  var name = document.getElementById("name").value;
  var quantity = document.getElementById("quantity").value;
  var fat = document.getElementById("fat").value;
  var calories = document.getElementById("calories").value;
  var cholestrol = document.getElementById("cholestrol").value;
  if(name == ""){
    name = "Food";
  }
  if(quantity <= 0 || fat <= 0 || calories <= 0 || cholestrol <= 0) {
    alert("Enter Values Greater Than Zero.");
  } else {
    Items.push(new Item(name, quantity, calories, fat, cholestrol));
    updateSite();
  }
  document.getElementById("name").value = '';
  document.getElementById("quantity").value = '';
  document.getElementById("fat").value = '';
  document.getElementById("calories").value = '';
  document.getElementById("cholestrol").value = '';
}

function updateSite() {
    var rightColumn = document.getElementById("rightColumn");
   
    for(j in Items) {
      var i = Items[j];
      spnumber=i.calories;
      totcal += calcconsumed();
      spnumber=i.fat;
      totfat += calcconsumed();
      spnumber=i.cholestrol;
      totcho += calcconsumed();
      if(i.inColumn === false) {
        var card = document.createElement("div");
        card.id = "card" + j;
        card.className = "card";
        var cardBody = document.createElement("div");
        cardBody.className = "card-body";
  
        var cardTitle = document.createElement("h5");
        cardTitle.className = "card-title";
        cardTitle.innerHTML = i.Name;
        var cardText = document.createElement("p");
        cardText.className = "card-text";
        cardText.innerHTML = i.totfat + "g of fat";
        cardText.innerHTML = i.totcal + "g of calories";
        cardText.innerHTML = i.totcho + "g of cholestrol";
  
        cardBody.appendChild(cardTitle);
        cardBody.appendChild(cardText);
        cardBody.appendChild(removeButton);
  
        card.appendChild(cardBody);
        rightColumn.appendChild(card);
  
        i.inColumn = true;
      }
    }
   
  }
