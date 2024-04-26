var links = document.getElementsByClassName('links');
for (var i = 0; i < links.length; i++) {
    addClass(i);
}

function addClass(id) {
    setTimeout(function() {
        if (id > 0) links[id - 1].classList.remove('hover');
        links[id].classList.add('hover');
    }, id * 750);
}
// Function to open damage modal
function togglePopup() {
  var popup = document.getElementById("assetDetailsPopup");
  popup.style.display = popup.style.display === "none" ? "block" : "none";
}
function closeAssetDetailsPopup() {
  var popup = document.getElementById("assetDetailsPopup");
    popup.style.display = "none";
}

function openDamageForm() {
  document.getElementById("damageForm").classList.add("active");
}

function closeDamageForm() {
  document.getElementById("damageForm").classList.remove("active");
}
function openSafetyForm() {
  document.getElementById("safetyForm").classList.add("active");
}
function closeSafteyForm() {
  document.getElementById("safetyForm").classList.remove("active");
}
function openFinancialForm() {
  document.getElementById("financialForm").classList.add("active");
}
function closeFinancialForm() {
  document.getElementById("financialForm").classList.remove("active");
}
function openOperationalForm() {
  document.getElementById("operationalForm").classList.add("active");
}

function closeOperationalForm() {
  document.getElementById("operationalForm").classList.remove("active");
}
function openPrivacyForm() {
  document.getElementById("privacyForm").classList.add("active");
}

function closePrivacyForm() {
  document.getElementById("privacyForm").classList.remove("active");
}
function openSecurityForm() {
  document.getElementById("securityForm").classList.add("active");
}

function closeSecurityForm() {
  document.getElementById("securityForm").classList.remove("active");
}
function handleSecurityFormSubmit(event, assetId) {
  event.preventDefault();
  var securityProperty = document.getElementById('securityProperty').value;
  document.getElementById('securityDisplay').innerText = "Selected security property: " + securityProperty;
  document.getElementById('securityDisplay').style.display = 'block';
  localStorage.setItem('security_property_' + assetId, securityProperty);
  closeSecurityForm();
}
// Check if there are stored selections and populate security form fields
document.addEventListener('DOMContentLoaded', function() {
  var storedSecurityProperty = localStorage.getItem('security_property');
  if (storedSecurityProperty) {
    document.getElementById('securityProperty').value = storedSecurityProperty;
    document.getElementById('securityDisplay').innerText = "Selected security property: " + storedSecurityProperty;
    document.getElementById('securityDisplay').style.display = 'block';
  }
});

// Function to handle damage form submission
function handleDamageFormSubmit(event) {
  event.preventDefault();
  var damageScenario = document.getElementById('damageScenario').value;
  document.getElementById('damageDisplay').innerText = "Damage scenario: " + damageScenario;
  document.getElementById('damageDisplay').style.display = 'block';
  localStorage.setItem('damage_scenario', damageScenario); // Store damage scenario in localStorage
  closeDamageForm();
}

// Check if there are stored selections and populate damage form field
document.addEventListener('DOMContentLoaded', function() {
  var storedDamageScenario = localStorage.getItem('damage_scenario');
  if (storedDamageScenario) {
      document.getElementById('damageScenario').value = storedDamageScenario;
      document.getElementById('damageDisplay').innerText = "Damage scenario: " + storedDamageScenario;
      document.getElementById('damageDisplay').style.display = 'block';
  }
});

// Function to handle safety form submission
function handleSafetyFormSubmit(event) {
  event.preventDefault();
  var safetyImpact = document.getElementById('safetyImpact').value;
  var safetyJustification = document.getElementById('safetyJustification').value;
  document.getElementById('safetyDisplay').innerText = "Safety impact severity: " + safetyImpact + " Justification: " + safetyJustification;
  document.getElementById('safetyDisplay').style.display = 'block';
  localStorage.setItem('safety_impact', safetyImpact); // Store safety impact severity in localStorage
  localStorage.setItem('safety_justification', safetyJustification); // Store safety justification in localStorage
  closeSafteyForm();
}

// Check if there are stored selections and populate safety form fields
document.addEventListener('DOMContentLoaded', function() {
  var storedSafetyImpact = localStorage.getItem('safety_impact');
  var storedSafetyJustification = localStorage.getItem('safety_justification');
  if (storedSafetyImpact && storedSafetyJustification) {
      document.getElementById('safetyImpact').value = storedSafetyImpact;
      document.getElementById('safetyJustification').value = storedSafetyJustification;
      document.getElementById('safetyDisplay').innerText = "Safety impact severity: " + storedSafetyImpact + " Justification: " + storedSafetyJustification;
      document.getElementById('safetyDisplay').style.display = 'block';
  }
});

// Function to handle financial form submission
function handleFinancialFormSubmit(event) {
  event.preventDefault();
  var financialImpact = document.getElementById('financialImpact').value;
  var financialJustification = document.getElementById('financialJustification').value;
  document.getElementById('financialDisplay').innerText = "Financial impact severity: " + financialImpact + " Justification: " + financialJustification;
  document.getElementById('financialDisplay').style.display = 'block';
  localStorage.setItem('financial_impact', financialImpact); // Store financial impact severity in localStorage
  localStorage.setItem('financial_justification', financialJustification); // Store financial justification in localStorage
  closeFinancialForm();
}

// Check if there are stored selections and populate financial form fields
document.addEventListener('DOMContentLoaded', function() {
  var storedFinancialImpact = localStorage.getItem('financial_impact');
  var storedFinancialJustification = localStorage.getItem('financial_justification');
  if (storedFinancialImpact && storedFinancialJustification) {
      document.getElementById('financialImpact').value = storedFinancialImpact;
      document.getElementById('financialJustification').value = storedFinancialJustification;
      document.getElementById('financialDisplay').innerText = "Financial impact severity: " + storedFinancialImpact + " Justification: " + storedFinancialJustification;
      document.getElementById('financialDisplay').style.display = 'block';
  }
});

// Function to handle operational form submission
function handleOperationalFormSubmit(event) {
  event.preventDefault();
  var operationalImpact = document.getElementById('operationalImpact').value;
  var operationalJustification = document.getElementById('operationalJustification').value;
  document.getElementById('operationalDisplay').innerText = "Operational impact severity: " + operationalImpact + " Justification: " + operationalJustification;
  document.getElementById('operationalDisplay').style.display = 'block';
  localStorage.setItem('operational_impact', operationalImpact); // Store operational impact severity in localStorage
  localStorage.setItem('operational_justification', operationalJustification); // Store operational justification in localStorage
  closeOperationalForm();
}

// Check if there are stored selections and populate operational form fields
document.addEventListener('DOMContentLoaded', function() {
  var storedOperationalImpact = localStorage.getItem('operational_impact');
  var storedOperationalJustification = localStorage.getItem('operational_justification');
  if (storedOperationalImpact && storedOperationalJustification) {
      document.getElementById('operationalImpact').value = storedOperationalImpact;
      document.getElementById('operationalJustification').value = storedOperationalJustification;
      document.getElementById('operationalDisplay').innerText = "Operational impact severity: " + storedOperationalImpact + " Justification: " + storedOperationalJustification;
      document.getElementById('operationalDisplay').style.display = 'block';
  }
});

// Function to handle privacy form submission
function handlePrivacyFormSubmit(event) {
  event.preventDefault();
  var privacyImpact = document.getElementById('privacyImpact').value;
  var privacyJustification = document.getElementById('privacyJustification').value;
  document.getElementById('privacyDisplay').innerText = "Privacy impact severity: " + privacyImpact + " Justification: " + privacyJustification;
  document.getElementById('privacyDisplay').style.display = 'block';
  localStorage.setItem('privacy_impact', privacyImpact); // Store privacy impact severity in localStorage
  localStorage.setItem('privacy_justification', privacyJustification); // Store privacy justification in localStorage
  closePrivacyForm();
}

// Check if there are stored selections and populate privacy form fields
document.addEventListener('DOMContentLoaded', function() {
  var storedPrivacyImpact = localStorage.getItem('privacy_impact');
  var storedPrivacyJustification = localStorage.getItem('privacy_justification');
  if (storedPrivacyImpact && storedPrivacyJustification) {
      document.getElementById('privacyImpact').value = storedPrivacyImpact;
      document.getElementById('privacyJustification').value = storedPrivacyJustification;
      document.getElementById('privacyDisplay').innerText = "Privacy impact severity: " + storedPrivacyImpact + " Justification: " + storedPrivacyJustification;
      document.getElementById('privacyDisplay').style.display = 'block';
  }
});


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

