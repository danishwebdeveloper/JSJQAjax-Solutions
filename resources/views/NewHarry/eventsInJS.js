// Events is JS
function clickedBtn() {
    console.log('clicked through inisde onClick method!!')
}

click.addEventListener('click', function() {
    console.log('clicked on addEventListener')
});

// firstcontainer.addEventListener('mouseover', function() {
//     console.log('Mouseover function is working!');
// });

// firstcontainer.addEventListener('click', function() {
//     console.log('This is clicked and Inner text is Changed');
//     // document.getElementById('firstcontainer').innerText = "Show on Clicked";
//     document.querySelectorAll('.container')[1].innerHTML = "<b>Display New Text on second container</b>";
// });

// para.addEventListener('click', function() {
//     document.querySelectorAll('.container')[1].innerHTML = "Simple Text Came again!";
// });



// MouseUP and MouseDown

// let preHtml = document.querySelectorAll('.container')[0].innerHTML;

// firstcontainer.addEventListener('mouseup', function() {
//     document.querySelectorAll('.container')[0].innerHTML = preHtml;
// });

// firstcontainer.addEventListener('mousedown', function() {
//     document.querySelectorAll('.container')[0].innerHTML = "After the mouse up";
// });


// settimeout(kitna secinds k baad run krna chhata) and setinterval(continously hota raha ga!)

// setTimeout(() => {
//     console.log('after 5 seconds')
// }, 5000);

// logkaro = () => {
//         console.log('Log Karoo!!')
//     }
// setTimeout(logkaro, 3000);

// let cc = setInterval(logkaro, 3000);
// Should perform clearInterval in console to stop this!
// clearInterval(cc);