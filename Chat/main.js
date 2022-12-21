//Making Function
function ready(){
    //Remove Items From Cart
    var removeCartButtons = document.getElementsByClassName('cart-remove')
    console.log(removeCartButtons);
    for(var i = 0; i < removeCartButtons.lenght; i++){
        var button = removeCartButtons[i]
        button.addEventListener('click',removeCartItem)
    }
}

//Remove Items From Cart
function removeCartItem(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove()

}

const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");

const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
});

optionsList.forEach(o => {
    o.addEventListener("click", () => {
      selected.innerHTML = o.querySelector("label").innerHTML;
      o.querySelector("input").checked = true;
      optionsContainer.classList.remove("active");
    });
  });