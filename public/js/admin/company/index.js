let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/slider/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "content_1" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    form.querySelector('input[name="content_1"]').value = content.content_1
}

let tableFeatures = $('#page_table_features').DataTable({
    serverSide: true,
    ajax: `${root}/features`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

async function findFeature(id)
{   
    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                featureData(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function featureData(content)
{
    let form = document.getElementById('form-update-feature')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
}
