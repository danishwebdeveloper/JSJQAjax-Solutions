// 
var cli = document.getElementById('click');
cli.classList.add('random')

var para = document.getElementsByClassName('container');
// console.log(para)
para[0].classList.add('bg-primary')

para[1].classList.add('random')

para[1].classList.remove('random')

let elem = para[1].innerHTML;
let elem2 = para[0].innerText;
console.log(elem, elem2)


// I want to add some new element using createdElement

let tn = document.getElementsByTagName('div')
    // console.log(tn)
createdElement = document.createElement('p');
createdElement.innerText = "This is first created element";



tn[0].appendChild(createdElement);

createdElement2 = document.createElement('b');
createdElement2.innerText = "This is bold element!!";
tn[1].appendChild(createdElement2);

tn[0].replaceChild(createdElement2, createdElement);

// tn[1].replaceChild(createdElement2, createdElement)
// tn[1].classList.add('random');
// tn[1].classList.remove('random');

// tn[0].replaceChild(createdElement2, createdElement);


// tn[1].classList.remove('random')
// tn[1].replaceChild(createdElement2, createdElement);