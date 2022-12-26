let section1 = document.querySelector('#section1')
let section2 = document.querySelector('#section2')
let buttonS1 = section1.querySelector('#btnS1')
let buttonS2 = document.querySelector('#btnS2')

buttonS1.addEventListener('click', function(e){
    
    e.preventDefault()

    let inputs = section1.querySelectorAll('input')
    inputs = Object.values(inputs).filter( element => {
        if (element.value.length) { return element }
    })

    if(inputs.length < 4)
    {
        buttonS1.textContent = 'Todos los campos son obligatorios'
        buttonS1.classList.remove('ficha-tecnica')
        buttonS1.classList.add('btn-danger')
        setTimeout(() => {
            buttonS1.textContent = 'Siguiente'
            buttonS1.classList.remove('btn-danger')
            buttonS1.classList.add('ficha-tecnica')
        }, 1000);
    }else{
        section1.classList.remove('d-block')
        section1.classList.add('d-none')
        section2.classList.remove('d-none')
        section2.classList.add('d-block')
    }
})

buttonS2.addEventListener('click', function(e){
    e.preventDefault()
    section2.classList.remove('d-block')
    section2.classList.add('d-none')
    section1.classList.remove('d-none')
    section1.classList.add('d-block')
})