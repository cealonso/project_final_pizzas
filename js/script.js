
/*
var countButtons = document.querySelectorAll("button").length;

for (var i = 0; i < countButtons; i++) {
  document
    .querySelectorAll("button")
    [i].addEventListener("click", showValue);
}

function showValue() {
  console.log(this.value);
}

*/

const btns = document.querySelectorAll('button');
for (const btn of btns) {
  btn.addEventListener("click", showValue);
}


function showValue() {
    console.log(this.value);
  }