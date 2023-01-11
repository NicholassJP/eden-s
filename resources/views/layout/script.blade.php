<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
<!-- Splide -->
<script>
    var splide = new Splide('.splide', {
        perPage: 2,
        direction: 'ttb',
        pagination: true,
        arrows: false,
        height: '40rem',
        wheel: true,
        breakpoints: {
            994: {
                perPage: 1,
                height: '30rem',
                direction: 'ltr',
            },
        }
    });
    splide.mount();
</script>

<script>
    'use strict';

    var numberOfItems = $('#paginate .test-group').length; // Get total number of the items that should be paginated
    console.log(numberOfItems);
    var limitPerPage = 9; // Limit of items per each page
    $('#paginate .test-group:gt(' + (limitPerPage - 1) + ')').hide(); // Hide all items over page limits (e.g., 5th item, 6th item, etc.)
    var totalPages = Math.round(numberOfItems / limitPerPage + 0.45); // Get number of pages
    console.log(totalPages);
    $(".pagination").append("<li class='current-page active-'><a href='javascript:void(0)'></a></li>"); // Add first page marker

    // Loop to insert page number for each sets of items equal to page limit (e.g., limit of 4 with 20 total items = insert 5 pages)
    for (var i = 2; i <= totalPages; i++) {
        $(".pagination").append("<li class='current-page'><a href='javascript:void(0)'></a></li>"); // Insert page number into pagination tabs
    }

    // Add next button after all the page numbers  
    $(".pagination").append("<li class='mt-03' id='next-page'><a href='javascript:void(0)' aria-label=Next><i class='fas fa-arrow-right mt-3px'></i></a></li>");

    // Function that displays new items based on page number that was clicked
    $(".pagination li.current-page").on("click", function() {
        // Check if page number that was clicked on is the current page that is being displayed
        if ($(this).hasClass('active-')) {
            return false; // Return false (i.e., nothing to do, since user clicked on the page number that is already being displayed)
        } else {
            var currentPage = $(this).index(); // Get the current page number
            $(".pagination li").removeClass('active-'); // Remove the 'active-' class status from the page that is currently being displayed
            $(this).addClass('active-'); // Add the 'active-' class status to the page that was clicked on
            $("#paginate .test-group").hide(); // Hide all items in loop, this case, all the list groups
            var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page number that was clicked on

            // Loop through total items, selecting a new set of items based on page number
            for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $("#paginate .test-group:eq(" + i + ")").show(); // Show items from the new page that was selected
            }
        }

    });

    // Function to navigate to the next page when users click on the next-page id (next page button)
    $("#next-page").on("click", function() {
        var currentPage = $(".pagination li.active-").index(); // Identify the current active- page
        // Check to make sure that navigating to the next page will not exceed the total number of pages
        if (currentPage === totalPages) {
            return false; // Return false (i.e., cannot navigate any further, since it would exceed the maximum number of pages)
        } else {
            currentPage++; // Increment the page by one
            $(".pagination li").removeClass('active-'); // Remove the 'active-' class status from the current page
            $("#paginate .test-group").hide(); // Hide all items in the pagination loop
            var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page that was selected

            // Loop through total items, selecting a new set of items based on page number
            for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $("#paginate .test-group:eq(" + i + ")").show(); // Show items from the new page that was selected
            }

            $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active-'); // Make new page number the 'active-' page
        }
    });

    // Function to navigate to the previous page when users click on the previous-page id (previous page button)
    $("#previous-page").on("click", function() {
        var currentPage = $(".pagination li.active-").index(); // Identify the current active- page
        // Check to make sure that users is not on page 1 and attempting to navigating to a previous page
        if (currentPage === 1) {
            return false; // Return false (i.e., cannot navigate to a previous page because the current page is page 1)
        } else {
            currentPage--; // Decrement page by one
            $(".pagination li").removeClass('active-'); // Remove the 'activate' status class from the previous active- page number
            $("#paginate .test-group").hide(); // Hide all items in the pagination loop
            var grandTotal = limitPerPage * currentPage; // Get the total number of items up to the page that was selected

            // Loop through total items, selecting a new set of items based on page number
            for (var i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $("#paginate .test-group:eq(" + i + ")").show(); // Show items from the new page that was selected
            }

            $(".pagination li.current-page:eq(" + (currentPage - 1) + ")").addClass('active-'); // Make new page number the 'active-' page
        }
    });
</script>