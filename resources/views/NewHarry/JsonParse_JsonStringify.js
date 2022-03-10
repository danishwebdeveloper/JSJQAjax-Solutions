let jsonObj = {
    name: "Danish",
    class: 12,
    section: "Yellow",
    purchaseDate: new Date(),
    getModel: function() {
        return true;
    },
}

// console.log(typeof jsonObj); // it's an object -- So we can't manipulate them 
// convert it into the string to update or server /local storage
// jsonObj.getModel = jsonObj.getModel.toString(); // now function is converted into the string, now apply stringify
// const jsonObjToString = JSON.stringify(jsonObj);
// console.log(jsonObjToString); // conveted into the json String -- Date also coverted into string but function is not working anymore, so for fucntion


// change that string into the json Object
// const jsonStringToObject = JSON.parse(jsonObjToString);
// console.log(typeof jsonStringToObject) // again converted into json Object

// console.log(jsonStringToObject) // at that stage consider the date as an string, so for the date
// jsonStringToObject.purchaseDate = new Date(jsonStringToObject.purchaseDate); // for date we will do that now date is coverted to object
// console.log(jsonStringToObject) // now here the date is converted into the Json Object

// function is still in string , so for the fucntion converstion into the JSON Object 
// jsonStringToObject.getModel = eval("(" + jsonStringToObject.getModel + ")");
// console.log(jsonStringToObject) // now here our fucntion is converted in into the JSON Object


//----------------------------------------------------------------------- TO Local Storage

//to let's store the data on localstorage
jsonObj.getModel = jsonObj.getModel.toString();
let objToString = JSON.stringify(jsonObj);
// localStorage.setItem("Hicc", objToString);

// let getFetach = localStorage.getItem('Hicc');
// console.log(getFetach);

// for the function 
// first we need to convert it into the string, we did already now time take it's object and convert it itno the object using the eval
// 
let jsobStringIntoObj = JSON.parse(objToString);
jsobStringIntoObj.getModel = eval("(" + jsobStringIntoObj.getModel + ")");
console.log(jsobStringIntoObj)