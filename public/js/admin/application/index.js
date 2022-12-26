async function findContent(id)
{   
    /* get content */
    let url = document.querySelector('meta[name="content_find"]')
    
    if(url){
        url = `${url.getAttribute('content')}/${id}`
        if(id){
            try {
                let result = await axios.get(url)
                let content = result.data.content 
                dataSliderContent(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)
    form.querySelector('input[name="name"]').setAttribute('value', content.name)
    form.querySelector('input[name="order"]').setAttribute('value', content.order)
}

let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "name"},
        { data: "image"},
        { data: "order"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});