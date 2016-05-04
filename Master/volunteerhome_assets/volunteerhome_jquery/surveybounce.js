

//============================================================ Next buttons


$( "#start" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
        if ($('#eventdate')[0].checkValidity()) {
            $("#welcomepage").toggle("fade", 2000);
            $("#surveybar").toggle("fade", 2000);
            $("#cont1").toggle("fade", 2000);
        }else {
            $("#surveyform").find(':submit').click()
        }
    }else {
        //If required attribute is not supported by browser then manually check if field is filled
        if (!$('#eventdate').val()){
            alert("Please Enter the Date of Event.");
        }else{
            $("#welcomepage").toggle("fade", 2000);
            $("#surveybar").toggle("slide", 2000);
            $("#cont1").toggle("slide", 2000);
        }
    }
});

$( "#next2" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
        if ($('#question1')[0].checkValidity()) {
            $("#cont1").toggle("explode", 2000);
            $("#cont2").toggle("size", 2000);
            $("#progressbar").progressbar({
                value: 17
            });
        } else {
            $("#surveyform").find(':submit').click()
        }
    }else {
        //If required attribute is not supported by browser then manually check if field is filled
        if (!$('#question1').val()){
            alert("Please fill in required field.");
        }else{
            $("#cont1").toggle("explode", 2000);
            $("#cont2").toggle("size", 2000);
            $("#progressbar").progressbar({
                value: 17
            });
        }
    }
});

$( "#next3" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
        if ($('#question2')[0].checkValidity()) {
            $("#cont2").toggle("size", 2000);
            $("#cont3").toggle("fade", 2000);
            $("#progressbar").progressbar({
                value: 34
            });
        } else {
            $("#surveyform").find(':submit').click()
        }
    }else {
        //If required attribute is not supported by browser then manually check if field is filled
        if (!$('#question2').val()){
            alert("Please fill in required field.");
        }else{
            $("#cont2").toggle("size", 2000);
            $("#cont3").toggle("fade", 2000);
            $("#progressbar").progressbar({
                value: 34
            });
        }
    }
});

$( "#next4" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
        if ($('#question3')[0].checkValidity()) {
            $("#cont3").toggle("fold", 2000);
            $("#cont4").toggle("puff", 2000);
            $("#progressbar").progressbar({
                value: 51
            });
        } else {
            $("#surveyform").find(':submit').click()
        }
    }else {
        //If required attribute is not supported by browser then manually check if field is filled
        if (!$('#question3:checked').val()){
            alert("Please fill in required field.");
        }else{
            $("#cont3").toggle("fold", 2000);
            $("#cont4").toggle("puff", 2000);
            $("#progressbar").progressbar({
                value: 51
            });
        }
    }
});

$( "#next5" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
        if ($('#question4')[0].checkValidity()) {
            $("#cont4").toggle("puff", 2000);
            $("#cont5").toggle("clip", 2000);
            $("#progressbar").progressbar({
                value: 68
            });
        } else {
            $("#surveyform").find(':submit').click()
        }
    }else {
        //If required attribute is not supported by browser then manually check if field is filled
        if (!$('#question4:checked').val()){
            alert("Please fill in required field.");
        }else{
            $("#cont4").toggle("puff", 2000);
            $("#cont5").toggle("clip", 2000);
            $("#progressbar").progressbar({
                value: 68
            });
        }
    }
});

$( "#next6" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
        if ($('#question5')[0].checkValidity()) {
            $("#cont5").toggle("clip", 2000);
            $("#cont6").toggle("puff", 2000);
            $("#progressbar").progressbar({
                value: 85
            });
        } else {
            $("#surveyform").find(':submit').click()
        }
    }else {
        //If required attribute is not supported by browser then manually check if field is filled
        if (!$('#question5:checked').val()){
            alert("Please fill in required field.");
        }else{
            $("#cont5").toggle("clip", 2000);
            $("#cont6").toggle("puff", 2000);
            $("#progressbar").progressbar({
                value: 85
            });
        }
    }
});

$( "#nextsurveysummary" ).click(function() {

    //Checks if browser supports required attribute using Modernizr's feature detection JavaScript code
    if (Modernizr.formvalidation) {
        //Checks if field is filled using html5 form validation
        if ($('#question6')[0].checkValidity()) {
            $("#cont6").toggle("slide", 0);
            $("#surveysummaryandsubmission").toggle("fade", 2000);

            // Sends all the questions summary to the summary page
            $(".surveyquestions").show().prependTo("#surveyquestionssummary");
            $(".surveyeventdate").show().prependTo("#surveyeventdatesummary");


            $("#progressbar").progressbar({
                value: 100
            });
        } else {
            $("#surveyform").find(':submit').click()
        }
    }else {
        //If required attribute is not supported by browser then manually check if field is filled
        if (!$('#question6:checked').val()){
            alert("Please fill in required field.");
        }else{
            $("#cont6").toggle("slide", 0);
            $("#surveysummaryandsubmission").toggle("fade", 2000);

            // Sends all the questions summary to the summary page
            $(".surveyquestions").show().prependTo("#surveyquestionssummary");
            $(".surveyeventdate").show().prependTo("#surveyeventdatesummary");

            $("#progressbar").progressbar({
                value: 100
            });
        }
    }
});


//============================================================ Previous buttons

$( "#surveystart" ).click(function() {
    $("#surveybar").toggle("fade", 2000);
    $("#cont1").toggle("fade", 1000);
    $("#welcomepage").toggle("fade", 1000);

    $( "#progressbar" ).progressbar({
        value: 0
    });
});

$( "#previous1" ).click(function() {
    $("#cont2").toggle("slide", 1000);
    $("#cont1").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 0
    });
});

$( "#previous2" ).click(function() {
    $("#cont3").toggle("slide", 1000);
    $("#cont2").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 17
    });
});

$( "#previous3" ).click(function() {
    $("#cont4").toggle("slide", 1000);
    $("#cont3").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 34
    });
});

$( "#previous4" ).click(function() {
    $("#cont5").toggle("slide", 1000);
    $("#cont4").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 51
    });
});

$( "#previous5" ).click(function() {
    $("#cont6").toggle( "slide", 1000 );
    $("#cont5").toggle("slide", 1000);

    $( "#progressbar" ).progressbar({
        value: 68
    });
});


//============================================================ Progress BAR


$(function() {
    var progressbar = $( "#progressbar" ),
        progressLabel = $( ".progress-label" );

    progressbar.progressbar({
        value: false,
        change: function() {
            progressLabel.text( progressbar.progressbar( "value" ) + "%" );
        },
        complete: function() {
            progressLabel.text( "Check Answers and Click Submit to Complete!" );
        }
    });

    $( "#progressbar" ).progressbar({
        value: 0
    });
});
