<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARA</title>
</head>
<body>
    <h1>TARA</h1>
    
    <!-- Display Threat ID, Threat Name, and Affected Asset -->
    <div>
        <p>Threat ID: <span id="threatId"></span></p>
        <p>Threat Name: <span id="threatName"></span></p>
        <p>Affected Asset: <span id="affectedAsset"></span></p>
    </div>
    <button class="open-button" onclick="openAttackPathForm()">Open Attack Path Form</button>

    <div class="form-popup" id="attackPathForm">
        <form id="attackPathFormSubmit" action="{{ route('tara.store') }}" class="form-container" method="post">
            @csrf
            <h1>Attack Path</h1>
            <label for="attackPath"><b>What is your attack path:</b></label>
            <div class="form-group">
                <input type="text" id="attackPath" name="attack_path" required>
            </div>
    
            <!-- Add other input fields as needed -->
    
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="closeAttackPathForm()">Close</button>
        </form>
    </div>
    <button class="open-button" onclick="openElapsedTimeForm()">Open Elapsed Time Form</button>

    <div class="form-popup" id="elapsedTimeForm">
        <form id="elapsedTimeFormSubmit" action="{{ route('tara.store') }}" class="form-container" method="post">
            @csrf
            <h1>Elapsed Time</h1>
            <label for="elapsedTime"><b>What is the Elapsed Time:</b></label>
            <div class="form-group">
                <select class="form-control" id="elapsedTime" name="elapsed_time">
                    <option value="<1 week"> 1 week </option>
                    <option value="<1 month"> 1 month</option>
                    <option value="<=6 months"><=6 months</option>
                    <option value="<=3 years"><=3 years</option>
                    <option value=">3 years">>3 years</option>
                </select>
            </div>
    
            <!-- Add other input fields as needed -->
    
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="closeElapsedTimeForm()">Close</button>
        </form>
    </div>
    <button class="open-button" onclick="openSpecialistExpertiseForm()">Open Specialist Expertise Form</button>

    <div class="form-popup" id="specialistExpertiseForm">
        <form id="specialistExpertiseFormSubmit" action="{{ route('tara.store') }}" class="form-container" method="post">
            @csrf
            <h1>Specialist Expertise</h1>
            <label for="specialistExpertise"><b>What is the specialist Expertise:</b></label>
            <div class="form-group">
                <select class="form-control" id="specialistExpertise" name="specialist_expertise">
                    <option value="layman">Layman</option>
                    <option value="proficient">Proficient</option>
                    <option value="expert">Expert</option>
                    <option value="multiple experts">Multiple Experts</option>
                </select>
            </div>
    
            <!-- Add other input fields as needed -->
    
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="closeSpecialistExpertiseForm()">Close</button>
        </form>
    </div>
    <button class="open-button" onclick="openKnowledgeItemForm()">Open Knowledge of the Item Form</button>

    <div class="form-popup" id="knowledgeItemForm">
        <form id="knowledgeItemFormSubmit" action="{{ route('tara.store') }}" class="form-container" method="post">
            @csrf
            <h1>Knowledge of the Item</h1>
            <label for="knowledgeItem"><b>Knowledge of the item (or component):</b></label>
            <div class="form-group">
                <select class="form-control" id="knowledgeItem" name="knowledge_item">
                    <option value="public">Public</option>
                    <option value="restricted">Restricted</option>
                    <option value="confidential">Confidential</option>
                    <option value="strictly confidential">Strictly Confidential</option>
                </select>
            </div>
    
            <!-- Add other input fields as needed -->
    
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="closeKnowledgeItemForm()">Close</button>
        </form>
    </div>
    <button class="open-button" onclick="openWindowOfOpportunityForm()">Open Specialist Expertise Form</button>

    <div class="form-popup" id="windowOfOpportunityForm">
        <form id="windowOfOpportunityFormSubmit" action="{{ route('tara.store') }}" class="form-container" method="post">
            @csrf
            <h1>Window of Opportunity</h1>
            <label for="windowOfOpportunity"><b>Select Window of Opportunity:</b></label>
            <div class="form-group">
                <select class="form-control" id="windowOfOpportunity" name="window_of_opportunity">
                    <option value="Unlimited">Unlimited</option>
                    <option value="Easy">Easy</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Difficult">Difficult</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="closeWindowOfOpportunityForm()">Close</button>
        </form>
    </div>
    <button class="open-button" onclick="openEquipmentForm()">Open Specialist Expertise Form</button>

    <!-- Equipment Form -->
    <div class="form-popup" id="equipmentForm">
        <form id="equipmentFormSubmit" action="{{ route('tara.store') }}" class="form-container" method="post">
            @csrf
            <h1>Equipment</h1>
            <label for="equipment"><b>Select Equipment:</b></label>
            <div class="form-group">
                <select class="form-control" id="equipment" name="equipment">
                    <option value="Standard">Standard</option>
                    <option value="Specialised">Specialised</option>
                    <option value="Bespoke">Bespoke</option>
                    <option value="Multiple Bespoke">Multiple Bespoke</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="closeEquipmentForm()">Close</button>
        </form>
    </div>

    <div id="attackPathDisplay" style="display: none;">
        <h2>Attack Path:</h2>
        <p id="attackPath"></p>
    </div>

    <!-- Display area for elapsed time -->
    <div id="elapsedTimeDisplay" style="display: none;">
        <h2>Elapsed Time:</h2>
        <p id="elapsedTime"></p>
    </div>

    <!-- Display area for specialist expertise -->
    <div id="specialistExpertiseDisplay" style="display: none;">
        <h2>Specialist Expertise:</h2>
        <p id="specialistExpertise"></p>
    </div>

    <!-- Display area for knowledge of the item -->
    <div id="knowledgeItemDisplay" style="display: none;">
        <h2>Knowledge of the Item:</h2>
        <p id="knowledgeItem"></p>
    </div>

    <div id="windowOfOpportunityDisplay" style="display: none;">
        <h2>Window of Opportunity:</h2>
        <p id="windowOfOpportunity"></p>
    </div>

    <!-- Display area for equipment -->
    <div id="equipmentDisplay" style="display: none;">
        <h2>Equipment:</h2>
        <p id="equipment"></p>
    </div>

    <button onclick="location.href='{{ route('threat.show') }}';">Back</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tara.js') }}"></script>
</body>
</html>