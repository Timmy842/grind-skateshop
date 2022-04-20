function decrement()
{
    const target = document.getElementById('cantidad');
    let value = Number(target.value);

    value--;

    if(value < 1)
        value = 1

    target.value = value;
}

function increment()
{
    const target = document.getElementById('cantidad');
    let value = Number(target.value);
    
    value++;
    
    target.value = value;
}

const decrementButtons = document.querySelectorAll(`button[data-action="decrement"]`);

const incrementButtons = document.querySelectorAll(`button[data-action="increment"]`);

decrementButtons.forEach( btn => {
    
    btn.addEventListener("click", decrement);

});

incrementButtons.forEach( btn => {
    
    btn.addEventListener("click", increment);
    
});
