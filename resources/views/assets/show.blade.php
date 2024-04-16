<!-- resources/views/assets/show.blade.php -->
@extends('layouts.app')

@section('title', 'show')

@section('content')

    <div class="container">
        <div class="links" onclick="openSecurityForm()"><span class="text">Security </span></div>
        <div class="links" onclick="openDamageForm()"><span class="text">Damage </span></div>
        <div class="links" onclick="openSafetyForm()"><span class="text">Saftey</span></div>
        <div class="links" onclick="openFinancialForm()"><span class="text">Financial</span></div>
        <div class="links" onclick="openOperationalForm()"><span class="text">Operational</span></div>
        <div class="links" onclick="openPrivacyForm()"><span class="text">Privacy</span></div>
    </div>

    <!-- Button to open the security property selection pop-up -->
    <!-- Security property selection pop-up -->
    <div class="dialog-container" id="securityForm">
        <div class="card">
            <div class="card-image">
                <h2 class="card-heading">
                    Select Security Property
                    <small>Choose a security property</small>
                </h2>
            </div>
            <form class="card-form" id="securityFormSubmit" action="{{ route('damage.store') }}" method="post">
                @csrf
                <input type="hidden" name="asset_id" value="{{ $asset->id }}">
                <div class="input">
                    <select id="securityProperty" name="security_property" class="input-field">
                        @foreach($securityProperties as $property)
                            <option value="{{ $property }}">{{ $property }}</option>
                        @endforeach
                    </select>
                    <label class="input-label">Select security property</label>
                </div>
                <div class="action">
                    <button type="submit" class="action-button btn btn-primary">Submit</button>
                    <button type="button" class="action-button btn btn-secondary" onclick="closeSecurityForm()">Close</button>
                </div>
            </form>
            <div class="card-info">
                <p>By signing up you are agreeing to our <a href="#">Terms and Conditions</a></p>
            </div>
        </div>
    </div>



    <!-- Damage Scenario Form -->
    <div class="dialog-container" id="damageForm">
        <form id="damageFormSubmit" action="{{ route('damage.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">
                    Input Damage Scenario
                </h2>
            </div>
            <div class="card-form">
                <label for="damageScenario"><b>Damage Scenario:</b></label>
                <textarea class="form-control" id="damageScenario" name="damage_scenario" rows="3" placeholder="Enter Damage Scenario" required></textarea>
                <!-- Add other input fields as needed -->
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeDamageForm()">Close</button>
            </div>
        </form>
    </div>



    <!-- Safety Impact Form -->
    <div class="dialog-container" id="safetyForm">
        <form id="safetyFormSubmit" action="{{ route('damage.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">
                    Safety Impact
                </h2>
            </div>
            <div class="card-form">
                <label for="safetyImpact"><b>Select Safety Impact Severity:</b></label>
                <select class="form-control" id="safetyImpact" name="safety_impact" required>
                    <option value="Negligible">Negligible</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Major">Major</option>
                    <option value="Severe">Severe</option>
                </select>
                <label for="safetyJustification"><b>Justification for Safety Impact Rating:</b></label>
                <textarea class="form-control" id="safetyJustification" name="safety_justification" rows="3" placeholder="Enter Justification" required></textarea>
                <!-- Add other input fields as needed -->
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeSafteyForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Financial Impact Form -->
    <div class="dialog-container" id="financialForm">
        <form id="financialFormSubmit" action="{{ route('damage.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">
                    Financial Impact
                </h2>
            </div>
            <div class="card-form">
                <label for="financialImpact"><b>Select Financial Impact Severity:</b></label>
                <select class="form-control" id="financialImpact" name="financial_impact" required>
                    <option value="Negligible">Negligible</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Major">Major</option>
                    <option value="Severe">Severe</option>
                </select>
                <label for="financialJustification"><b>Justification for Financial Impact Rating:</b></label>
                <textarea class="form-control" id="financialJustification" name="financial_justification" rows="3" placeholder="Enter Justification" required></textarea>
                <!-- Add other input fields as needed -->
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeFinancialForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Operational Impact Form -->
    <div class="dialog-container"  id="operationalForm">
        <form id="operationalFormSubmit" action="{{ route('damage.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">
                    Operational Impact
                </h2>
            </div>
            <div class="card-form">
                <label for="operationalImpact"><b>Select Operational Impact Severity:</b></label>
                <select class="form-control" id="operationalImpact" name="operational_impact" required>
                    <option value="Negligible">Negligible</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Major">Major</option>
                    <option value="Severe">Severe</option>
                </select>
                <label for="operationalJustification"><b>Justification for Operational Impact Rating:</b></label>
                <textarea class="form-control" id="operationalJustification" name="operational_justification" rows="3" placeholder="Enter Justification" required></textarea>
                <!-- Add other input fields as needed -->
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeOperationalForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Privacy Impact Form -->
    <div class="dialog-container" id="privacyForm">
        <form id="privacyFormSubmit" action="{{ route('damage.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">
                    Privacy Impact
                </h2>
            </div>
            <div class="card-form">
                <label for="privacyImpact"><b>Select Privacy Impact Severity:</b></label>
                <select class="form-control" id="privacyImpact" name="privacy_impact" required>
                    <option value="Negligible">Negligible</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Major">Major</option>
                    <option value="Severe">Severe</option>
                </select>
                <label for="privacyJustification"><b>Justification for Privacy Impact Rating:</b></label>
                <textarea class="form-control" id="privacyJustification" name="privacy_justification" rows="3" placeholder="Enter Justification" required></textarea>
                <!-- Add other input fields as needed -->
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closePrivacyForm()">Close</button>
            </div>
        </form>
    </div>

    <div class="asset-details-icon" onclick="togglePopup()">
    <i class="fas fa-info-circle">Asset details</i>
    </div>
    
    <div class="dialog-container" id="assetDetailsPopup">
        <div class="card">
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
            <button type="button" class="action-button btn btn-secondary" onclick="closeAssetDetailsPopup()">Close</button>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/show.js') }}"></script>
@endsection