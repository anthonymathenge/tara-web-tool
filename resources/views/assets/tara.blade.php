@extends('layouts.app')

@section('title', 'tara')

@section('content')
    <h1>TARA</h1>
    
    <!-- Display Threat ID, Threat Name, and Affected Asset -->
    <div class="container">
        <div class="links" onclick="openAttackPathForm()">Attack Path</div>
        <div class="links" onclick="openElapsedTimeForm()">Elapsed Time</div>
        <div class="links" onclick="openSpecialistExpertiseForm()">Specialist Expertise</div>
        <div class="links" onclick="openKnowledgeItemForm()">Knowledge of the Item</div>
        <div class="links" onclick="openWindowOfOpportunityForm()">Window of Opportunity</div>
        <div class="links" onclick="openEquipmentForm()">Equipment</div>
    </div>

    <!-- Attack Path Form -->
    <div class="dialog-container" id="attackPathForm">
        <form id="attackPathFormSubmit" action="{{ route('tara.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">Attack Path</h2>
            </div>
            <div class="card-form">
                <label for="attackPath"><b>What is your attack path:</b></label>
                <input type="text" id="attackPath" name="attack_path" required>
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeAttackPathForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Elapsed Time Form -->
    <div class="dialog-container" id="elapsedTimeForm">
        <form id="elapsedTimeFormSubmit" action="{{ route('tara.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">Elapsed Time</h2>
            </div>
            <div class="card-form">
                <label for="elapsedTime"><b>What is the Elapsed Time:</b></label>
                <select class="form-control" id="elapsedTime" name="elapsed_time">
                    <option value="<1 week" value2="0">1 week</option>
                    <option value="<1 month" value2="1">1 month</option>
                    <option value="<=6 months" value2="4"><=6 months</option>
                    <option value="<=3 years" value2="10"><=3 years</option>
                    <option value=">3 years" value2="19">>3 years</option>
                </select>
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeElapsedTimeForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Specialist Expertise Form -->
    <div class="dialog-container" id="specialistExpertiseForm">
        <form id="specialistExpertiseFormSubmit" action="{{ route('tara.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">Specialist Expertise</h2>
            </div>
            <div class="card-form">
                <label for="specialistExpertise"><b>What is the specialist Expertise:</b></label>
                <select class="form-control" id="specialistExpertise" name="specialist_expertise">
                    <option value="layman" value2="0">Layman</option>
                    <option value="proficient" value2="3">Proficient</option>
                    <option value="expert" value2="6">Expert</option>
                    <option value="multiple experts" value2="8">Multiple Experts</option>
                </select>
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeSpecialistExpertiseForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Knowledge of the Item Form -->
    <div class="dialog-container" id="knowledgeItemForm">
        <form id="knowledgeItemFormSubmit" action="{{ route('tara.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">Knowledge of the Item</h2>
            </div>
            <div class="card-form">
                <label for="knowledgeItem"><b>Knowledge of the item (or component):</b></label>
                <select class="form-control" id="knowledgeItem" name="knowledge_item">
                    <option value="public" value2="0">Public</option>
                    <option value="restricted" value2="3">Restricted</option>
                    <option value="confidential" value2="7">Confidential</option>
                    <option value="strictly confidential" value2="11">Strictly Confidential</option>
                </select>
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeKnowledgeItemForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Window of Opportunity Form -->
    <div class="dialog-container" id="windowOfOpportunityForm">
        <form id="windowOfOpportunityFormSubmit" action="{{ route('tara.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">Window of Opportunity</h2>
            </div>
            <div class="card-form">
                <label for="windowOfOpportunity"><b>Select Window of Opportunity:</b></label>
                <select class="form-control" id="windowOfOpportunity" name="window_of_opportunity">
                    <option value="Unlimited" value2="0">Unlimited</option>
                    <option value="Easy" value2="1">Easy</option>
                    <option value="Moderate" value2="4">Moderate</option>
                    <option value="Difficult" value2="10">Difficult</option>
                </select>
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeWindowOfOpportunityForm()">Close</button>
            </div>
        </form>
    </div>


    <!-- Equipment Form -->
    <div class="dialog-container" id="equipmentForm">
        <form id="equipmentFormSubmit" action="{{ route('tara.store') }}" class="form-container card" method="post">
            @csrf
            <div class="card-image">
                <h2 class="card-heading">Equipment</h2>
            </div>
            <div class="card-form">
                <label for="equipment"><b>Select Equipment:</b></label>
                <select class="form-control" id="equipment" name="equipment">
                    <option value="Standard" value2="0">Standard</option>
                    <option value="Specialised" value2="4">Specialised</option>
                    <option value="Bespoke" value2="7">Bespoke</option>
                    <option value="Multiple Bespoke" value2="9">Multiple Bespoke</option>
                </select>
            </div>
            <div class="action">
                <button type="submit" class="action-button btn btn-primary">Submit</button>
                <button type="button" class="action-button btn btn-secondary" onclick="closeEquipmentForm()">Close</button>
            </div>
        </form>
    </div>

    <div class="asset-details-icon" onclick="togglePopup()">
    <i class="fas fa-info-circle">Asset details</i>
    </div>
    
    <div class="dialog-container" id="assetDetailsPopup">
        <div class="card">
            <h2>Asset Details</h2>
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
            <button id="calculateOverallButton" onclick="calculateAttackFeasibility()">Calculate Attack Feasibility</button>

            <!-- Add a placeholder to display the total score and attack feasibility rating -->
            <div id="attackFeasibilityDisplay" style="display: none;">
                <h2>Attack Feasibility</h2>
                <p>Total Score: <span id="totalScore"></span></p>
                <p>Attack Feasibility Rating: <span id="feasibilityRating"></span></p>
            </div>
            <button type="button" class="action-button btn btn-secondary" onclick="closeAssetDetailsPopup()">Close</button>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tara.js') }}"></script>
@endsection
