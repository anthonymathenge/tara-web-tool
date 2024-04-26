function calculateScore(formId) {
  var selectElement = document.getElementById(formId);
  var selectedOption = selectElement.options[selectElement.selectedIndex];
  var score = parseInt(selectedOption.getAttribute('value2'));
  return score;
}

function calculateAttackFeasibility() {
  var totalScore = 0;

  // Calculate total score by summing scores from all select elements
  totalScore += calculateScore('elapsed_time');
  totalScore += calculateScore('specialist_expertise');
  totalScore += calculateScore('knowledge_item');
  totalScore += calculateScore('window_of_opportunity');
  totalScore += calculateScore('equipment');

  // Determine attack feasibility rating based on total score
  var rating;
  if (totalScore >= 0 && totalScore <= 13) {
      rating = "High";
  } else if (totalScore >= 14 && totalScore <= 19) {
      rating = "Medium";
  } else if (totalScore >= 20 && totalScore <= 24) {
      rating = "Low";
  } else {
      rating = "Very Low";
  }

  // Output the total score and rating
  //document.getElementById('overallImpactDisplay').innerText = "Attack Feasibility Score: " + totalScore;
  //document.getElementById('overallImpactDisplay').innerText = "Attack Feasibility Rating: " + rating;
  document.getElementById('totalScore').innerText = totalScore;
  document.getElementById('feasibilityRating').innerText = rating;
  document.getElementById('totalScoreDisplay').style.display = "block";
  document.getElementById('feasibilityRatingDisplay').style.display = "block";


}

function togglePopup() {
  var popup = document.getElementById("assetDetailsPopup");
  popup.style.display = popup.style.display === "none" ? "block" : "none"; 
  
  if (popup.style.display === "block") {
      var assetId = document.querySelector('input[name="asset_id"]').value;
  }
}

function closeAssetDetailsPopup() {
  var popup = document.getElementById("assetDetailsPopup");
  popup.style.display = "none";
}

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

      // Calculate attack feasibility after form submission
  });
});
