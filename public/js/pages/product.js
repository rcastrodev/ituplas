function addVariableProduct(e)
{
    e.preventDefault()
    let btn = e.target
    
    if(! btn.classList.contains('addVP')) 
        return undefined

    let obj = {
        id:             btn.dataset.id,
        image:          btn.dataset.image,
        code:           btn.dataset.code,
        name:           btn.dataset.name,
        description:    btn.dataset.description
    }

    axios.post(btn.dataset.url, obj)
    .then(response => {
        btn.textContent = 'Agregado'
    })
    .catch(error =>{
        console.error(error)
        btn.textContent = 'Error'
        setTimeout(() => {
            btn.textContent = 'cotizar'
        }, 1000);
    })
}

let table = document.getElementById('tableVP')

if (table) 
    table.addEventListener('click', addVariableProduct)

$('.toggle').click(function(e){
    e.preventDefault()
    $(this).siblings('ul').toggle();
})