<!-- resources/views/assets/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
    <body>
        <h1>{{ $asset->name }}</h1>

        <!-- Button to open the security property selection pop-up -->
        <button class="open-button" onclick="openSecurityForm()">Select Security Property</button>

        <!-- Security property selection pop-up -->
        <div class="form-popup" id="securityForm">
            <form id=securityFormSubmit action="{{ route('damage.store') }}" class="form-container" method="post">
                @csrf
                <h1>Select Security Property</h1>
                <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                <p>Select security property:</p>
                <select id="securityProperty" name="security_property">
                    @foreach($securityProperties as $property)
                        <option value="{{ $property }}">{{ $property }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closeSecurityForm()">Close</button>
            </form>
        </div>

        <!-- Damage Scenario Form -->
        <button class="open-button" onclick="openDamageForm()">Input Damage Scenario</button>
        <div class="form-popup" id="damageForm">
            <form id= damageFormSubmit action="{{ route('damage.store') }}" class="form-container" method="post">
                @csrf
                <h1>Input Damage Scenario</h1>
                <label for="damageScenario"><b>Damage Scenario:</b></label>
                <textarea class="form-control" id="damageScenario" name="damage_scenario" rows="3" placeholder="Enter Damage Scenario" required></textarea>
                
                <!-- Add other input fields as needed -->

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closeDamageForm()">Close</button>
            </form>
        </div>

        <!-- Safety Impact Form -->
        <button class="open-button" onclick="openSafetyForm()">Input Safety Impact</button>
        <div class="form-popup" id="safetyForm">
            <form id= safetyFormSubmit action="{{ route('damage.store') }}" class="form-container" method="post">
                @csrf
                <h1>Safety Impact</h1>
                <label for="safetyImpact"><b>Select Safety Impact Severity:</b></label>
                <div class="form-group">
                    <select class="form-control" id="safetyImpact" name="safety_impact">
                        <option value="Negligible">Negligible</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Major">Major</option>
                        <option value="Severe">Severe</option>
                    </select>
                </div>
                <label for="safetyJustification"><b>Justification for Safety Impact Rating:</b></label>
                <textarea class="form-control" id="safetyJustification" name="safety_justification" rows="3" placeholder="Enter Justification" required></textarea>

                <!-- Add other input fields as needed -->

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closeSafteyForm()">Close</button>
            </form>
        </div>

        <!-- Financial Impact Form -->
        <button class="open-button" onclick="openFinancialForm()">Input Financial Impact</button>
        <div class="form-popup" id="financialForm">
            <form id="financialFormSubmit" class="form-container">
                @csrf
                <h1>Financial Impact</h1>
                <label for="financialImpact"><b>Select Financial Impact Severity:</b></label>
                <div class="form-group">
                    <select class="form-control" id="financialImpact" name="financial_impact" required>
                        <option value="Negligible">Negligible</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Major">Major</option>
                        <option value="Severe">Severe</option>
                    </select>
                </div>
                <label for="financialJustification"><b>Justification for Financial Impact Rating:</b></label>
                <textarea class="form-control" id="financialJustification" name="financial_justification" rows="3" placeholder="Enter Justification" required></textarea>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closeFinancialForm()">Close</button>
            </form>
        </div>

        <!-- Operational Impact Form -->
        <button class="open-button" onclick="openOperationalForm()">Input Operational Impact</button>
        <div class="form-popup" id="operationalForm">
            <form id= operationalFormSubmit action="{{ route('damage.store') }}" class="form-container" method="post">
                @csrf
                <h1>Operational Impact</h1>
                <label for="operationalImpact"><b>Select Operational Impact Severity:</b></label>
                <div class="form-group">
                    <select class="form-control" id="operationalImpact" name="operational_impact">
                        <option value="Negligible">Negligible</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Major">Major</option>
                        <option value="Severe">Severe</option>
                    </select>
                </div>
                <label for="operationalJustification"><b>Justification for Operational Impact Rating:</b></label>
                <textarea class="form-control" id="operationalJustification" name="operational_justification" rows="3" placeholder="Enter Justification" required></textarea>

                <!-- Add other input fields as needed -->

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closeOperationalForm()">Close</button>
            </form>
        </div>

        <!-- Privacy Impact Form -->
        <button class="open-button" onclick="openPrivacyForm()">Input Privacy Impact</button>
        <div class="form-popup" id="privacyForm">
            <form id = privacyFormSubmit action="{{ route('damage.store') }}" class="form-container" method="post">
                @csrf
                <h1>Privacy Impact</h1>
                <label for="privacyImpact"><b>Select Privacy Impact Severity:</b></label>
                <div class="form-group">
                    <select class="form-control" id="privacyImpact" name="privacy_impact">
                        <option value="Negligible">Negligible</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Major">Major</option>
                        <option value="Severe">Severe</option>
                    </select>
                </div>
                <label for="privacyJustification"><b>Justification for Privacy Impact Rating:</b></label>
                <textarea class="form-control" id="privacyJustification" name="privacy_justification" rows="3" placeholder="Enter Justification" required></textarea>

                <!-- Add other input fields as needed -->

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="closePrivacyForm()">Close</button>
            </form>
        </div>
        <h2>Asset Details</h2>

        <div id="securityDisplay" style="display: none;">
            <h2>Security Property:</h2>
            <p id="securityProperty"></p>
        </div>

        <!-- Display area for damage scenario -->
        <div id="damageDisplay" style="display: none;">
            <h2>Damage Scenario:</h2>
            <p id="damageScenario"></p>
        </div>

        <!-- Display area for safety impact -->
        <div id="safetyDisplay" style="display: none;">
            <p id="safetySeverity"></p>
            <p id="safetyJustification"></p>
        </div>
        <div id="financialDisplay" style="display: none;">
            <p id="financialseverity"></p>
            <p id="financialJustification"></p>
        </div>
        <!-- Display area for operational impact -->
        <div id="operationalDisplay" style="display: none;">
            <p id="operationalSeverity"></p>
            <p id="operationalJustification"></p>
        </div>

        <!-- Display area for privacy impact -->
        <div id="privacyDisplay" style="display: none;">
            <h2>Privacy Impact:</h2>
            <p id="privacySeverity"></p>
            <p id="privacyJustification"></p>
        </div>

        <!-- Add a button to calculate overall impact rating -->
        <button id="calculateOverallButton">Calculate Overall Impact Rating</button>

        <!-- Add a placeholder to display the overall impact rating -->
        <div id="overallImpactDisplay"></div>

        <button onclick="location.href='{{ route('threat.show')}}';">Next</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>