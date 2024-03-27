
<link rel="stylesheet" href="/css/styles.css">

<h1>Threat Identification</h1>
<button class="open-button" onclick="openSTRIDEForm()">Select STRIDE Threat</button>

<!-- STRIDE selection form -->
<div class="form-popup" id="strideForm">
    <form id="strideFormSubmit" action="{{ route('threat.store') }}" class="form-container" method="post">
        @csrf
        <h1>Select STRIDE Threat</h1>
        <label for="strideThreat"><b>Select your threat:</b></label>
        <div class="form-group">
            <select class="form-control" id="strideThreat" name="stride_threat">
                <option value="Spoofing">Spoofing</option>
                <option value="Tampering">Tampering</option>
                <option value="Repudiation">Repudiation</option>
                <option value="InformationDisclosure">Information Disclosure</option>
                <option value="DenialOfService">Denial of Service</option>
                <option value="ElevationOfPrivileges">Elevation of Privileges</option>
            </select>
        </div>

        <!-- Add other input fields as needed -->

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" onclick="closeSTRIDEForm()">Close</button>
    </form>
</div>

<button class="open-button" onclick="enterThreatName()">Enter Threat Name</button>

<div class="form-popup" id="threatNameForm" style="display: none;">
    <form id="threatNameFormSubmit" action="{{ route('threat.store') }}" class="form-container" method="post">
        @csrf
        <h1>Input Threat Name</h1>
        <label for="threatName"><b>Threat Name:</b></label>
        <input type="text" id="threatName" name="threat_name" placeholder="Enter Threat Name" required>

        <!-- Add other input fields as needed -->

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" onclick="closeThreatNameForm()">Close</button>
    </form>
</div>

<!-- Button to redirect to tara.blade.php -->
<button onclick="location.href='{{ route('tara.index') }}';">Next</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/threat.js') }}"></script>