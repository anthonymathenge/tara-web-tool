function openSTRIDEForm() {
  document.getElementById("strideForm").classList.add("active");
}

// Function to close STRIDE selection form
function closeSTRIDEForm() {
  document.getElementById("strideForm").classList.remove("active");
}

function openThreatForm() {
  document.getElementById("threatForm").style.display = "block";
}

function closeThreatForm() {
  document.getElementById("threatForm").style.display = "none";
}


function handleThreatFormSubmit(event) {
  event.preventDefault();
  var threatName = document.getElementById('threatName').value;
  var threatType = document.getElementById('threatType').value;
  
  document.getElementById('threatNameDisplay').innerText = "Threat Name: " + threatName;
  document.getElementById('threatTypeDisplay').innerText = "Threat Type: " + threatType;

  document.getElementById('threatNameDisplay').style.display = 'block';
  document.getElementById('threatTypeDisplay').style.display = 'block';

  // Add any other actions needed after form submission

  // Close the threat form popup
  closeThreatForm();
}

// Assuming you have a form with the ID 'threatForm'
document.getElementById('threatForm').addEventListener('submit', handleThreatFormSubmit);
