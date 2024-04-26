// Function to calculate overall impact rating
function togglePopup() {
  var popup = document.getElementById("assetDetailsPopup");
  popup.style.display = popup.style.display === "none" ? "block" : "none";
}

function closeAssetDetailsPopup() {
  var popup = document.getElementById("assetDetailsPopup");
  popup.style.display = "none";
}
$(document).ready(function() {
  // Fetch asset details when the page loads

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

document.getElementById('calculateOverallButton').addEventListener('click', function() {
  // Fetch individual impact ratings from the form fields
  var safetyImpact = document.getElementById('safety_impact').value;
  var financialImpact = document.getElementById('financial_impact').value;
  var operationalImpact = document.getElementById('operational_impact').value;
  var privacyImpact = document.getElementById('privacy_impact').value;

  // Define the Meta Data array (assuming it contains the overall impact ratings)
  var metaData = ['Negligible', 'Moderate', 'Major', 'Severe'];

  // Match individual impact ratings with the Meta Data array and get their indices
  var safetyIndex = metaData.indexOf(safetyImpact);
  var financialIndex = metaData.indexOf(financialImpact);
  var operationalIndex = metaData.indexOf(operationalImpact);
  var privacyIndex = metaData.indexOf(privacyImpact);

  // Get the maximum index among the individual impact ratings
  var maxIndex = Math.max(safetyIndex, financialIndex, operationalIndex, privacyIndex);

  // Calculate the overall impact rating based on the maximum index
  var overallImpactRating = metaData[maxIndex] || "Waiting for all ratings";

  // Display the overall impact rating
  document.getElementById('overallImpactRating').innerText = overallImpactRating;
  document.getElementById('overallImpactDisplay').style.display = "block";

});



