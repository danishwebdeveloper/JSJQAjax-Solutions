// 
// Here we will take the JSON and convert it to the JSON string after that we
// will take that string and again manipulate them and convert JSON String to the Object

let JsonObj = { name: "Danish", length: 1, a: { this: 'that' } }
console.log(JsonObj); // They conisdered that it's an object, but we need JSON string, So

let jsonString = JSON.stringify(JsonObj); // It's converted to JsonString
console.log(jsonString)

// Now again convert json string into onject
// let stringObj =  // it's not the same as above Obj, here it's sting and above one is Json obj
let stringToObj = JSON.parse(`{"name": "Danish", "length": 1, "a": { "this": "that" } }`);
console.log(stringToObj) //same result as in JsonObj , becasue string again converted it back to Json Obj