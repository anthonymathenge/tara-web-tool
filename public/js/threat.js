function openSTRIDEForm() {
  document.getElementById("strideForm").style.display = "block";
}

// Function to close STRIDE selection form
function closeSTRIDEForm() {
  document.getElementById("strideForm").style.display = "none";
}

function enterThreatName() {
  document.getElementById("threatNameForm").style.display = "block";
}

function closeThreatNameForm() {
  document.getElementById("threatNameForm").style.display = "none";
}

// Function to generate a unique Threat ID (You need to implement this function)
function generateThreatId() {
  // Your code to generate a unique Threat ID goes here
  return Math.floor(Math.random() * 1000); // Example: Generating a random number as Threat ID
}