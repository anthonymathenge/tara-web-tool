@extends('layouts.app')

@section('title', 'threat')

@section('content')
    <h1>Threat Identification</h1>

    <div class="container">
        <div class="links" onclick="openSTRIDEForm()">Select STRIDE Threat</div>
        <div class="links" onclick="openThreatForm()">Enter Threat Name</div>
    </div>

    <!-- STRIDE selection form -->
    <div class="dialog-container" id="strideForm">
        <form id="strideFormSubmit" action="{{ route('threat.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">
                    Select STRIDE Threat
                </h2>
            </div>
            <div class="card-form">
                <label for="strideThreat"><b>Select your threat:</b></label>
                <select class="form-control" id="strideThreat" name="stride_threat">
                    <option value="Spoofing">Spoofing</option>
                    <option value="Tampering">Tampering</option>
                    <option value="Repudiation">Repudiation</option>
                    <option value="InformationDisclosure">Information Disclosure</option>
                    <option value="DenialOfService">Denial of Service</option>
                    <option value="ElevationOfPrivileges">Elevation of Privileges</option>
                </select>
                <!-- Add other input fields as needed -->
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeSTRIDEForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Enter Threat Name form -->
    <div class="dialog-container" id="threatForm" style="display: none;">
        <form id="threatNameFormSubmit" action="{{ route('threat.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">
                    Input Threat Name
                </h2>
            </div>
            <div class="card-form">
                <label for="threatName"><b>Threat Name:</b></label>
                <input type="text" id="threatName" name="threat_name" placeholder="Enter Threat Name" required>
                <!-- Add other input fields as needed -->
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeThreatForm()">Close</button>
            </div>
        </form>
    </div>

    <div class="asset-details-icon" onclick="togglePopup()">
    <i class="fas fa-info-circle">Asset details</i>
    </div>
    
    <div class="dialog-container" id="assetDetailsPopup">
        <div class="card">
        <h2>Asset Details</h2>

            <div id="threatNameDisplay" style="display: none;">
                    <h2>Threat Name:</h2>
                    <p id="threatName"></p>
            </div>

                <!-- Display area for threat type -->
                <div id="threatTypeDisplay" style="display: none;">
                    <h2>Threat Type:</h2>
                    <p id="threatType"></p>
                </div>
            <button type="button" class="action-button btn btn-secondary" onclick="closeAssetDetailsPopup()">Close</button>
         </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/threat.js') }}"></script>
    <!-- Button to redirect to tara.blade.php -->
@endsection