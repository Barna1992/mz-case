// initialization
function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}

let date = `${pad($('select[name=exp-day]').val())}-${$('select[name=exp-month]').val()}-${$('select[name=exp-year]').val()}`
$('#dob_ReadOnly').val(date);
let type_house = $('select[name=type_house]');
$('#type_ReadOnly').val(type_house.val())

// update resume on change
$('input#first_name').change( (e) => {
    $('#first_name_ReadOnly').val($(e.target).val())
})
$('input#last_name').change( (e) => {
    $('#last_name_ReadOnly').val($(e.target).val())
})
$('input#telephone').change( (e) => {
    $('#telephone_ReadOnly').val($(e.target).val())
})
$('input#email').change( (e) => {
    $('#email_ReadOnly').val($(e.target).val())
})
$('.dob select').change( () => {
    let date = `${$('select[name=exp-day]').val()} ${$('select[name=exp-month]').val()} ${$('select[name=exp-year]').val()}`
    $('#dob_ReadOnly').val(date);
})
type_house.change( (e) => {
    $('#type_ReadOnly').val($(e.target).val())
})
$('input#rif_num_inviato').change( (e) => {
    $('#rif_num_inviato_ReadOnly').val($(e.target).val())
})
$('input#rif_num_visitato').change( (e) => {
    $('#rif_num_visitato_ReadOnly').val($(e.target).val())
})

$('input#prezzo').change( (e) => {
    $('#prezzo_ReadOnly').val($(e.target).val())
})
// $('input#provvigione').change( (e) => {
//     $('#provvigione_ReadOnly').val($(e.target).val())
// })
// $('select[name=locali]').change( (e) => {
//     $('#locali_ReadOnly').val($(e.target).val())
// })
$('select[name=camere]').change( (e) => {
    $('#camere_ReadOnly').val($(e.target).val())
})
$('select[name=bagni]').change( (e) => {
    $('#bagni_ReadOnly').val($(e.target).val())
})
// $('select[name=arredamento]').change( (e) => {
//     $('#arredamento_ReadOnly').val($(e.target).val())
// })
// $('select[name=classe_energetica]').change( (e) => {
//     $('#classe_energetica_ReadOnly').val($(e.target).val())
// })
$('textarea#description').change( (e) => {
    $('#description_ReadOnly').val($(e.target).val())
})
// $('input#metratura').change( (e) => {
//     $('#metratura_ReadOnly').val($(e.target).val())
// })
// $('input#anno').change( (e) => {
//     $('#anno_ReadOnly').val($(e.target).val())
// })
$('.info-aggiuntive').change( (e) => {
    console.log($(e.target).prop("checked"))
    if (!$(e.target).hasClass('paesi_interesse')) $(`input[name=${$(e.target).val()}_ReadOnly]`).prop("checked",$(e.target).prop("checked"));
})

$('.paesi_interesse').change( (e) => {
    let paesi = '';
    $('.paesi_interesse:checked').each( (i, v) => {
        paesi += $(v).val() + ',';
    })
    $('#address_ReadOnly').val(paesi);
});

$('.salva-form').click( () => {
    $('.salva-form-hidden').click()
})