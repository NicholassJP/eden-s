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
                            <input type="text" name="name" placeholder="Name*" class="form-control" required>
                        </div>
                    </div>
                    <!-- Phone Number -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="phone_number" placeholder="Phone Number*" class="form-control" required>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Email*" class="form-control" required>
                        </div>
                    </div>
                    <!-- Category -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <select name="Category" class="form-control">
                                <option value="" selected disabled>Subject</option>
                                @foreach($tampil_kontak as $value)
                                <option id="{{$value['id']}}" value="">{{$value['title']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Subject -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <select name="subject" class="form-control">

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
                </div>
                <button class="btn btn-submit">
                    Submit
                </button>
            </div>
            <div class="col-lg-6">
                <iframe class="google-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28185631866!2d106.75947810247757!3d-6.229571229258799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1673336220317!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>