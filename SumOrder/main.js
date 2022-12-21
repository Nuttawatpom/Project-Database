/*For-open-cart*/
$(document).on('click','#cart-icon',function(){
    $('.cart').addClass('cart-active')
})
/*Close Cart*/
$(document).on('click','#close-cart',function(){
    $('.cart').removeClass("cart-active")
})


// Cart Working JS
if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded',ready)
}else{
    ready();
}


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
