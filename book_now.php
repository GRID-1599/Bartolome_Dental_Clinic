<div class="booking">
    <h1>Book Now</h1>
    <div class="midPart">
        <div class="leftPart">
            <div class="service-part">
                <h4>Services</h4>
                <div class="selectBox">
                    <div class="selectBox__container">
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="01" name="service" />
                            <label for="01">Extraction</label>
                        </div>
                        <div class="selectBox__options ">
                            <input type="radio" class="radio" id="02" name="service" />
                            <label for="02">Additional Anesthesia</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="03" name="service" />
                            <label for="03">Surgical Extraction</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="04" name="service" />
                            <label for="04">Frenectomy</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="05" name="service" />
                            <label for="05">Gingivectomy</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="05" name="service" />
                            <label for="05">Gingivectomy</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="05" name="service" />
                            <label for="05">Gingivectomy</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="05" name="service" />
                            <label for="05">Gingivectomy</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="05" name="service" />
                            <label for="05">Gingivectomy</label>
                        </div>
                        <div class="selectBox__options">
                            <input type="radio" class="radio" id="05" name="service" />
                            <label for="05">Gingivectomy</label>
                        </div>
                    </div>
                    <div class="selected">Select Service</div>
                </div>
            </div>

            <div class="patientId-part">
                <h4>Patient ID</h4>
                <input type="text" name="" placeholder="" id="patientID" onkeyup="" required title=""><br>
                <div>
                    <a href="registration.php">I am new patient</a> <br>
                    <a href="">Forgot patient ID?</a>
                    </div>
            </div>

            
            
        </div>
        <div class="rightPart">
            <div class="amount-part">
                <h4>Amount</h4>
                <input type="text" name="" placeholder="" id="amount" onkeyup="validUserName()" required title=""><br>
            </div>
            <div class="date-part">
                <h4 for="">Date</h4>
                <div class="dateChooser">Select Appointment Date</div>
                <div class="calendarModal">
                    <div class="calendarDatePicker">
                        <h1>Calendar</h1>
                    </div>
                </div>
            </div>
            <div class="time-part">
                <h4>Time</h4>
                <input type="text" name="" placeholder="" id="amount" onkeyup="validUserName()" required title=""><br>
            </div>

        </div>


    </div>
    <div class="bottomPart">
        <div class="leftPart">
            <p>Already have an appointment?</p>
            <a href="">View my Appointment</a>
        </div>
        <button id="btnSetAppointment">
            Set Appointment
        </button>
    </div>
    <script src="./javascript/booking.js"></script>
</div>