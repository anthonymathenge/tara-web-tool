// Function to open damage modal

function openDamageForm() {
    document.getElementById("damageForm").style.display = "block";
}

function closeDamageForm() {
    document.getElementById("damageForm").style.display = "none";
}
function openSafetyForm() {
    document.getElementById("safetyForm").style.display = "block";
}
function closeSafteyForm() {
    document.getElementById("safetyForm").style.display = "none";
}
function openFinancialForm() {
    document.getElementById("financialForm").style.display = "block";
}
function closeFinancialForm() {
    document.getElementById("financialForm").style.display = "none";
}
function openOperationalForm() {
    document.getElementById("operationalForm").style.display = "block";
}

function closeOperationalForm() {
    document.getElementById("operationalForm").style.display = "none";
}
function openPrivacyForm() {
    document.getElementById("privacyForm").style.display = "block";
}

function closePrivacyForm() {
    document.getElementById("privacyForm").style.display = "none";
}
function openSecurityForm() {
    document.getElementById("securityForm").style.display = "block";
}

function closeSecurityForm() {
    document.getElementById("securityForm").style.display = "none";
}
function handleSecurityFormSubmit(event) {
    event.preventDefault();
    var securityProperty = document.getElementById('securityProperty').value;
    document.getElementById('securityDisplay').innerText = "Selected security property: " + securityProperty;
    document.getElementById('securityDisplay').style.display = 'block';
    closeSecurityForm();
}

// Function to handle damage form submission
function handleDamageFormSubmit(event) {
    event.preventDefault();
    var damageScenario = document.getElementById('damageScenario').value;
    document.getElementById('damageDisplay').innerText = "Damage scenario: " + damageScenario;
    document.getElementById('damageDisplay').style.display = 'block';
    closeDamageForm();
}

// Function to handle safety form submission
function handleSafetyFormSubmit(event) {
    event.preventDefault();
    var safetyImpact = document.getElementById('safetyImpact').value;
    var safetyJustification = document.getElementById('safetyJustification').value;
    document.getElementById('safetyDisplay').innerText = "Safety impact severity: " + safetyImpact + " Justification: " + safetyJustification;
    document.getElementById('safetyDisplay').style.display = 'block';
    closeSafteyForm();
}
function handleFinancialFormSubmit(event) {
    event.preventDefault();
    var financialImpact = document.getElementById('financialImpact').value;
    var financialJustification = document.getElementById('financialJustification').value;
    document.getElementById('financialDisplay').innerText = "Financial impact severity: " + financialImpact + " Justification: " + financialJustification;
    document.getElementById('financialDisplay').style.display = 'block';
    closeFinancialForm();
}

// Function to handle operational form submission
function handleOperationalFormSubmit(event) {
    event.preventDefault();
    var operationalImpact = document.getElementById('operationalImpact').value;
    var operationalJustification = document.getElementById('operationalJustification').value;
    document.getElementById('operationalDisplay').innerText = "Operational impact severity: " + operationalImpact + " Justification: " + operationalJustification;
    document.getElementById('operationalDisplay').style.display = 'block';
    closeOperationalForm();
}

// Function to handle privacy form submission
function handlePrivacyFormSubmit(event) {
    event.preventDefault();
    var privacyImpact = document.getElementById('privacyImpact').value;
    var privacyJustification = document.getElementById('privacyJustification').value;
    document.getElementById('privacyDisplay').innerText = "Privacy impact severity: " + privacyImpact + " Justification: " + privacyJustification;
    document.getElementById('privacyDisplay').style.display = 'block';
    closePrivacyForm();
}

document.addEventListener('DOMContentLoaded', function() {

window.onload = function() {
    document.getElementById('securityFormSubmit').addEventListener('submit', handleSecurityFormSubmit);
    document.getElementById('damageFormSubmit').addEventListener('submit', handleDamageFormSubmit);
    document.getElementById('financialFormSubmit').addEventListener('submit', handleFinancialFormSubmit);
    document.getElementById('safetyFormSubmit').addEventListener('submit', handleSafetyFormSubmit);
    document.getElementById('operationalFormSubmit').addEventListener('submit', handleOperationalFormSubmit);
    document.getElementById('privacyFormSubmit').addEventListener('submit', handlePrivacyFormSubmit);
};


// Function to calculate overall impact rating
document.getElementById('calculateOverallButton').addEventListener('click', function() {
    // Fetch individual impact ratings from the form fields
    var safetyImpact = document.getElementById('safetyImpact').value;
    var financialImpact = document.getElementById('financialImpact').value;
    var operationalImpact = document.getElementById('operationalImpact').value;
    var privacyImpact = document.getElementById('privacyImpact').value;

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
    document.getElementById('overallImpactDisplay').innerText = "Overall Impact Rating: " + overallImpactRating;
});
});

