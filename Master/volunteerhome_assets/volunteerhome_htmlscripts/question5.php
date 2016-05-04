<section class="surveyquestions">
    <h2>Question 5</h2>
    <br>
    <br>
<fieldset>
    <h3>
    <label for="question5">
        <?php
            //function for getting the text
           get_question_text(41);
        ?> (Required)
</label>

    <input hidden type="number" name="qid5" value="41"><!-- Hidden input that carries value of question id (currently manual)-->
<br>
    <input required type="radio" name="question5" value="1" id="question5">YES
    <input required type="radio" name="question5" value="0" id="question5">NO
<br>
<br>
    <label for="question5">Explain :(Optional)</label>
<br>
    <textarea name="question5_opt" cols="45" rows="5" placeholder="Enter items here"></textarea>
<br>
<br>
    </h3>
</fieldset>
</section>
<section class="surveynavbuttons">
    <input class="navbuttonprevious"" type="button" id="previous4" name="previous">
    <input class="navbuttonnext" type="button" id="next6" name="next">
</section>