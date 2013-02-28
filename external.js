function calculateCost(field, value) {
y = new Array(0)
var z = 0
var miles = 0
var class1 = 1
var germ = 4150
var ital = 4490
var swit = 4240
var fran = 3950
var aust = 4400
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


if (y.length = 3) {
	switch(y[0]+y[1]+y[2]) {
	  case "FRA":
	    miles = 4150*2;
	    return miles
	    break;
	  case "FLR":
	    miles = 4490*2;
	    return miles
	    break;
	  case "ZRH":
	    miles = 4240*2;
	    return miles
	    break;
	  case "CDG":
	    miles = 3950*2;
	    return miles
	    break;
	  case "SZG":
	    miles = 4400*2;
	    return miles
	    break;
	  default: return "Pick one or more countries."
	}
}	
if (y.length = 6) {
	return y[0]+y[1]+y[2]+y[3]+y[4]+y[5]
	/*
	switch(y[0]+y[1]+y[2]+y[3]+y[4]+y[5]) {
	  case "FRAFLR":
	    miles = germ + ital;
	    return miles
	    break;
	  case "FRAZRH":
	    miles = germ + swit;
	    return miles
	    break;
	  case "FRACDG":
	    miles = germ + fran;
	    return miles
	    break;
	  case "FRASZG":
	    miles = germ + aust;
	    return miles
	    break;
	  case "FLRZRH":
	    miles = ital + swit;
	    return miles
	    break;
	  case "FLRCDG":
	    miles = ital + fran;
	    return miles
	    break;
	  case "FLRSZG":
	    miles = ital + aust;
	    return miles
	    break;
	  case "ZRHCDG":
	    miles = swit + fran;
	    return miles
	    break;
	  case "ZRHSZG":
	    miles = swit + aust;
	    return miles
	    break;
	  case "CDGSZG":
	    miles = fran + aust;
	    return miles
	    break;
	  default: return "Pick one or more countries."
	}*/
}
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
