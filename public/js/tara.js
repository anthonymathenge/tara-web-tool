function openKnowledgeItemForm() {
  document.getElementById("knowledgeItemForm").style.display = "block";
}

// Function to close Knowledge of the Item form
function closeKnowledgeItemForm() {
  document.getElementById("knowledgeItemForm").style.display = "none";
}
function openSpecialistExpertiseForm() {
  document.getElementById("specialistExpertiseForm").style.display = "block";
}

// Function to close Specialist Expertise form
function closeSpecialistExpertiseForm() {
  document.getElementById("specialistExpertiseForm").style.display = "none";
}
function openElapsedTimeForm() {
  document.getElementById("elapsedTimeForm").style.display = "block";
}

// Function to close Elapsed Time form
function closeElapsedTimeForm() {
  document.getElementById("elapsedTimeForm").style.display = "none";
}
function openAttackPathForm() {
  document.getElementById("attackPathForm").style.display = "block";
}

// Function to close Attack Path form
function closeAttackPathForm() {
  document.getElementById("attackPathForm").style.display = "none";
}

function openWindowOfOpportunityForm() {
  document.getElementById("windowOfOpportunityForm").style.display = "block";
}

// Function to close Window of Opportunity form
function closeWindowOfOpportunityForm() {
  document.getElementById("windowOfOpportunityForm").style.display = "none";
}

// Function to open Equipment form
function openEquipmentForm() {
  document.getElementById("equipmentForm").style.display = "block";
}

// Function to close Equipment form
function closeEquipmentForm() {
  document.getElementById("equipmentForm").style.display = "none";
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
  document.getElementById('attackPathFormSubmit').addEventListener('submit', handleAttackPathFormSubmit);
  document.getElementById('elapsedTimeFormSubmit').addEventListener('submit', handleElapsedTimeFormSubmit);
  document.getElementById('specialistExpertiseFormSubmit').addEventListener('submit', handleSpecialistExpertiseFormSubmit);
  document.getElementById('knowledgeItemFormSubmit').addEventListener('submit', handleKnowledgeItemFormSubmit);
  document.getElementById('windowOfOpportunityFormSubmit').addEventListener('submit', handleWindowOfOpportunityFormSubmit);
  document.getElementById('equipmentFormSubmit').addEventListener('submit', handleEquipmentFormSubmit);

});
