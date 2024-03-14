<div>
<footer class="bg-success text-center text-black">
        <div class="container p-4">
            <section class="mb-4">
                Connect with us:
                <a class="btn btn-outline-dark btn-floating m-1 bg-light" href="https://www.facebook.com/"
                    target="_blank" role="button"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-dark btn-floating m-1 bg-light" href="https://www.instagram.com/"
                    target="_blank" role="button"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-dark btn-floating m-1 bg-light" href="https://www.linkedin.com/"
                    target="_blank" role="button"><i class="fab fa-linkedin-in"></i></a>
            </section>

            <section>
                <form id="myForm" autocomplete="off">
                    <div class="row d-flex justify-content-center">
                        <div class="col-auto">
                            <p class="pt-2 fw-bold">
                                Sign up for our occassionaly newsletter
                            </p>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-outline form-black mb-4">
                                <input type="email" id="form5Example2" class="form-control" name="strMessage" placeholder="Enter Email Address" required/>
                                <label class="form-label" for="form5Example2"></label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-dark mb-4 bg-light ">
                                Subscribe
                            </button>
                        </div>
                        </form>
                        {{--By default hide but when successfully subscribe it show and after some time again hide--}}
                        <div id="successMessage" class="text-danger fw-bold" style="display: none;">Thank You for Subscribing</div>
                        <div class="text-center p-3">
                            &copy; Jan-2024 to {{ date('d-m-Y') }}
                            <p>Corbett Cab Booking</p>
                            <a class="text-dark fw-bold" href="{{route('signin')}}">Admin Login</a>
                          
                    </div>
            </section>
        </div>
</footer>
            <!-- Include jQuery library -->
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
    $('#myForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '/form-submit',
            data: formData,
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            success: function(response) {
                // Handle success response
                $('#successMessage').show();
                setTimeout(function() {
                $('#successMessage').hide();
                }, 3000); // Adjust duration as needed
                $('#myForm').trigger('reset');
            }
            
        });
    });
});

</script>
</div>