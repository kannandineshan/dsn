<!-- Volunteer name is printed in the head -->
<!--function from above using the email pulled from the session-->
<h1>Welcome <?php get_volunteer_name($_SESSION['vol_email']);?> </h1>

<!-- Survey Instructions -->
<h4>
    -There are 6 questions in total.
    <br><br>
    -A summary page at the end allows you to check your answers and change them if needed.
    <br><br>
    - All questions indicated as "Required" must be answered to be able to submit the survey.
    <br><br>
    Thank you.
</h4>

<section class="surveyeventdate">
    <h2>Enter the date of outing</h2>
    <fieldset>
        <label for="eventdate">Enter date (dd/mm/yy)</label>
        <input required type="date" name="eventdate" id="eventdate">
    </fieldset>
</section>
<br>

<!-- Start Survey Button -->
<input type="button" id="start" name="next" value="START SURVEY">