function openKnowledgeItemForm() {
  document.getElementById("knowledgeItemForm").classList.add("active");
}

// Function to close Knowledge of the Item form
function closeKnowledgeItemForm() {
  document.getElementById("knowledgeItemForm").classList.remove("active");
}
function openSpecialistExpertiseForm() {
  document.getElementById("specialistExpertiseForm").classList.add("active");
}

// Function to close Specialist Expertise form
function closeSpecialistExpertiseForm() {
  document.getElementById("specialistExpertiseForm").classList.remove("active");
}
function openElapsedTimeForm() {
  document.getElementById("elapsedTimeForm").classList.add("active");
}

// Function to close Elapsed Time form
function closeElapsedTimeForm() {
  document.getElementById("elapsedTimeForm").classList.remove("active");
}
function openAttackPathForm() {
  document.getElementById("attackPathForm").classList.add("active");
}

// Function to close Attack Path form
function closeAttackPathForm() {
  document.getElementById("attackPathForm").classList.remove("active");
}

function openWindowOfOpportunityForm() {
  document.getElementById("windowOfOpportunityForm").classList.add("active");
}

// Function to close Window of Opportunity form
function closeWindowOfOpportunityForm() {
  document.getElementById("windowOfOpportunityForm").classList.remove("active");
}

// Function to open Equipment form
function openEquipmentForm() {
  document.getElementById("equipmentForm").classList.add("active");
}

// Function to close Equipment form
function closeEquipmentForm() {
  document.getElementById("equipmentForm").classList.remove("active");
}

function handleWindowOfOpportunityFormSubmit(event) {
  event.preventDefault();
  var windowOfOpportunity = document.getElementById('windowOfOpportunity').value;
  document.getElementById('windowOfOpportunityDisplay').innerText = "Window of Opportunity: " + windowOfOpportunity;
  document.getElementById('windowOfOpportunityDisplay').style.display = 'block';
  closeWindowOfOpportunityForm();
}

// Function to handle Equipment form submission
function handleEquipmentFormSubmit(event) {
  event.preventDefault();
  var equipment = document.getElementById('equipment').value;
  document.getElementById('equipmentDisplay').innerText = "Equipment: " + equipment;
  document.getElementById('equipmentDisplay').style.display = 'block';
  closeEquipmentForm();
}

// Function to handle attack path form submission
function handleAttackPathFormSubmit(event) {
  event.preventDefault();
  var attackPath = document.getElementById('attackPath').value;
  document.getElementById('attackPathDisplay').innerText = "Attack Path: " + attackPath;
  document.getElementById('attackPathDisplay').style.display = 'block';
  closeAttackPathForm();
}

// Function to handle elapsed time form submission
function handleElapsedTimeFormSubmit(event) {
  event.preventDefault();
  var elapsedTime = document.getElementById('elapsedTime').value;
  document.getElementById('elapsedTimeDisplay').innerText = "Elapsed Time: " + elapsedTime;
  document.getElementById('elapsedTimeDisplay').style.display = 'block';
  closeElapsedTimeForm();
}

// Function to handle specialist expertise form submission
function handleSpecialistExpertiseFormSubmit(event) {
  event.preventDefault();
  var specialistExpertise = document.getElementById('specialistExpertise').value;
  document.getElementById('specialistExpertiseDisplay').innerText = "Specialist Expertise: " + specialistExpertise;
  document.getElementById('specialistExpertiseDisplay').style.display = 'block';
  closeSpecialistExpertiseForm();
}

// Function to handle knowledge item form submission
function handleKnowledgeItemFormSubmit(event) {
  event.preventDefault();
  var knowledgeItem = document.getElementById('knowledgeItem').value;
  document.getElementById('knowledgeItemDisplay').innerText = "Knowledge of the Item: " + knowledgeItem;
  document.getElementById('knowledgeItemDisplay').style.display = 'block';
  closeKnowledgeItemForm();
}

document.addEventListener('DOMContentLoaded', function() {
  window.onload = function() {
  document.getElementById('attackPathFormSubmit').addEventListener('submit', handleAttackPathFormSubmit);
  document.getElementById('elapsedTimeFormSubmit').addEventListener('submit', handleElapsedTimeFormSubmit);
  document.getElementById('specialistExpertiseFormSubmit').addEventListener('submit', handleSpecialistExpertiseFormSubmit);
  document.getElementById('knowledgeItemFormSubmit').addEventListener('submit', handleKnowledgeItemFormSubmit);
  document.getElementById('windowOfOpportunityFormSubmit').addEventListener('submit', handleWindowOfOpportunityFormSubmit);
  document.getElementById('equipmentFormSubmit').addEventListener('submit', handleEquipmentFormSubmit);
};
});

function calculateScore(formId) {
  var selectElement = document.getElementById(formId);
  var selectedOption = selectElement.options[selectElement.selectedIndex];
  var score = parseInt(selectedOption.value2);
  return score;
}

function calculateAttackFeasibility() {
  var totalScore = 0;

  // Calculate total score by summing scores from all select elements
  totalScore += calculateScore('elapsedTime');
  totalScore += calculateScore('specialistExpertise');
  totalScore += calculateScore('knowledgeItem');
  totalScore += calculateScore('windowOfOpportunity');
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
  console.log("Total Score: " + totalScore);
  console.log("Attack Feasibility Rating: " + rating);
}

