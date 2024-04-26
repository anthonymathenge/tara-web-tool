@extends('layouts.app')

@section('title', 'tara')

@section('content')

<div class="container">
    <h2>TARA Form</h2>

    <form action="{{ route('tara.store') }}" method="POST">
        @csrf

        <input type="hidden" name="asset_id" value="{{ $asset->id }}">

        <div class="form-group">
    <label for="attack_path">Attack Path:</label>
    <input type="text" id="attack_path" name="attack_path" class="form-control" value="{{ $asset->tara ? $asset->tara->attack_path : '' }}" required>
</div>

<div class="form-group">
    <label for="elapsed_time">Elapsed Time:</label>
    <select id="elapsed_time" name="elapsed_time" class="form-control" required>
        @foreach(['< 1week', '< 1month' , '<= 6months' , '<= 3years' , '> 3years'] as $time)
            <option value="{{ $time }}" {{ ($asset->tara && $time == $asset->tara->elapsed_time) ? 'selected' : '' }}>{{ $time }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="specialist_expertise">Specialist Expertise:</label>
    <select id="specialist_expertise" name="specialist_expertise" class="form-control" required>
        @foreach(['layman', 'proficient', 'expert', 'multiple experts'] as $expertise)
            <option value="{{ $expertise }}" {{ ($asset->tara && $expertise == $asset->tara->specialist_expertise) ? 'selected' : '' }}>{{ $expertise }}</option>
        @endforeach
    </select>
</div>

        <div class="form-group">
            <label for="knowledge_item">Knowledge Item:</label>
            <select id="knowledge_item" name="knowledge_item" class="form-control" required>
                <option value="public" value2="0">Public</option>
                <option value="restricted" value2="3">Restricted</option>
                <option value="confidential" value2="7">Confidential</option>
                <option value="strictly confidential" value2="11">Strictly Confidential</option>
            </select>
        </div>

        <div class="form-group">
            <label for="window_of_opportunity">Window of Opportunity:</label>
            <select id="window_of_opportunity" name="window_of_opportunity" class="form-control" required>
                <option value="Unlimited" value2="0">Unlimited</option>
                <option value="Easy" value2="1">Easy</option>
                <option value="Moderate" value2="4">Moderate</option>
                <option value="Difficult" value2="10">Difficult</option>
            </select>
        </div>

        <div class="form-group">
            <label for="equipment">Equipment:</label>
            <select id="equipment" name="equipment" class="form-control" required>
                <option value="Standard" value2="0">Standard</option>
                <option value="Specialised" value2="4">Specialised</option>
                <option value="Bespoke" value2="7">Bespoke</option>
                <option value="Multiple Bespoke" value2="9">Multiple Bespoke</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>


    <div class="asset-details-icon" onclick="togglePopup()">
    <i class="fas fa-info-circle">Asset details</i>
    </div>
    
    <div class="dialog-container" id="assetDetailsPopup">
    <div class="card">
        <h2>Asset Details</h2>

        <h2>TARA Details</h2>
        @if($asset->tara)
            <p>Attack Path: {{ $asset->tara->attack_path }}</p>
            <p>Elapsed Time: {{ $asset->tara->elapsed_time }}</p>
            <p>Specialist Expertise: {{ $asset->tara->specialist_expertise }}</p>
            <p>Knowledge Item: {{ $asset->tara->knowledge_item }}</p>
            <p>Window of Opportunity: {{ $asset->tara->window_of_opportunity }}</p>
            <p>Equipment: {{ $asset->tara->equipment }}</p>
        @else
            <p>No TARA details available for this asset.</p>
        @endif

        <!-- Add a button to calculate attack feasibility -->
        <button id="calculateOverallButton" onclick="calculateAttackFeasibility()">Calculate Attack Feasibility</button>

        <div id="totalScoreDisplay" style="display: none;">
            <h2>Total Score:</h2>
            <p id="totalScore"></p>
        </div>

        <div id="feasibilityRatingDisplay" style="display: none;">
            <h2>Attack Feasibility Rating:</h2>
            <p id="feasibilityRating"></p>
        </div>


        <!-- Add a button to close the asset details popup -->
        <button type="button" class="action-button btn btn-secondary" onclick="closeAssetDetailsPopup()">Close</button>
    </div>
</div>

    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tara.js') }}"></script>
    @endsection

@endsection
