<!-- resources/views/assets/show.blade.php -->
@extends('layouts.app')

@section('title', 'show')

@section('content')

<div class="container">
    <h1>Create Damage Scenario for Asset: {{ $asset->name }}</h1>

    <form action="{{ route('damage.store') }}" method="POST">
        @csrf

        <input type="hidden" name="asset_id" value="{{ $asset->id }}">

        <div class="form-group">
            <label for="security_property">Security Property</label>
            <select name="security_property" id="security_property" class="form-control">
                @foreach($securityProperties as $property)
                <option value="{{ $property }}" {{ ($asset->damage && $property == $asset->damage->security_property) ? 'selected' : '' }}>{{ $property }}</option>                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="damage_scenario">Damage Scenario</label>
            <textarea name="damage_scenario" id="damage_scenario" class="form-control">{{ $asset->damage ? $asset->damage->damage_scenario : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="safety_impact">Safety Impact</label>
            <select class="form-control" id="safety_impact" name="safety_impact">
                @foreach(['Negligible', 'Moderate', 'Major', 'Severe'] as $impact)
                <option value="{{ $impact }}" {{ ($asset->damage && $impact == $asset->damage->safety_impact) ? 'selected' : '' }}>{{ $impact }}</option>                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="safety_justification">Safety Justification</label>
            <textarea name="safety_justification" id="safety_justification" class="form-control">{{ $asset->damage ? $asset->damage->safety_justification: '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="financial_impact">Financial Impact</label>
            <select class="form-control" id="financial_impact" name="financial_impact">
                @foreach(['Negligible', 'Moderate', 'Major', 'Severe'] as $impact)
                <option value="{{ $impact }}" {{ ($asset->damage && $impact == $asset->damage->financial_impact) ? 'selected' : '' }}>{{ $impact }}</option>                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="financial_justification">Financial Justification</label>
            <textarea name="financial_justification" id="financial_justification" class="form-control">{{ $asset->damage ? $asset->damage->financial_justification: '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="operational_impact">Operational Impact</label>
            <select class="form-control" id="operational_impact" name="operational_impact">
                @foreach(['Negligible', 'Moderate', 'Major', 'Severe'] as $impact)
                <option value="{{ $impact }}" {{ ($asset->damage && $impact == $asset->damage->operational_impact) ? 'selected' : '' }}>{{ $impact }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="operational_justification">Operational Justification</label>
            <textarea name="operational_justification" id="operational_justification" class="form-control">{{ $asset->damage ? $asset->damage->operational_justification: '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="privacy_impact">Privacy Impact</label>
            <select class="form-control" id="privacy_impact" name="privacy_impact">
                @foreach(['Negligible', 'Moderate', 'Major', 'Severe'] as $impact)
                <option value="{{ $impact }}" {{ ($asset->damage && $impact == $asset->damage->privacy_impact) ? 'selected' : '' }}>{{ $impact }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="privacy_justification">Privacy Justification</label>
            <textarea name="privacy_justification" id="privacy_justification" class="form-control">{{ $asset->damage ? $asset->damage->privacy_justification: '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Damage Scenario</button>
    </form>
</div>

    <div class="asset-details-icon" onclick="togglePopup()">
    <i class="fas fa-info-circle">Asset details</i>
    </div>
    
    <div class="dialog-container" id="assetDetailsPopup">
        <div class="card">
            <h2>Asset Details</h2>
            @if($asset->damage)
            <p>Security property: {{ $asset->damage->security_property }}</p>
            <p>Damage scenario: {{ $asset->damage->damage_scenario }}</p>
            <p>Safety impact: {{ $asset->damage->safety_impact }}</p>
            <p>Safety justification: {{ $asset->damage->safety_justification }}</p>
            <p>financial Impact: {{ $asset->damage->financial_impact }}</p>
            <p>financial justification: {{ $asset->damage->financial_justification }}</p>
            <p>operational Impact: {{ $asset->damage->operational_impact }}</p>
            <p>operational justification: {{ $asset->damage->operational_justification }}</p>
            <p>Privacy Impact: {{ $asset->damage->privacy_impact }}</p>
            <p>Privacy justification: {{ $asset->damage->privacy_justification }}</p>
            @else
                <p>No damage details available for this asset.</p>
            @endif

            <!-- Add a button to calculate overall impact rating -->
            <button id="calculateOverallButton">Calculate Overall Impact Rating</button>

            <!-- Add a placeholder to display the overall impact rating -->
            <div id="overallImpactDisplay" style="display: none;">
            <h2>Overall Impact Rating:</h2>
            <p id="overallImpactRating"></p>
            </div>
            <button type="button" class="action-button btn btn-secondary" onclick="closeAssetDetailsPopup()">Close</button>

        </div>
    </div>

    @section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/show.js') }}"></script>
  @endsection

@endsection

