<section id="cont-section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <h4 class="bold">CONTACT US</h4>
                <div class="br2 mt-4 mb-4"></div>
                <div class="row">
                    <!-- Name -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Name*" class="form-control" required>
                        </div>
                    </div>
                    <!-- Phone Number -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number*" class="form-control" maxlength="12" required>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="email" id="email" placeholder="Email*" class="form-control" required>
                        </div>
                    </div>
                    <!-- Category -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <select name="category" id="category" class="form-control">
                                <option value="" selected disabled>Category</option>
                            </select>
                        </div>
                    </div>
                    <!-- Subject -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select name="sub_category" id="sub_category" class="form-control">
                                <option value="" disabled selected>Subject*</option>
                            </select>
                        </div>
                    </div>
                    <!-- Massage -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea name="massage" class="form-control" placeholder="Enter Your Massage Here" rows="5"></textarea>
                        </div>
                    </div>
                    <!-- Preffered method of communication -->
                    <div class="col-lg-12">
                        <label for="">Preffered method of communication</label>
                        <div class="form-group">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                <label class="form-check-label" for="inlineRadio1">Whatsapp</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Email</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button id="btnSubmit" type="submit" class="btn btn-submit">
                    Submit
                </button>

            </div>
            <div class="col-lg-6">
                <iframe class="google-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28185631866!2d106.75947810247757!3d-6.229571229258799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1673336220317!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- Number Only -->
<script>
    // Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter, errMsg) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function(event) {
    textbox.addEventListener(event, function(e) {
      if (inputFilter(this.value)) {
        // Accepted value
        if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
          this.classList.remove("input-error");
          this.setCustomValidity("");
        }
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        // Rejected value - restore the previous one
        this.classList.add("input-error");
        this.setCustomValidity(errMsg);
        this.reportValidity();
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        // Rejected value - nothing to restore
        this.value = "";
      }
    });
  });
}


// Install input filters.
setInputFilter(document.getElementById("phone_number"), function(value) {
  return /^-?\d*$/.test(value); }, "Must be number");
</script>
<!-- Dropdown -->
<script>
    var data = {{Js::from($getcontact)}};
    console.log(data);
    $(document).ready(function() {
        data['category'].forEach(function(value) {
            $('#category').append(new Option(value['title'], value['title']));
        });

        $("#category").change(function() {
            $("#sub_category").empty().append($('<option>', {
                selected: true,
                disabled: true,
                value: 'Sub Category',
                text: 'Sub Category'
            }));

            data['category'].forEach(function(value) {
                if (value['title'] == $('#category').val()) {
                    value['sub_category'].forEach(function(sub_value) {
                        $('#sub_category').append(new Option(sub_value['title'],
                            sub_value['title']));
                    });
                }
            });

        });
    });
</script>