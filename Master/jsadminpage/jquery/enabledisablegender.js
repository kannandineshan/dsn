$('#yes').click(function () {
    //check if radio button is checked
    if ($(this).is(':checked')) {

        $('.disabledelements').removeAttr('disabled'); //enable input
        $("#childinfo").show();
    }
});

$('#no').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('.disabledelements').attr('disabled', true); //disable input
        $("#childinfo").hide();
    }
});



