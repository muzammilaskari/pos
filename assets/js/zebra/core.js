/*
$(document).ready(function(x) {
	
    $('#datepicker-example7-start').Zebra_DatePicker({
        direction: true,
        pair: $('#datepicker-example7-end')
    });

    $('#datepicker-example7-end').Zebra_DatePicker({
        direction: 1
    });

    
});
*/
function firstclick(id){
	$('#available_from_'+id).Zebra_DatePicker({
		format: 'd-m-Y',
        direction: true,
        pair: $('#available_to_'+id)
    });
}

function secondclick(id){
	$('#available_to_'+id).Zebra_DatePicker({
        format: 'd-m-Y',
		direction: true,
		direction: 1
    });
}

function showDatePicker(fieldId){
	$('#'+fieldId).Zebra_DatePicker({
		format: 'd-m-Y'
	});
}

function showDatePickerAfterToday(fieldId){
	$('#'+fieldId).Zebra_DatePicker({
		format: 'd-m-Y',
		direction: true,
	});
}