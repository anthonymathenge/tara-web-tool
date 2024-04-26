$(document).ready(function() {
  // Handle form submission
  $('form').on('submit', function(e) {
      e.preventDefault(); // Prevent default form submission

      $.ajax({
          url: $(this).attr('action'), // Get the form action URL
          method: 'POST', // Use POST method
          data: $(this).serialize(), // Serialize the form data
          success: function(response) {
              // Handle successful form submission here
              // For example, you can display a success message
              alert('Form submitted successfully!');
          },
          error: function(jqXHR, textStatus, errorThrown) {
              // Handle errors here
              console.error(textStatus, errorThrown);
          }
      });
  });
});