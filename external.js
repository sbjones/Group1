function calculateCost(field, btn) {
y = new Array(0)
var miles = 0
var germ = 4150
var ital = 4490
var swit = 4240
var fran = 3950
var aust = 4400
var class1 = 1
var permile = 0.17
var cost
// Add values of fields to new array 'y'
//for x in field {
//  y.length = counter+1;
//  y += field[counter];
//  counter += 1;
//}

//var myStringArray = ["Hello","World"];
for (var i = 0; i < field.length; i++) {
    if (field[i].checked == true) {
    //alert(field[i].value);
    y += field[i].value
    }
}

if (btn[0].checked == true) {
	class1 = 1.7
}
else if (btn[1].checked == true) {
	class1 = 1.4
}
else if (btn[2].checked == true) {
	// do nothing
}

if (y.length == 3) {
	switch(y[0]+y[1]+y[2]) {
	  case "FRA":
	    miles = germ*2
	    break;
	  case "FLR":
	    miles = ital*2
	    break;
	  case "ZRH":
	    miles = swit*2
	    break;
	  case "CDG":
	    miles = fran*2
	    break;
	  case "SZG":
	    miles = aust*2
	    break;
	  default: return "Pick one or more countries."
	} 
}	
if (y.length == 6) {
	switch(y[0]+y[1]+y[2]+y[3]+y[4]+y[5]) {
	  case "FRAFLR":
	    miles = germ + ital
	    break;
	  case "FRAZRH":
	    miles = germ + swit
	    break;
	  case "FRACDG":
	    miles = germ + fran
	    break;
	  case "FRASZG":
	    miles = germ + aust
	    break;
	  case "FLRZRH":
	    miles = ital + swit
	    break;
	  case "FLRCDG":
	    miles = ital + fran
	    break;
	  case "FLRSZG":
	    miles = ital + aust
	    break;
	  case "ZRHCDG":
	    miles = swit + fran
	    break;
	  case "ZRHSZG":
	    miles = swit + aust
	    break;
	  case "CDGSZG":
	    miles = fran + aust
	    break;
	  default: return "Pick one or more countries."
	}
}	
if (y.length == 9) {
	switch(y[0]+y[1]+y[2]+y[3]+y[4]+y[5]+y[6]+y[7]+y[8]) {
	  case "FRAFLRZRH":
	    miles = germ + swit
	    break;
	  case "FRAFLRCDG":
	    miles = germ + fran
	    break;
	  case "FRAFLRSZG":
	    miles = germ + aust
	    break;
	  case "FRAZRHCDG":
	    miles = germ + fran
	    break;
	  case "FRAZRHSZG":
	    miles = germ + aust
	    break;
	  case "FRACDGSZG":
	    miles = germ + aust
	    break;
	  case "FLRZRHCDG":
	    miles = ital + fran
	    break;
	  case "FLRZRHSZG":
	    miles = ital + aust
	    break;
	  case "FLRCDGSZG":
	    miles = ital + aust
	    break;
	  case "ZRHCDGSZG":
	    miles = swit + aust
	    break;
	  default: return "Pick one or more countries."
	}
}	
if (y.length == 12) {
	switch(y[0]+y[1]+y[2]+y[3]+y[4]+y[5]+y[6]+y[7]+y[8]+y[9]+y[10]+y[11]) {
	  case "FRAFLRZRHCDG":
	    miles = germ + fran
	    break;
	  case "FRAFLRZRHSZG":
	    miles = germ + aust
	    break;
	  case "FRAFLRCDGSZG":
	    miles = germ + aust
	    break;
	  case "FRAZRHCDGSZG":
	    miles = germ + aust
	    break;
	  case "FLRZRHCDGSZG":
	    miles = ital + aust
	    break;
	  default: return "Pick one or more countries."
	}
}	
if (y.length == 15) {
	switch(y[0]+y[1]+y[2]+y[3]+y[4]+y[5]+y[6]+y[7]+y[8]+y[9]+y[10]+y[11]+y[12]+y[13]+y[14]) {
	  case "FRAFLRZRHCDGSZG":
	    miles = germ + aust
	    break;
	  default: return "Pick one or more countries."
	}
}	
cost = (miles * permile) * class1
cost = cost.toFixed(2);
result = cost.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
return "$" + result
//var y = ['Germany', 'Italy', 'Switzerland', 'France', 'Austria']
//z = new Array(2)
//var num_of_checked = 0
//if (field[0].checked == true && value[0].checked == true) {
// return 'Germany, First' }
//else if (field[0].checked == true && value[1].checked == true) {
// return 'Germany, Premium Econ' }
//do
//{
//if (field[x].checked == true) {
// z
// z[x] += y[x];
 //num_of_checked += 1;
// }
//x += 1;
//}
//while (x < 5)

//var u = z.slice(0, 1);
//var v = z.slice(-1);
//var w = u.concat(v);
//switch (num_of_checked) {
//	case 1:
//	  return 'You chose one country'
//	  break;
//	case 2:
//	  return 'You chose two countries'
//	  break;
//	case 3:
//	  return 'you picked three'
//	  break;
//	case 4:
//	  return 'you picked four'
//	  break;
//	case 5:
//	  return 'you picked five'
//	  break;
//	default: return 'You didnt pick any countries!'
//	}

}
