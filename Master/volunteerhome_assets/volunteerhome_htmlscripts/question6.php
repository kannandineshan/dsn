<section class="surveyquestions">
    <h2>Question 6</h2>
    <br>
    <br>
<fieldset>
    <h3>
    <label for="question6">
        <?php
            //function for getting the text
           get_question_text(51);
        ?> (Required)
</label>

    <input hidden type="number" name="qid6" value="51"><!-- Hidden input that carries value of question id (currently manual)-->
<br>
    <input required type="radio" name="question6" value="1" id="question6">YES
    <input required type="radio" name="question6" value="0" id="question6">NO
<br>
<br>
    <label for="question6">Explain :(Optional)</label>
<br>
<textarea name="question6_opt" cols="45" rows="5" placeholder="Explain why here"></textarea>
<br>
<br>
    </h3>
</fieldset>
</section>
<section class="surveynavbuttons">
    <input class="navbuttonprevious" type="button" id="previous5" name="previous">
    <input class="navbuttonnext" type="button" id="nextsurveysummary" name="next">
</section>